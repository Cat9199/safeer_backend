<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsLang extends Model
{
    protected $table = 'products_langs';
    protected $fillable = ['product_id', 'lang', 'title', 'description', 'attributes_title', 'attributes_description'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}