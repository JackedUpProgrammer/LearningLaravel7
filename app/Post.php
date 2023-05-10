<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{   
    //if model name not the same as table name , these things should  be clarified.
    protected $table = 'posts';
    //protected $primaryKey = 'post_id';



    //it is safe for these to be updated
   protected $fillable =
   [    
    'title',
    'body',
    'path'
   ];

    //to be able to soft delete//we do not have the deleted _at yet , gonna create it now//dates is allready a class
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    //inverse relationship
    public function user(){
    return $this->belongsTo('Apps\User'); 
    }



    //plymorhp to get photos here
    public function photos(){
       
        return $this->morphMany('App\Photo', 'imageable');
    }

    //polymorhp many to many relationship
    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }

    public static function scopeLatest($query){ //query scope //scope in beginning with camel case.
      return $query->orderBy('id', 'asc')->get();
    }


}
