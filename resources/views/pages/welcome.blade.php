 @extends('main')
 @section('title','| Homepage')
 @section('content')
        <div class="row" style="margin-top:30px;">
          <div class="col-md-12">
            <div class="jumbotron" style="background-color:darkslategray;">
              <h1 class="font-styling" style="font-size:60px;"><b>The Gamer's Hub!</b></h1>
              <p class="lead" style="color:white;"><b>The perfect destination for the Gamer inside you.</b></p>
            </div>
          </div>
        </div> <!--end of row-->
        <div class="row">
          <div class="col-md-8">

            @foreach($posts as $post)

                <div class="post">
                   <h3 class="font-styling">{{ $post->title }}</h3>
                   <p>{{ substr(strip_tags($post->body),0,300)}}{{ strlen(strip_tags($post->body))>300?"...":"" }}</p>
                   <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-secondary">Read More</a>
                </div>
                <hr>

            @endforeach

          </div>
          <div class="col-md-3 offset-1">
            <h2>Sidebar</h2>
          </div>
        </div>
@endsection

