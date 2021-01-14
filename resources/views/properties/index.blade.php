<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>DawnRealEstate</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'DawnRealEstate') }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}#about_us">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}#services">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('properties')}}">Properties</a>
              </li>
              
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
    
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{route('home')}}" class="dropdown-item">
                          Dashboard
                        </a>
                          <a href="{{route('users.edit-profile')}}" class="dropdown-item">
                              My Profile
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
    
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
          </div>
        </div>
      </nav>
</header>

<main>

  <section class="py-5 text-center" style="background-image: url('images/backsize.jpg');  background-size: cover;">
    <div class="container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light mt-3 mb-3">Find your Home</h1>
        
        <form class="form-inline my-2 my-lg-0" action="{{route('properties')}}" method="GET">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value="{{request()->query('search')}}">
            <button class="btn btn-outline-primary mt-3" type="submit">Search</button>
        </form>
        
      </div>
    </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        @forelse($posts as $post)
        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="/storage/cover_images/{{$post->image}}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">

            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Location: {{$post->location}}</h6>
              <p class="card-text text-muted">
                <label>Price: {{$post->price}}</label> <label style="float: right;">Type: {{$post->category->name}} </label>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('property.show', $post->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Send Message</button>
                </div>
                  <small class="text-muted"><?php $str = explode(" ",$post->created_at); echo $str[0]; ?>  by {{$post->user->name}}</small>
              </div>
            </div>
          </div>
        </div>
        @empty
          <p class="text-center">
            No results found for "<strong>{{request()->query('search')}}</strong>"
          </p>
        @endforelse
        
      </div>

    </div>

    <div class="d-flex justify-content-center mt-5">
      {{$posts->appends(['search' => request()->query('search')])->links()}}
     </div>
     
  </div>


</main>


<footer class="text-muted py-5">
  <div class="container">
    
      <a class="float-end btn btn-dark btn-sm" href="#">Back to top</a>
    <p class="mb-1">&copy; 2021 DawnRealEstate</p>
  </div>
</footer>


    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

      
  </body>
</html>
