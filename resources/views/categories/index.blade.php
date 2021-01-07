@extends('main')

@section('title','| All Series')

@section('content')

  <div class="row">
  	 <div class="col-md-8">
  	 	  <h1 class="font-styling form-spacing-top">Series</h1>
  	 	  <table class="table"><!--the class table gives the bootstrape styling for table--> 
  	 	  	 <thead>
  	 	  	 	<tr>
  	 	  	 		<th>#</th>
  	 	  	 		<th>Name</th>
  	 	  	 	</tr>
  	 	  	 </thead>
               
  	 	  	 <tbody>
  	 	  	 	@foreach($categories as $category)
  	 	  	 	 <tr>
                    <th>{{ $category->id }}</th>
                    <th>{{ $category->name }}</th>
  	 	  	 	 </tr>
  	 	  	 	 @endforeach
  	 	  	 </tbody>
  	 	  </table>
  	 </div><!--end of col-md-8-->

  	 <div class="col-md-4 sidebar-spacing-top">
  	 	 <div class="card bg-light">
  	 	 	<div class="card-body">
  	 	 	 {!! Form::open(['route' => 'categories.store','method'=>'POST']) !!}

  	 	 	   <h2 class="font-styling">New Series</h2>
  	 	 	   {{Form::label('name','Name:',['class'=>''])}}
  	 	 	   {{ Form::text('name',null,['class'=>'form-control'])}}

  	 	 	   {{Form::submit('Create New Series',['class'=>'btn btn-secondary form-spacing-top'])}}
  	 	 	   {!! Form::close() !!}
  	 	 	</div>
  	 	 </div>
  	 </div>
  </div>

@endsection