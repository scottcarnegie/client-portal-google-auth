<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function location(){
        return $this->belongsTo('App\Location');
    }
    public function hasClients(){
        return $this->hasMany('App\Client');
    }
    public function hasClientSessionLogs(){
        return $this->hasMany('App\ClientSessionLog');
    }
}
