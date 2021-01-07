<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

     public function getIndex(){

     	$posts=Post::paginate(4);

     	return view('blog.index')->withposts($posts);
     }



   public function getsingle($slug){
   	 
   	 //fetch from database based on slug
   	  $post=Post::where('slug','=',$slug)->first();//this is also a query builder but we use first as we want only one slug and all are unique so there will only be 1 in the database no copies so it will stop at first one it finds not to forget that is the only one in db  because-(unique).

   	 //return the view and pass in the post object

   	     return view ('blog.single')->withPost($post);

   }
}
