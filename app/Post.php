<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){

    	return $this->belongsTo('App\Category');//now both the models connect and point to each other
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function comments(){
    	return $this->hasMany('App\comment');
    }
}
