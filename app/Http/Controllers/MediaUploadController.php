<?php

namespace App\Http\Controllers;

use App\MediaUpload;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class MediaUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function upload_media_file(Request $request)
    {
        // Validate file input
        $this->validate($request, [
            'file' => 'required|mimes:jpg,jpeg,png,gif|max:11000'
        ]);

        try {
            // Check if a file is uploaded
            if ($request->hasFile('file')) {
                $image = $request->file('file');

                // Retrieve image dimensions
                $image_dimensions = getimagesize($image);
                $image_width = $image_dimensions[0];
                $image_height = $image_dimensions[1];
                $image_dimension_for_db = $image_width . ' x ' . $image_height . ' pixels';

                // Get image size for database storage
                $image_size_for_db = $image->getSize();

                // Generate image name and file paths
                $image_extension = $image->getClientOriginalExtension();
                $image_name_with_ext = $image->getClientOriginalName();
                $image_name = strtolower(Str::slug(pathinfo($image_name_with_ext, PATHINFO_FILENAME)));
                $timestamped_name = $image_name . time();

                $image_db = $timestamped_name . '.' . $image_extension;
                $image_grid = 'grid-' . $image_db;
                $image_large = 'large-' . $image_db;
                $image_thumb = 'thumb-' . $image_db;

                $folder_path = 'assets/uploads/media-uploader/';

                // Save original file
                $request->file('file')->move($folder_path, $image_db);

                // Resize images and save versions for grid, large, and thumbnail
                $resize_grid_image = Image::make($folder_path . $image_db)
                    ->resize(350, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($folder_path . $image_grid);

                $resize_large_image = Image::make($folder_path . $image_db)
                    ->resize(740, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($folder_path . $image_large);

                $resize_thumb_image = Image::make($folder_path . $image_db)
                    ->resize(150, 150)
                    ->save($folder_path . $image_thumb);

                // Save metadata to database
                $media = MediaUpload::create([
                    'title' => $image_name_with_ext,
                    'size' => $this->formatBytes($image_size_for_db),
                    'path' => $image_db,
                    'dimensions' => $image_dimension_for_db
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'File uploaded successfully',
                    'data' => $media
                ]);
            } else {
                return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while uploading the file',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Helper function for formatting bytes
    protected function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }


    public function all_upload_media_file(Request $request)
    {
        $all_images = MediaUpload::orderBy('id', 'DESC')->get();
        $all_image_files = [];

        foreach ($all_images as $image) {
            if (file_exists('assets/uploads/media-uploader/' . $image->path)) {
                $image_url = asset('assets/uploads/media-uploader/' . $image->path);
                $all_image_files[] = [
                    'image_id' => $image->id,
                    'title' => $image->title,
                    'dimensions' => $image->dimensions,
                    'alt' => $image->alt,
                    'size' => $image->size,
                    'path' => $image->path,
                    'img_url' => $image_url,
                    'upload_at' => date_format($image->created_at, 'd M y')
                ];
            }
        }

        return response()->json($all_image_files);
    }

    public function delete_upload_media_file(Request $request)
    {
        $get_image_details = MediaUpload::find($request->img_id);
        if (file_exists('assets/uploads/media-uploader/' . $get_image_details->path)) {
            unlink('assets/uploads/media-uploader/' . $get_image_details->path);
        }
        if (file_exists('assets/uploads/media-uploader/grid-' . $get_image_details->path)) {
            unlink('assets/uploads/media-uploader/grid-' . $get_image_details->path);
        }
        if (file_exists('assets/uploads/media-uploader/large-' . $get_image_details->path)) {
            unlink('assets/uploads/media-uploader/large-' . $get_image_details->path);
        }
        if (file_exists('assets/uploads/media-uploader/thumb-' . $get_image_details->path)) {
            unlink('assets/uploads/media-uploader/thumb-' . $get_image_details->path);
        }
        MediaUpload::find($request->img_id)->delete();

        return redirect()->back();
    }

    public function regenerate_media_images()
    {
        $all_media_file = MediaUpload::all();
        foreach ($all_media_file as $img) {

            if (!file_exists('assets/uploads/media-uploader/' . $img->path)) {
                continue;
            }
            $image = 'assets/uploads/media-uploader/' . $img->path;
            $image_dimension = getimagesize($image);
            ;
            $image_width = $image_dimension[0];
            $image_height = $image_dimension[1];

            $image_db = $img->path;
            $image_grid = 'grid-' . $image_db;
            $image_large = 'large-' . $image_db;
            $image_thumb = 'thumb-' . $image_db;

            $folder_path = 'assets/uploads/media-uploader/';
            $resize_grid_image = Image::make($image)->resize(350, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize_large_image = Image::make($image)->resize(740, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize_thumb_image = Image::make($image)->resize(150, 150);

            if ($image_width > 150) {
                $resize_thumb_image->save($folder_path . $image_thumb);
                $resize_grid_image->save($folder_path . $image_grid);
                $resize_large_image->save($folder_path . $image_large);
            }
        }
        return __('regenerate done');
    }

    public function alt_change_upload_media_file(Request $request)
    {
        $this->validate($request, [
            'imgid' => 'required',
            'alt' => 'nullable',
        ]);
        MediaUpload::where('id', $request->imgid)->update(['alt' => $request->alt]);
        return __('alt update done');
    }

    public function all_upload_media_images_for_page()
    {
        $all_media_images = MediaUpload::orderBy('id', 'desc')->get();
        return view('backend.media-images.media-images')->with(['all_media_images' => $all_media_images]);
    }
}