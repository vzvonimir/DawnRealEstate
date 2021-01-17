<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DawnRealEstate') }}</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <style>
        .btn-info{
            color: #fff;
        }
    </style>

    @yield('css')

</head>
<body style="background-color: rgb(223, 221, 221);">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'DawnRealEstate') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        <main class="py-4">
            @auth
                <div class="container">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <ul class="list-group">
                                @if(auth()->user()->isAdmin())
                                <li class="list-group-item">
                                   <!-- <a href="{{route('users.index')}}">
                                        Users
                                    </a>-->
                                    <a class="nav-link" href="{{route('users.index')}}">
                                        <span data-feather="users"></span>
                                        Users
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <!--<a href="{{route('tags.index')}}">Tags</a>-->
                                    <a class="nav-link" href="{{route('tags.index')}}">
                                        <span data-feather="list"></span>
                                        Property Tags
                                    </a>              
                                </li>
                                <li class="list-group-item">
                                    <!--<a href="{{route('categories.index')}}">Categoris</a>-->
                                    <a class="nav-link" href="{{route('categories.index')}}">
                                        <span data-feather="layers"></span>
                                        Categories
                                    </a>
                                </li>
                                @endif
                                <li class="list-group-item">
                                    <!--<a href="{{route('posts.index')}}">Posts</a>-->
                                    <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">
                                        <span data-feather="home"></span>
                                        Properties
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <!--<a href="{{route('trashed-posts.index')}}">Trashed Posts</a>-->
                                    <a class="nav-link" href="{{route('trashed-posts.index')}}">
                                        <span data-feather="trash-2"></span>
                                        Trashed Properties
                                    </a>
                                </li>
                            </ul>
                            
                            
                        </div>
                        <div class="col-md-8 mt-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @else
                @yield('content')
            @endauth
        </main>
    </div>


   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="{{asset('js/dashboard.js')}}"></script>

    @yield('scripts')
</body>
</html>
