<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_colors_tabel';  // Ensure the model uses the correct table

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',        // The name of the color
        'hex_code',    // HEX code representing the color
        'material',    // The material finish (Matte or Shiny)
        'product_id',  // ID of the associated product
        'image_ids'    // JSON field containing image IDs
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'image_ids' => 'array'  // Ensure that image_ids is treated as an array
    ];

    /**
     * Get the product that owns the color.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}