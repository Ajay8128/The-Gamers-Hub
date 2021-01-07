<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller{

	public function getIndex(){
		$posts=Post::orderBy('created_at','desc')->limit(8)->get();//this is query builder as all of these ends with get()
		return view('pages.welcome')->withPosts($posts);

	}
	public function getAbout(){
		$first= 'Ajay';
		$last='Pareek';
		$fullname= $first." ".$last;
		$email='ajaypareek242@gmail.com';
		$data=[];
		$data['fullname']=$fullname;
		$data['email']=$email;
		return view('pages/about')->withData($data);

	}
	public function getContact(){
		return view('pages/contact');

	}

	 public function postContact(Request $request){

	 	$this->validate($request,[
	 		'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10']);

	 	$data= array(
          'email'=>$request->email,
          'subject'=>$request->subject,
          'bodyMessage'=>$request->message
	 	);

	 	Mail::send('emails.contact',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to('ajaypareek242@gmail.com');
            $message->subject($data['subject']);
	 	});

	 	Session::flash('success','Your Email Was Sent');
	 	return redirect('/');
	 }
}

