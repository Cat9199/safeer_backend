<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'travels';
    // Define the fillable fields
    protected $fillable = ['image','gallery','phone'];

    /**
     * Get the languages associated with the travel.
     */
    public function travelLangs()
    {
        return $this->hasMany(TravelLang::class);
    }
    public function travel_front()
    {
        return $this->hasOne('App\TravelLang', 'travel_id')->where('lang', front_default_lang());
    }

    public function lang()
    {
        return $this->hasOne(TravelLang::class, 'travel_id')->where(['lang' => get_default_language()]);
    }
    public function lang_front()
    {
        return $this->hasOne(TravelLang::class, 'travel_id')->where(['lang' => front_default_lang()]);
    }
    public function lang_all()
    {
        return $this->hasMany(TravelLang::class, 'travel_id');//->groupBy('lang');
    }
    public function ratings(){
        return $this->hasMany('App\TravelRatings','travel_id','id');
    }
}
