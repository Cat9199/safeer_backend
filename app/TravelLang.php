<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelLang extends Model
{
    use HasFactory;
    protected $table = 'travel_langs';

    // Define the fillable fields
    protected $fillable = [
        'travel_id',
        'title',
        'price',
        'currency',
        'content',
        'lang',
        'from',
        'to'
    ];

    /**
     * Get the travel associated with the language.
     */
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
