<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>DawnRealEstate</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
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

    
        <div class="container mt-5">
            <hr class="featurette-divider">
        </div>
      

  <!-- Page Content -->
<div class="container">

  @if(session()->has('success'))
      <div class="alert alert-success">
          {{session()->get('success')}}
      </div>
      @endif

    <!-- Portfolio Item Heading -->
    <h1 class="my-4">
      {{$post->title}}
    </h1>
  
    <!-- Portfolio Item Row -->
    <div class="row">
  
      <div class="col-md-7">
        <!--src="http://placehold.it/750x500"-->
        <img width="750" height="500" class="img-fluid" src="{{asset('storage/cover_images/'.$post->image)}}" alt="">
      </div>
  
      <div class="col-md-5">
        <h3 class="my-3">Property Description</h3>
        <p>{{$post->description}}</p>
        <h3 class="my-3">Property Details</h3> 
        <ul>
          <li><b>Location:</b> {{$post->location}}</li>
          @foreach($post->tags as $tag)
            <li><b>Property type:</b> {{$tag->name}}</li>
          @endforeach
          <li><b>Type:</b> {{$post->category->name}}</li>
          <li><b>Price:</b> {{$post->price}}</li>  
        </ul>
        <div class="mt-5">
          <a type="button" class="btn btn-sm btn-secondary" onclick="sendMessage({{$post->id}})">Send Message</a>
          <small style="float: right;" class="text-muted"><?php $str = explode(" ",$post->created_at); echo $str[0]; ?>  by {{$post->user->name}}</small>
          <!--<label style="float: right;">afadf</label>-->
        </div>
      </div>
  
      
    </div>
    <!-- /.row -->
   <!-- <hr class="featurette-divider mt-4">-->

   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background-color: rgb(192, 191, 191);">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Send Message</h5>
          <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
          <form method="POST" action="" id="formID">
            @csrf
            @include('partials.errors')
          <div class="form-group mt-3">
            <input id="name" type="text" placeholder="Your Name" class="form-control" name="name" required autocomplete="name" autofocus>
          </div>
    
          <div class="form-group mt-3">
            <input id="email" type="email" name="email" placeholder="Your Email" class="form-control" required autocomplete="email">
          </div>
    
          <div class="form-group mt-3">
            <textarea id="text" type="text" placeholder="Message" class="form-control" name="message"></textarea>
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalClose">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
      </div>
    </div>
  </div>



  </div>
 <!--   <div class="container">
    
    <h3 class="my-4">Related Properties</h3>
  
    <div class="row">
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
      </div>
  
      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
              <img class="img-fluid" src="http://placehold.it/500x300" alt="">
            </a>
      </div>
  
    </div>
   
  </div>
  
-->
</main>


<footer class="text-muted py-5 ">
  <div class="container ">
    <hr class="featurette-divider">
      <a class="float-end btn btn-dark btn-sm" href="#">Back to top</a>
    <p class="mb-1">&copy; 2021 DawnRealEstate</p>
  </div>
</footer>


    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
      function sendMessage(id){
          var form = document.getElementById('formID');
          let url = "{{ route('message.send', ':id') }}";
          url = url.replace(':id', id);
          form.action = url;
          $('#myModal').modal('show');
      };

      $(function () {
        $('#modalClose').on('click', function () {
            $('#myModal').modal('hide');
        })
    });

    $(function () {
        $('#close').on('click', function () {
            $('#myModal').modal('hide');
        })
    });
  </script>

  </body>
</html>
