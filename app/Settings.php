<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    // table name
    protected $table = 'settings';

    public $fillable = [
        'domain',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'whatsapp',
        'about_us',
        'terms_and_conditions',
        'privacy_policy',
    ];


}