<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductColor;
use App\Http\Requests\StoreColorRequest;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    public function show($prodeuctId)
    {
        $colors = ProductColor::where('product_id', $prodeuctId)->get();
        $product_id = $prodeuctId;
        return view('backend.products.colors', compact('colors', 'product_id'));

    }
    public function store(StoreColorRequest $request)
    {
        $validated = $request->validated();

        // Handle File Upload
        $imageIds = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('public/gallery');
                $imageIds[] = basename($path);
            }
        }

        $color = new ProductColor([
            'name' => $validated['color_name'],
            'hex_code' => $validated['color_code'],
            'material' => $validated['material'],
            'product_id' => $validated['product_id'],
            'image_ids' => json_encode($imageIds) // Encode array of image IDs to JSON string
        ]);

        $color->save();

        return redirect()->back()->with('success', 'Color added successfully!');
    }
    public function edit($id)
    {
        $color = ProductColor::findOrFail($id);
        return view('backend.products.edit_color', compact('color'));
    }

    public function delete($id)
    {
        $color = ProductColor::findOrFail($id);
        $color->delete();
        return redirect()->back()->with('success', 'Color deleted successfully!');
    }
    public function addImage(Request $request, $colorId)
    {
        $color = ProductColor::findOrFail($colorId);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/gallery');
            $imageId = basename($path);

            // Assuming image_ids is a JSON array of image file names
            $images = json_decode($color->image_ids, true);
            $images[] = $imageId;
            $color->image_ids = json_encode($images);
            $color->save();

            return response()->json(['success' => 'Image added successfully.', 'updatedImages' => $color->image_ids]);
        }

        return response()->json(['error' => 'No image uploaded.'], 400);
    }

    public function deleteImage(Request $request, $id)
    {
        $color = ProductColor::findOrFail($id);
        $images = collect(json_decode($color->image_ids)); // Decode JSON to collection

        // Check if the image to be deleted exists in the collection
        if ($images->contains($request->image)) {
            // Remove image from storage
            Storage::delete('public/gallery/' . $request->image);
            // Remove image from the collection
            $images = $images->reject(function ($value) use ($request) {
                return $value === $request->image;
            });

            // Save the updated collection back to the model
            $color->image_ids = json_encode($images);
            $color->save();

            //    redirect to the show
            return redirect()->back()->with('success', 'Image deleted successfully!');
        }

        // Respond with an error if the image is not found in the collection
        return response()->json([
            'status' => 'error',
            'message' => 'Image not found'
        ], 404);
    }

}