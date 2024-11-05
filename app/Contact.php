<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';


    protected $fillable = [
        'name',
        'subject',
        'email',
        'phone',
        'massage'
        ];
    
}