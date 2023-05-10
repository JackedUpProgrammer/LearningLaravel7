<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //
    public function posts(){
        return $this->morphedByMany('App\Post','taggable');
    }


    public function videos(){
        return $this->morphedByMany('App\Video','taggable');
    }
}
