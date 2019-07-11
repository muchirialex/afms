<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="/images/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard - AFMS | Fleet management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Raleway+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="/css/dashboard.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="/css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/images/sidebar-1.jpg">
      <div class="logo" style="border-bottom:none;">
        <img src="/storage/profile_images/{{ Auth::user()->profile_image }}" style="float:left; margin-left:20px;width:55px;height:55px;border-radius:50%;">
        <h2 class="simple-text logo-normal" style="text-transform:none;margin:10px 5em 0 0;">
          {{ strtok(Auth::user()->name, " ") }}
        </h2>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
            @if(auth()->user()->isAdmin())
              <li class="nav-item">
              <a class="nav-link" href="{{ url('/dashboard') }}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
              </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/vehicles/create-step1') }}">
                  <i class="material-icons">content_paste</i>
                  <p>Add Fleet</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{ url('users/show') }}">
                  <i class="material-icons">person</i>
                  <p>My Account</p>
                </a>
              </li>
            @else
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/users/show') }}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link" href="{{ url('/vehicles') }}">
                    <i class="material-icons">people</i>
                    <p>Manage Fleet</p>
                </a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link" href="{{ url('/vehicles/create-step1') }}">
                  <i class="material-icons">content_paste</i>
                  <p>Add Fleet</p>
                </a>
              </li>
            @endif
            
            @if(auth()->user()->isAdmin())
              <li class="nav-item">
              <a class="nav-link" href="{{ url('/admin') }}">
                  <i class="material-icons">people</i>
                  <p>Manage Users</p>
              </a>
              </li>

              <li class="nav-item ">
              <a class="nav-link" href="{{ url('/importExport') }}">
                  <i class="material-icons">backup</i>
                  <p>Upload Fleet</p>
              </a>
              </li>
            @endif

            @if(auth()->user()->isAdmin())
            <li class="nav-item" style="padding-top:6em;">
              <a class="nav-link" href="{{ url('changepassword') }}">
                <i class="fa fa-key"></i>
                <p>{{ __('Change password') }}</p>
              </a>
            </li>
            @else
            <li class="nav-item" style="padding-top:106.25%;">
              <a class="nav-link" href="{{ url('changepassword') }}">
                <i class="fa fa-key"></i>
                <p>{{ __('Change password') }}</p>
              </a>
            </li>
            @endif
            
            <li class="nav-item active-pro ">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="material-icons">exit_to_app</i>
                <p>{{ __('Logout') }}</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">

        @include('partials.errors')
        @include('partials.success')       

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              @if(auth()->user()->status != 1)
                <h3 class="text-danger" style="margin-left:1em;font-weight:500;text-align:center;">Your account has been suspended. Please contact our support team.</h3>
              @else
                <a class="navbar-brand" href="{{ url('users/show') }}">SERVICE RECORDS</a>
              @endif
            </div>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
          </div>
        </nav>
        <!-- End Navbar -->
        
      <div class="content" style="margin-top: 50px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Vehicle Details </h4>
                  <p class="card-category">Make sure you completely capture your fleet</p>
                </div>
                <div class="card-body">
					<form action="/vehicles/create-step3" method="POST">
						{{ csrf_field() }}
					<div class="card-body">
						<div class="tab-content">
							<div class="row justify-content-center">
								<div class="col-sm-4">
									<div class="picture-container mt-5">
										<div class="input-group-prepend">
												<span class="input-group-text">
												<i class="material-icons">directions_car</i>
												</span>
											</div>
										<div class="btn-white">
											<label for="exampleInput1" class="bmd-label-floating">Gadget type</label>
											<input class="form-control" type="text" name="gadget_type" autocomplete="off">
										</div>
									</div>

									<div class="picture-container mt-5">
										<div class="input-group-prepend">
												<span class="input-group-text">
												<i class="material-icons">view_carousel</i>
												</span>
											</div>
										<div class="btn-white">
											<label for="exampleInput1" class="bmd-label-floating">Is gadget condition new?</label>
											<div class="col-md-4">
												<div class="switch_box box_4">
													<div class="input_wrapper">
													{{ Form::checkbox('condition', '1', $vehicle->condition, ['class' => 'switch_4']) }}
													<svg class="is_checked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 426.67 426.67">
														<path d="M153.504 366.84c-8.657 0-17.323-3.303-23.927-9.912L9.914 237.265c-13.218-13.218-13.218-34.645 0-47.863 13.218-13.218 34.645-13.218 47.863 0l95.727 95.727 215.39-215.387c13.218-13.214 34.65-13.218 47.86 0 13.22 13.218 13.22 34.65 0 47.863L177.435 356.928c-6.61 6.605-15.27 9.91-23.932 9.91z"/>
													</svg>
													<svg class="is_unchecked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.982 212.982">
														<path d="M131.804 106.49l75.936-75.935c6.99-6.99 6.99-18.323 0-25.312-6.99-6.99-18.322-6.99-25.312 0L106.49 81.18 30.555 5.242c-6.99-6.99-18.322-6.99-25.312 0-6.99 6.99-6.99 18.323 0 25.312L81.18 106.49 5.24 182.427c-6.99 6.99-6.99 18.323 0 25.312 6.99 6.99 18.322 6.99 25.312 0L106.49 131.8l75.938 75.937c6.99 6.99 18.322 6.99 25.312 0 6.99-6.99 6.99-18.323 0-25.313l-75.936-75.936z" fill-rule="evenodd" clip-rule="evenodd"/>
													</svg>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="picture-container mt-5">
										<div class="input-group-prepend">
												<span class="input-group-text">
												<i class="material-icons">directions_car</i>
												</span>
											</div>
										<div class="btn-white">
											<label for="exampleInput1" class="bmd-label-floating">Installer</label>
											<input class="form-control" type="text" name="installer" autocomplete="off">
										</div>
									</div>
								</div>

							<div class="col-sm-6">	
	
								<div class="input-group form-control-lg">
								<div class="input-group-prepend">
									<span class="input-group-text">
									<i class="material-icons">format_list_numbered</i>
									</span>
								</div>
								<div class="form-group select-category">
									<label for="exampleInput1" class="bmd-label-floating">Serial number</label>
									<input class="form-control" type="text" name="serial" autocomplete="off">
								</div>
								</div>

								<div class="input-group form-control-lg">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">confirmation_number</i>
										</span>
									</div>
									<div class="form-group select-category">
										<label for="exampleInput1" class="bmd-label-floating">Warranty (months)</label>
										<input class="form-control" type="number" name="warranty" autocomplete="off">
									</div>
								</div>

								<div class="input-group form-control-lg">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">format_list_numbered_rtl</i>
										</span>
									</div>
									<div class="form-group select-category">
										<label for="exampleInput1" class="bmd-label-static">Issue date</label>
										<input class="form-control" type="date" id="issue_date" name="issue_date" autocomplete="off">
									</div>
								</div>

								<div class="input-group form-control-lg">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">format_list_numbered_rtl</i>
										</span>
									</div>
									<div class="form-group select-category">
										<label for="exampleInput1" class="bmd-label-floating">Validity period (Months)</label>
										<input class="form-control" id="validity" name="validity" autocomplete="off" min="1" max="60">
									</div>
								</div>

								<div class="input-group form-control-lg">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">format_list_numbered_rtl</i>
										</span>
									</div>
									<div class="form-group select-category">
										<label for="exampleInput1" class="bmd-label-static">Expiry date</label>
										<input class="form-control" id="expiry_date" name="expiry_date" autocomplete="off">
									</div>
								</div>
							</div>  
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
								<button type="submit" class="btn btn-info btn-inline edit-btn" style="float:left;">
									<a href="/vehicles/create-step2" style="color:#fff; font-weight:700;text-decoration:none;">
										BACK
									</a>
								</button>
							</div>
							
							<div class="container-contact100-form-btn">
								<button type="submit" class="btn btn-info btn-inline edit-btn" style="float:right;">NEXT</button>
							</div>
						</div>
					</div>	
					</form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script type="text/javascript">
    $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-danger").slideUp(500);
    });

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(500);
    });
  </script>

  <script>
    $('#validity').change(function(){
      let dt = new Date($('#issue_date').val());
      dt.setMonth( dt.getMonth() + parseInt($(this).val()));
      let output = dt.getDate()+'/'+(dt.getMonth()+1)+'/'+dt.getFullYear()
      $('#expiry_date').val(output);
    })
  </script>
  
  <script src="/js/dashboard/core/jquery.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/core/popper.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/js/dashboard/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/dashboard/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
</body>

</html>