<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table= 'categories';

    public function posts(){

    	return $this->hasMany('App\post');//now this gets connected to post model App\post is our model.
    }

}
