<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ //due to the regular exoresiion blog/first*post will be a 404 as when it searches for routes the * is denied.but _ works as it is there

	 Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');//this wd-_ stuff is regular expressions about what are accepted as slug url.

	 Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);//the first parameter is url and then in array we give its Action and name 

	Route::get('contact','PagesController@getContact');
	Route::post('contact','PagesController@postContact');

	Route::get('about','PagesController@getAbout');

	Route::get('/','PagesController@getIndex')->name('/');

	Route::resource('posts','PostController');

//comments
	Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
	Route::get('comment/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
	Route::put('comment/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
	Route::delete('comment/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);

	Route::get('comment/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);
	//we need to make this extra route beecause a simple button only do a get request	


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//category route
Route::group(['middleware' => ['auth', 'web']], function() {
  // uses 'auth' middleware plus all middleware from $middlewareGroups['web']
  Route::resource('categories','CategoryController',['except' => ['create']]); 
  // you can also use only in place of except
  Route::resource('tags','TagController',['except'=>['create']]);
});