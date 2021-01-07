@extends('main')

@section('title','| Edit Comment')

@section('content')
 <!--Form model binding allows you to associate a form with one of your application's models, and automatically: matches inputs named after model fields. populates the form's fields with an existing model object's data (if you're editing and existing object-->
<div class="col-md-8 offset-2 form-spacing-top">
  <h1>Edit Comment</h1>

  {{ Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT']) }}<!--this sets up form model binding first parameter is the object we wanna sync-->
  
   {{ Form::label('name','Name:') }}
   {{ Form::text('name',null,['class'=>'form-control','disabled'=>'']) }}<!--the diabled paramenter will make the name be shown on the form from database but it will not let the user to edit the name so because we dont want to let the person change his name.-->

   {{ Form::label('email','Email:') }}
   {{ Form::text('email',null,['class'=>'form-control','disabled'=>'']) }}

   {{ Form::label('comment','Comment:') }}
   {{ Form::textarea('comment',null,['class'=>'form-control','rows'=>'5']) }}

   {{ Form::submit('Update Comment',['class'=>'btn btn-success btn-block button-spacing-tb']) }}


  {{ Form::close() }}
</div>


@endsection