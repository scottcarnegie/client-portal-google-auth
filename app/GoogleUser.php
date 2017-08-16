<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleUser extends Model
{
    function GoogleUser(){
        $this -> name = "";
        $this -> imageUrl = "";
        $this -> email = "";
        $this -> token = "";
        $this -> isValid = false;
    }
}
