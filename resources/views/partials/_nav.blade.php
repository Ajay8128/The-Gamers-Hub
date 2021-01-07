 <!--Default Bootstrape Navbar -->
         <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="height:65px;">
      <a class="navbar-brand" href="#">


        <svg class="bi bi-house" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 00.5.5h9a.5.5 0 00.5-.5V7h1v6.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5zm11-11V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/>
        </svg>


      The Gamer's Hub!</a>

     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="{{ Request::is('/') ? "active":"" }}">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
           <li class="{{ Request::is('blog') ? "active":"" }}">
            <a class="nav-link" href="/blog">Blog <span class="sr-only">(current)</span></a>
          </li>
          <li class="{{ Request::is('about') ? "active":"" }}">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="{{ Request::is('contact') ? "active":"" }}">
            <a class="nav-link" href="/contact">Contact</a>
          </li>

      @if (Auth::check())

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle font-styling" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hello-{{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
              <a class="dropdown-item" href="{{ route('categories.index') }}">Series</a>
              <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
            </div>
          </li> 

      @else

           <a href="{{ route('login') }}" class="btn btn-default"><b>Login!

            <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
            </svg>


           </b></a>
    
      @endif

        </ul>
        
      </div>
       <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 " type="search" placeholder="Looking for Something??" aria-label="Search" style="height:30px;width:210px;">
          <button class="btn btn-outline-secondary my-2 my-sm-0 btn-sm" type="submit" >Search</button>
        </form>

      </nav>