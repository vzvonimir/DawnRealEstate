@extends('navbar.nav')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->


<div style="background-image: url({{asset('images/loginbg.jpg')}});
position: relative;
width: 100%;
height: 100vh;
padding: 2rem;
background-attachment: fixed;
background-repeat: no-repeat;
background-size: cover;
overflow: hidden;
display: flex;
align-items: center;
justify-content: center;">

  <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
    <h5 class="mb-6">{{ __('Recover your password') }}</h5>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="input-line1" method="POST" action="{{ route('password.email') }}">
        @csrf
      <div class="form-group">
        <input id="email" type="email" placeholder="Email Adress" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <button class="btn btn-lg btn-block btn-primary" type="submit">{{ __('Reset Password') }}</button>
    </form>

  </div>

</div>

@endsection
