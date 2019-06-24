<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - AFMS | Fleet management</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/images/icon.png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/util.css">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                  @csrf
					<span class="login100-form-title p-b-5">
						{{ __('AFMS fleet management') }}
					</span>
					<span class="login100-form-title p-b-25">
						{{ __('Login') }}
					</span>

					@include('partials.errors')
					@include('partials.success')

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: name@abc.xyz">
                        <input id="email" type="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" {{ old('remember-me') ? 'checked' : '' }}>
						<label class="label-checkbox100" for="ckb1">
                            {{ __('Remember me') }}
						</label>
                    </div>
					
					<div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-link p-t-20" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    

					<div class="text-center w-full p-t-25 p-b-20">
						<span class="txt1">
							Or login with
						</span>
					</div>

					<a href="{{ url('/auth/facebook') }}" class="btn-face m-b-10">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="{{ url('/auth/google') }}" class="btn-google m-b-10">
						<img src="images/icon-google.png" alt="GOOGLE">
						Google
					</a>

					<div class="text-center w-full" style="padding-top:15px;">
						<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href="{{ route('register') }}">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>