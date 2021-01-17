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

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/style.css')}}" />
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
   
    <div class="container1" style="background-image: url(images/lux.jpg);">
      
      
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Want to list your property on DawnRealEstate?
            You do not know how, if you have problems or some questions feel free to contact us. 
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>114 Ljubuski, BIH</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>lorem@ipsum.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          
        </div>

        <div class="contact-form">

          <form action="{{ url('contact/send') }}" method="POST" autocomplete="off">
            @csrf
            <h3 class="title">Contact us</h3>
            @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
            @endif
            @include('partials.errors')
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Name</label>
              <span>Name</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="send" value="Send" class="btn btn-primary" />
          </form>
        </div>
      </div>
    </div>

</main>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/contact.js')}}"></script>
  </body>
</html>