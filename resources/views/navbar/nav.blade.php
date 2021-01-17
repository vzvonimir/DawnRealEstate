<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DawnRealEstate</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">


    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/style1.css')}}" />
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
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'DawnRealEstate') }}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <li class="nav-item ">
                    <a class="nav-link"  href="{{ url('/') }}">Home</a>
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
                
                <ul class="navbar-nav ml-auto">
                 
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

    


    @yield('content')

  </main>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/contact.js')}}"></script>
  
  </body>
</html>