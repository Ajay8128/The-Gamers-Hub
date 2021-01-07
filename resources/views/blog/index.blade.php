@extends('main')

@section('title','| Blog' )

@section('content')

 <div >
 	 <div class='button-spacing-tb'>
 	 	<h1><center>BLOGS!</center></h1>
 	 </div>
 	 <hr>
 </div>

 @foreach ($posts as $post)
 <div class='row'>
 	  <div class="col-md-8 offset-2 form-spacing-top">
 	  	<h2>{{ $post->title }}</h2>
 	  	<h5>Published On: {{ date('M j, Y',strtotime($post->created_at)) }}</h5>
 	  	<p>{{ substr(strip_tags($post->body),0,300) }}{{ strlen(strip_tags($post->body))>300?"...":"" }}</p>

 	  	<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-secondary" >Read More</a>
 	  	<hr>
 	  </div>
 </div>
 @endforeach

<div class="row justify-content-center form-spacing-top">
    	 	 {!! $posts->links() !!}
    	 
</div>

@endsection