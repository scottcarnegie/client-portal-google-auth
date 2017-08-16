<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function locationMember(){
        return $this->hasMany('App\Client');
    }

    public function locationTrainer(){
        return $this->hasMany('App\Trainer');
    }
}
