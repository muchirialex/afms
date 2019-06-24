<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<script src="customselect.js"></script>
	
<!--===============================================================================================-->
<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="bg-contact100"> 
		<div class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="/images/Lable.png" alt="IMG">
				</div>
                <form class="contact100-form validate-form" action="/vehicles/create-step1" method="POST">
                    {{ csrf_field() }}
					<span class="contact100-form-title">
						SERVICE RECORDS
					</span>
					<span class="contact100-form-title">
					<h5>Client Details</h5>
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Client Name is required">
                    <input class="input100" type="text" name="client_name"  placeholder="Client Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Contact Person is required">
						<input class="input100" type="text" name="contact_person" placeholder="Contact Person">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Contact/Phone is required">
						<input class="input100" type="tel" name="phone" placeholder="Contact/Phone">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Email Address is required">
						<input class="input100" type="email" name="email" placeholder="Email Address">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope-square" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Postal Address is required">
						<input class="input100" type="text" name="address" placeholder="Postal Address">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-card" aria-hidden="true"></i>
						</span>
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
					<div class="container-contact100-form-btn">
						<button type="submit" class="contact100-form-btn">NEXT</button>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
