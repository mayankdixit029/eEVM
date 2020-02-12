<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }
    public function district(){
        return $this->belongsTo('App\District');
    }
   
    
}
