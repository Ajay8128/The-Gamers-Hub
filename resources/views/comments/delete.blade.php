@extends('main')

@section('title','| Delete Comment')

@section('content')

  <div class="row">
  	 <div class="col-md-8 offset-2">
  	 	 <h1 class="font-styling form-spacing-top">DELETE THIS COMMENT</h1>
  	 	 <p>
  	 	 	 <strong>Name:</strong> {{ $comment->name }}<br>
  	 	 	 <strong>Email:</strong> {{ $comment->email }}<br>
  	 	 	 <strong>Comment:</strong> {{ $comment->comment }}
  	 	 </p>
  	 	{{ Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE']) }}

              {{Form::submit('YES DELETE THIS COMMENT!',['class'=>'btn btn-danger btn-block btn-spacing-tb'])}}

  	 	{{ Form::close() }}
  	 </div>
  </div>

@endsection