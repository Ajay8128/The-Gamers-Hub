@extends('main')

@section('title',"| Edit Tag")

@section('content')

    {!! Form::model($tag, ['route' => ['tags.update', $tag->id],'method'=>'PUT']) !!}

     {{ Form::label('name','Name:',["class"=>'form-spacing-top navbar-brand']) }}
     {{ Form::text('name',null,['class'=>'form-control']) }}

     {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-lg form-spacing-top-title']) }}

   {!! Form::close() !!}

@endsection