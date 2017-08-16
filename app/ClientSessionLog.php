<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class ClientSessionLog extends Model
{
    public function client(){
        return $this->belongsTo('App\Client');
    }
    public function trainer(){  
        return $this->belongsTo('App\Trainer');
    }
    public function getUploadDate(){
        $updatedDateTime = new DateTime($this->updated_at);
        return $updatedDateTime->format('M j, Y' );
    }
}
