<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //polymorpth 
    public function imageable(){
        return $this->morphTo();
    }
}
