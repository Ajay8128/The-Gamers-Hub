@extends('main')

@section('title','| All Tags')

@section('content')

  <div class="row">
  	 <div class="col-md-8">
  	 	  <h1 class="font-styling form-spacing-top">Tags</h1>
  	 	  <table class="table"><!--the class table gives the bootstrape styling for table--> 
  	 	  	 <thead>
  	 	  	 	<tr>
  	 	  	 		<th>#</th>
  	 	  	 		<th >Name</th>
              <th></th>
  	 	  	 	</tr>
  	 	  	 </thead>
               
  	 	  	 <tbody>
  	 	  	 	@foreach($tags as $tag)
  	 	  	 	 <tr>
                    <th>{{ $tag->id }}</th>
                    <th>{{ $tag->name }}</th>
                    <th><a href="{{ route('tags.show',$tag->id) }}" class="btn btn-success-link">See all Posts>></a></th>
  	 	  	 	 </tr>
  	 	  	 	 @endforeach
  	 	  	 </tbody>
  	 	  </table>
  	 </div><!--end of col-md-8-->

  	 <div class="col-md-4 sidebar-spacing-top">
  	 	 <div class="card bg-light">
  	 	 	<div class="card-body">
  	 	 	 {!! Form::open(['route' => 'tags.store','method'=>'POST']) !!}

  	 	 	   <h2 class="font-styling">New Tag</h2>
  	 	 	   {{Form::label('name','Name:',['class'=>''])}}
  	 	 	   {{ Form::text('name',null,['class'=>'form-control'])}}

  	 	 	   {{Form::submit('Create New Tag',['class'=>'btn btn-secondary form-spacing-top'])}}
  	 	 	   {!! Form::close() !!}
  	 	 	</div>
  	 	 </div>
  	 </div>
  </div>

@endsection 