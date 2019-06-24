<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotoChamp | The Snapshot place!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/images/icon.png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/util.css">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ url('changepassword') }}" aria-label="{{ __('Register') }}">
                  @csrf
					<span class="login100-form-title p-b-55">
                        {{ __('Change Password') }}
                    </span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input id="password" type="password" class="input100{{ $errors->has('passwordold') ? ' is-invalid' : '' }}" placeholder="Old password" name="passwordold">
                        @if ($errors->has('passwordold'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('passwordold') }}</strong>
                            </span>
                        @endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New password" name="password">
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
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password confirmation is required">
                        <input id="password-confirm" type="password" class="input100" name="password_confirmation" placeholder="Confirm password">
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-pointer-up"></span>
						</span>
                    </div>
					
					<div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Change Password') }}
                        </button>
                    </div>
				</form>
			</div>
		</div>
    </div>


    @include('alertify::alertify')
    
    <script src="js/main.js"></script>

</body>
</html>