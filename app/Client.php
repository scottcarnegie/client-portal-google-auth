<?php

namespace App;

use DateTime;
use DateTimeZone;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function getAge(){

        $tz = new DateTimeZone('America/Vancouver');
        $currentDate = new DateTime();
        $currentDate->setTimezone($tz);
        $birthDate = new DateTime($this->birth_date);

        $age = $currentDate->format('Y') - $birthDate->format('Y');

        if((int)($birthDate->format('m')) > (int)($currentDate->format('m'))){
            return $age-1;
        }
        else if((int)($birthDate->format('m')) === (int)($currentDate->format('m'))){
            if((int)($birthDate->format('d')) <= (int)($currentDate->format('d'))){
                return $age;
            }
            else{
                return $age-1;
            }
        }
        else{
            return $age;
        }
        

    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function trainer(){
        return $this->belongsTo('App\Trainer');
    }

    public function hasClientSessionLogs(){
        return $this->hasMany('App\ClientSessionLog');
    }
}
