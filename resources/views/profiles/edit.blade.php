<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AFMS | Fleet management</title>
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
                <form class="login100-form validate-form" method="POST" action="/profiles/{{ $user->id }}" enctype = "multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
					<span class="login100-form-title p-b-55">
                        {{ __('Edit User Profile') }}
                    </span>
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
					<input id="name" type="text" class="input100" name="name" value="{{$user->name}}" placeholder="Name">

                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-smile"></span>
						</span>
                    </div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: name@abc.xyz">
                        <input id="email" type="email" class="input100" name="email" value="{{$user->email}}" placeholder="Email">
                        
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "User type is required">
					<input id="type" type="text" class="input100" name="type" value="{{$user->type}}" placeholder="User type">

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-users"></span>
						</span>
					</div>

					<div class="switch_box box_4">
						<div class="input_wrapper">
							{{ Form::checkbox('status', '1', $user->status, ['class' => 'switch_4']) }}
							<svg class="is_checked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.67 426.67">
								<path d="M153.504 366.84c-8.657 0-17.323-3.303-23.927-9.912L9.914 237.265c-13.218-13.218-13.218-34.645 0-47.863 13.218-13.218 34.645-13.218 47.863 0l95.727 95.727 215.39-215.387c13.218-13.214 34.65-13.218 47.86 0 13.22 13.218 13.22 34.65 0 47.863L177.435 356.928c-6.61 6.605-15.27 9.91-23.932 9.91z"/>
							</svg>
							<svg class="is_unchecked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982">
								<path d="M131.804 106.49l75.936-75.935c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.49 81.18 30.555 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.99 6.99-6.99 18.323 0 25.312L81.18 106.49 5.24 182.427c-6.99 6.99-6.99 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0L106.49 131.8l75.938 75.937c6.99 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.323 0-25.313l-75.936-75.936z" fill-rule="evenodd" clip-rule="evenodd"/>
							</svg>
						</div>
					</div>

					
					
					<div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Update User') }}
                        </button>
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