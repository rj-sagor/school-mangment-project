
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="icon" href="{{asset('backend/images/favicon.ico')}}" type="image/ico" />

   
    <title>@yield('title'){{ config('app.name', 'stowaa') }}</title>

    <!-- Bootstrap -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('backend/css/animate.min.css')}}" rel="stylesheet">
     
    <link href="{{asset('backend/css/custom.min.css')}}" rel="stylesheet">

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{route('login')}}" method="POST">
                @csrf
              <h1>Login Form</h1>
              <div>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
              placeholder="Enter your Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              placeholder=" Enter your pasword" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                        
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Log in</button>
               
                @if (Route::has('password.request'))
                                    <a class="btn btn-link reset_pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            < <form method="POST" action="{{ route('register') }}">
                        @csrf
              <h1>Create Account</h1>
              <div>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
              placeholder="Enter your name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
              placeholder="Enter your Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              placeholder="Enter your Password" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <input id="password-confirm" type="password" class="form-control"
              placeholder="confirm password" name="password_confirmation" required autocomplete="new-password">
              <div>
                <button type="submit" class="btn btn-primary" >Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>


