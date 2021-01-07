@extends('main')
@section('title', '| Edit post')

@section('stylesheets')

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
  {!! Form::model($post, ['route' => ['posts.update', $post->id],'method'=>'PUT','files'=>true]) !!}
  <div class="row">
    <div class="col-md-8 mb-3">
        {{ Form::label('title', 'Title:',["class"=>'form-spacing-top navbar-brand']) }}
        {{ Form::text('title', null, ["class" => 'form-control']) }}

        {{ Form::label('slug', 'Slug:',["class"=>'form-spacing-top-title navbar-brand']) }}
        {{ Form::text('slug', null, ["class" => 'form-control']) }}

        {{ Form::label('category_id','Series:',["class"=>'form-spacing-top-title navbar-brand']) }}
        <select class="form-control" name="category_id">
             @foreach($categories as $category)
             <option value="{{ $category->id }}">{{ $category->name }}</option>
             @endforeach
        </select>

         {{ Form::label('tags','Tags:',["class"=>'form-spacing-top-title navbar-brand']) }}
         {{ Form::select('tags[]',$tags,null,["class"=>"js-example-basic-multiple form-control",'multiple'=>'multiple']) }}

         {{ Form::label('featured_image','Update Image:',["class"=>'form-spacing-top-title navbar-brand']) }}
         {{ Form::file('featured_image',['class'=>'form-control']) }}


        {{ Form::label('body', 'Body:',["class"=>'form-spacing-top-title navbar-brand']) }}
        {{ Form::textarea('body', null, ["class" => 'form-control']) }}
    </div>
    <div class="col-md-4 mb-3 sidebar-spacing-top">
        <div class="card bg-light ">
            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{ date('M j, Y - H:ia', strtotime($post-> created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y - H:ia', strtotime($post-> updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::submit('Save', ["class"=>'btn btn-success btn-block']) }}    
                    </div>
                    <div class="col-sm-6">
                        <!-- Laravel way to create an anchor element linked to a route -->
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
    {!! Form::close()!!}
@endsection
@section('scripts')

   {!! Html::script('js/select2.min.js') !!}
  
  <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  </script>

@endsection