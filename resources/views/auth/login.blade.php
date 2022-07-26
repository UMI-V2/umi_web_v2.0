<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">

    <title>{{ config('app.name') }} | Login</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>{{ config('app.name') }}</h3>
              <p class="mb-4">Silahkan Masukan Email dan Password anda</p>
            </div>
            <form method="post" action="{{ url('/login') }}">
                @csrf
              <div class="form-group first">
                <label for="username"></label>
                <input type="email" name="email" value="{{ old('email') }}"
                placeholder="Email" class="form-control @error('email') is-invalid @enderror" id="username">
                @error('email')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group last mb-4">
                <label for="password"></label>
                <input type="password" name="password"
                placeholder="Password" class="form-control @error('password') is-invalid @enderror" id="password">
                @error('password')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0" for="remember"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" id="remember"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

              {{-- <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div> --}}
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/login_main.js') }}"></script>
  </body>
</html>