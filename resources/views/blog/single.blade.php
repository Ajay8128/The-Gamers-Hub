@extends('main')

@section('title',"| $post->title")<!--double coatation"" means that u can use variables inside as it does interpolation which is not done by single coatation''
  ->we cannot use blade here as it is raw php stuff and not view stuff -->

@section('content')

<div class="card card-adjusting">
    <div class="card-body" style="background-color:#eeeeee;border-radius:5px;">
     <div id="comment-form" class=" form-spacing-top-title">
        {{ Form::open(['route'=>['comments.store',$post->id],'method'=>'POST']) }}

           <div>
              {{ Form::label('name','Name:') }}
              {{ Form::text('name',null,['class'=>'form-control']) }}
           </div>

           <div>
              {{ Form::label('email','Email:') }}
              {{ Form::text('email',null,['class'=>'form-control']) }}
           </div>

           <div>
              {{ Form::label('comment','Comment:') }}
              {{ Form::textarea('comment',null,['class'=>'form-control','rows'=>'5']) }}
              {{ Form::submit('Add Comment',['class'=>'btn btn-secondary btn-block form-spacing-top']) }}
           </div>

        {{ Form::close() }}
     </div>
   </div>
</div>

  <div class="blog-adjusting">
  	 <div class="col-md-8">
         <img src="{{ asset('images/'. $post->image) }}" style="height:400px;width:800px;border-radius: 5px;margin-top: 25px;"  alt=" This is an image Soon to be updated!">
    	 	 <h1 class="font-styling form-spacing-top"><u>{{ $post->title }}:</u></h1>
    	 	 <p>{!! $post->body !!}</p>
    	 	 <hr>
    	 	 <p><b>Posted In:</b> {{ $post->category->name}}<!--We did not do any changes to the controllers as we have linked both the databases we can directly access here-->

    	 	 <!--we can choose any colomn from the category table because we are accessing the whole table here 
    	 	   like created_at , updated_at-->
             <div class="tags"><b>Tags:</b>
               @foreach($post->tags as $tag)
                 <spam class="badge badge-secondary">{{ $tag->name }}</spam>
               @endforeach
             </div>
          </p>
         <hr>
         <p> <a href="{{ $post->link }}" class="btn btn-success btn-block">Download {{ $post->title }} full game>></a>
         </p>
         <hr>
  	 </div>
  
     <div class="comment-adjusting">
      <h3>

          <svg class="bi bi-chat-square-dots-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="     currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 2a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-2.5a1 1 0 00-.8.4l-1.9 2.533a1 1 0 01-1.6 0L5.3 12.4a1 1 0 00-.8-.4H2a2 2 0 01-2-2V2zm5 4a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm3 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg><!--for the icon-->

       {{ $post->comments()->count() }}-Comments</h3>
       @foreach($post->comments as $comment)
          <div class="comment">
             <div class="author-info">
               <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim('$comment->email'))) . "?s=50&d=retro"}}" class="author-image">
                 <div class="author-name">
                   <h4> {{ $comment->name }}</h4>
                   <p class="author-time">{{ date('F nS, Y - g:ia',strtotime($comment->created_at)) }}</p>
                 </div>
             </div>

             <div class="comment-content">
               {{ $comment->comment }}
             </div>
             <hr>
          </div>
       @endforeach
     </div>  
</div>
@endsection