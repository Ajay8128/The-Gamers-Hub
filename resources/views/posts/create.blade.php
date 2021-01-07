@extends('main')

@section('title','|Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

    <script src="https://cdn.tiny.cloud/1/dxgpc02fuucidn5ne35sqg2int11rx5ot10km0yjjleb54t8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: 'textarea'
      });
    </script>
<!--for using the tinymce editor u will need to remove the required validate from the client side ,the server side validation can be there safely but there should be not any client side validations--> 

@endsection

 

@section('content')

  <div class="row">
    <div class="col-md-8 offset-2">
    	<h1 class="font-styling form-spacing-top">Create New Post</h1>
    	<hr>

        {!! Form::open(['route' => 'posts.store','data-parsley-validate' => '','files'=>true]) !!}
           {{Form::label('title','Title:',["class"=>' navbar-brand'])}}
           {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength' => '255'))}}
            
           {{Form::label('slug','Slug:',["class"=>'form-spacing-top-title navbar-brand'])}}
           {{Form::text('slug',null,['class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255'])}}

           {{Form::label('category_id','Series:',["class"=>'form-spacing-top-title navbar-brand'])}}
           <select class="form-control" name="category_id">
             @foreach($categories as $category)
             <option value="{{ $category->id }}">{{ $category->name }}</option>
             @endforeach
           </select>

            {{ Form::label('tags','Tags:',["class"=>'form-spacing-top-title navbar-brand']) }}
            <select  class=" form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
             @foreach($tags as $tag)
                 <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                 @endforeach
            </select>

            {{Form::label('featured_image','Upload Image:',['class'=>'form-spacing-top-title navbar-brand'])}}
            {{ Form::file('featured_image',['class'=>'form-control']) }}

           {{Form::label('body',"Post Body:",["class"=>'form-spacing-top-title navbar-brand'])}}
           {{Form::textarea('body',null,array('class'=>'form-control'))}}

           {{Form::submit('Create Post',array('class'=>'brn btn-success btn-lg btn-block','style'=>'margin-top:20px;'))}}
        {!! Form::close() !!}

    </div>
  </div>  	

@endsection

@section('scripts')

   {!! Html::script('js/select2.min.js') !!}
  
 <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
</script>
@endsection