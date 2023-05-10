<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    
    //elliquint relationships
    public function post(){
        //gonna go to post model and find the user id and connect to it
        return $this->hasOne('App\Post');

        //if named unconventionally
        // return $this->hasOne('App\Post', 'the_user_id');
    }


    //one to many relationship
    public function posts(){
        return $this->hasMany('App\Post');
    }

    //many to many relationship
   public function roles(){
        // return $this->belongsToMany('App\Role','role_user','user_id', 'role_id'); //to customize table names and columns
        return $this->belongsToMany('App\Role')->withPivot('created_at');
    }

     //plymorhp to get photos here
     public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }

    //accessor methods  //camelcase with get infront and Attribute in back
    public function getNameAttribute($i){
        return ucfirst($i); //uppercase first letter
        // return strtoupper($i); //uppercase all
    }

     //Mutator methods  //camelcase with set infront and Attribute in back
     public function setNameAttribute($i){
       $this->attributes['name'] = strtoupper($i);
     }

}
