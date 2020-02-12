<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function seat(){
        return $this->belongsTo('App\Seat');
    }
    public function party(){
        return $this->belongsTo('App\Party');
    }
    public function voters(){
        return $this->hasMany('App\Voter');
    }
    public function district(){
        return $this->belongsTo('App\District');
    }
  

}
