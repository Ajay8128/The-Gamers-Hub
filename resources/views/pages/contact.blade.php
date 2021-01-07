@extends('main')
@section('title','| Contact')
@section('content')
        <div class="row bg-light form-spacing-top">
          <div class="col-md-12 button-spacing-tb">
            <h1 class="font-styling">Contact Me</h1>
            <hr>
            <form action="{{ url('contact') }}" method="POST"><!--we have not used the routes because we dont have the named routes but that can be done easily in the routes file-->
              {{ csrf_field() }}
               <div class="form-group">
                <label name="email">Email:</label>
                <input id="email" name="email" class="form-control">
               </div>

               <div class="form-group">
                <label name="subject">Subject:</label>
                <input id="subject" name="subject" class="form-control">
               </div>
               
               <div class="form-group">
                <label name="message">Message:</label>
                <textarea id="message" name="message" class="form-control" placeholder="Type Your Message Here"></textarea>
               </div>

               <input type="submit" value="Send Message" class="btn btn-success">
            </form>
          </div>
        </div>
@endsection