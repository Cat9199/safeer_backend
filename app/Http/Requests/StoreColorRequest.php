<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColorRequest extends FormRequest
{
      public function authorize()
      {
            return true; // Update based on your auth logic
      }

      public function rules()
      {
            return [
                  'color_name' => 'required|string|max:255',
                  'color_code' => 'required|string|size:7',
                  'gallery' => 'nullable|array',
                  'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // This ensures each file in the array is an image
                  'material' => 'required|in:Matte,Shiny',
                  'product_id' => 'required|integer|exists:products,id'
            ];
      }

}