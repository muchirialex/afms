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
				<form class="contact100-form validate-form" method="POST" action="/vehicles/create-step3">
                    {{ csrf_field() }}
					<span class="contact100-form-title">
						SERVICE RECORDS
					</span>
					<span class="contact100-form-title">
					<h5>Gadget Details</h5>
					</span>					
					<div class="wrap-input100 validate-input" data-validate = "Gadget Type is required">
						<input class="input100" type="text" name="gadget_type" placeholder="Gadget Type">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</span>
					</div>
					<div>
						<h7>Gadget Condition</h7>
						<label class="container">New
							<input type="radio" name="condition" value="New">
							<span class="checkmark"></span>
						</label>
						<label class="container">Transfered
							<input type="radio" name="condition" value="Transferred">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Serial Number is required">
						<input class="input100" type="text" name="serial" placeholder="Serial Number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-barcode" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Warranty is required">
						<input class="input100" type="number" name="warranty" placeholder="Warranty(months)" min="0" max="12">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Date of Issue is required">Date of Issue
						<input class="input100" type="date" name="issue_date" placeholder="Date of Issue">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Validity Period is required">
						<input class="input100" type="number" name="validity" placeholder="Validity Period(Months)" min="1" max="60">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Expiry Date is required">Expiry Date
						<input class="input100" type="date" name="expiry_date" placeholder="Expiry Date">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>
										<div class="wrap-input100 validate-input" data-validate = "Installer's Name is required">
						<input class="input100" type="text" name="installer" placeholder="Installer Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="container-contact100-form-btn">
						<button type="submit" class="contact100-form-btn">
                            <a href="/vehicles/create-step2" style="color:#fff; font-weight:700;text-decoration:none;">
                                BACK
                            </a>
                        </button>
                    </div>
                    
					<div class="container-contact100-form-btn">
						<button type="submit" class="contact100-form-btn">
							VALIDATE
						</button>
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
