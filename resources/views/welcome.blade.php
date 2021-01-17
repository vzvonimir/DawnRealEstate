<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>DawnRealEstate</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

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

    
    
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
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
            <a class="nav-link" href="#about_us">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
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

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
      <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img" width="100%" height="100%" src="{{asset('images/House2.jpg')}}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>New here?</h1>
            <p>Looking for new home? Dawn Real Estate offers you the vastest selection of luxury homes, property and real estate from all over the world. Any type, anywhere. Find the luxury home of your dreams. Join us.</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('register') }}" role="button">Sign up</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="100%" src="images/house4.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

        <div class="container">
          <div class="carousel-caption">
            <h1>Looking for new Home?</h1>
            <p>Dawn Real Estate is online marketing and selling project/site. We offer a wide variety of buyers, sellers and properties. Our goal is to make the selling or buying the property as easy as possible.</p>
            <p><a class="btn btn-lg btn-primary" href="{{route('properties')}}" role="button">Browse properties</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="100%" src="images/slika3.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Let's get in touch.</h1>
            <p>If you have any questions, please contact us.</p>
            <p><a class="btn btn-lg btn-primary" href="{{route('contact')}}" role="button">Contact us</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing" id="about_us">
    <h1 class="d-flex justify-content-center mb-5 pb-5">About Us</h1>
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/zvone4.jpg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2>Zvonimir Vištica</h2>
        <p>My name is Zvonimir Vištica, I was born on 2nd of July in 1999 in Bosnia and Herzegovina in Ljubuški.
          I am studying computer science at FSRE in Mostar. I am currently in my third year of study.
           I worked on this project as a backend and frontend developer.
        </p>
        <p><a class="btn btn-secondary" href="{{route('contact')}}" role="button">Contact &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/robert.jpg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2>Robert Čačija</h2>
        <p>My name is Robert Čačija, I was born on 28th of April in 1999 in Croatia. I currently live in Sinj.
          I am studying computer science at FSRE in Mostar. I am currently in my third year of study.
           I worked on this project as a frontend developer.
        </p>
        <p><a class="btn btn-secondary" href="{{route('contact')}}" role="button">Contact &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/josip.jpg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2>Josip Kordić</h2>
        <p>My name is Josip Kordić, I was born on 23rd of March in 2000 in Bosnia and Herzegovina. I'm currently living in Čitluk.
          I am studying computer science at FSRE in Mostar. I am currently in my third year of study.
          I worked on this project as a frontend developer.
        </p>
        <p><a class="btn btn-secondary" href="{{route('contact')}}" role="button">Contact &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider" id="services">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">How the Real Estate Industry works? <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Despite the magnitude and complexity of the real estate market, many people tend to think the industry consists merely of brokers and salespeople. However, millions of people in fact earn a living through real estate, not only in sales but also in appraisals, property management, financing, construction, development, counseling, education, and several other fields.</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="images/house3.jpg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">What we offer? <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">We offer a wide variety of buyers, sellers and properties.
           Our goal is to make the selling or buying the property as easy as possible.
            With us you can easily sell your property.
           Or if you are looking for new home, 
          our team will help you find the perfect house for you.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="images/kuca1.jpg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Why we are the best? <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Many professionals and businesses—including accountants, architects, banks, title insurance companies, surveyors, and lawyers works for us. And we are offering the best services in the Real Estate World for our clients.</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="images/kuca2.jpg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

  <div class="container">
    <h1 class=" d-flex justify-content-center mb-2">Technologies</h1>
    <div class="row text-center">
      <div class="col-lg-2 mx-auto">
        <img width="110" height="85" src="img/html.png" style="margin-top: 2rem;">
      </div>
      <div class="col-lg-2 mx-auto">
        <img width="110" height="85" src="img/css.png" style="margin-top: 2rem;">
      </div>
      <div class="col-lg-2 mx-auto">
        <img width="110" height="85" src="img/bootstrap.png" style="margin-top: 2rem;">
      </div>
      <div class="col-lg-2 mx-auto">
        <img width="110" height="85" src="img/js.png" style="margin-top: 2rem;">
      </div>
      <div class="col-lg-2 mx-auto">
        <img width="110" height="85" src="img/laravel.png" style="margin-top: 2rem;">
      </div>
    </div>
    <hr class="featurette-divider">
  </div>


  <!-- FOOTER -->
  <footer class="container">
    <a class="float-end btn btn-dark btn-sm" href="#">Back to top</a>
    <p>&copy; 2021 DawnRealEstate, <a href="https://github.com/vzvonimir/DawnRealEstate.git" target="_blank">GitHub</a></p>
  </footer>
</main>


    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

      
  </body>
</html>
