<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductColor;
class ColorController extends Controller
{
    public function show($prodeuctId)
    {
        $colors = ProductColor::where('product_id', $prodeuctId)->get();

        return response()->json([
            'colors' => $colors
        ]);

    }
}