<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function state(){
        return $this->belongsTo('App\State');
    }
    public function seat(){
        return $this->hasOne('App\Seat');
    }
    public function voters(){
        return $this->hasMany('App\Voter');
    }
    public function candidates()
    {
        return $this->hasMany('App\Candidate');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
