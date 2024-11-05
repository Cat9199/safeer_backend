<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRatings extends Model
{
    protected $table ='travel_ratings';
    protected $fillable = ['ratings','message','travel_id','user_id'];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function travel(){
        return $this->belongsTo('App\Travel','travel_id');
    }
}
