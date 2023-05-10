<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //has many through relationship //1221
    public function posts(){
        return $this->hasManyThrough('App\Post', 'App\User');
    }
}
