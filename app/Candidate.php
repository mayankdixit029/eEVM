<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name','slug','seat_id','party_id'];
    public function seat(){
        return $this->belongsTo('App\Seat');
    }
    public function party(){
        return $this->belongsTo('App\Party')->orderBy('created_at','desc');
    }
    public function voters(){
        return $this->hasMany('App\Voter');
    }
    public function district(){
        return $this->belongsTo('App\District');
    }
  

}
