<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MediaUpload;
use Illuminate\Support\Facades\Response; // Import the Response facade

class ImageController extends Controller
{
    public function getImagePath(Request $request)
    {
        $imageId = $request->image_id;
        $image = MediaUpload::find($imageId);
        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $pathToFile = public_path("assets/uploads/media-uploader/{$image->path}");

        if (!file_exists($pathToFile)) {
            return response()->json(['message' => 'File does not exist'], 404);
        }

        return response()->file($pathToFile); // Serve the image file directly
    }
}