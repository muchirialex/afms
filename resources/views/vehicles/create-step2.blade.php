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
					<form action="/vehicles/create-step2" method="POST">
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
											<label for="exampleInput1" class="bmd-label-floating">Vehicle make</label>
											<input class="form-control" type="text" name="vehicle_make" autocomplete="off">
										</div>
									</div>

									<div class="picture-container mt-5">
										<div class="input-group-prepend">
												<span class="input-group-text">
												<i class="material-icons">view_carousel</i>
												</span>
											</div>
										<div class="btn-white">
											<label for="exampleInput1" class="bmd-label-floating">Vehicle model</label>
											<input class="form-control" type="text" name="vehicle_model" autocomplete="off">
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
									<label for="exampleInput1" class="bmd-label-floating">Registration number</label>
									<input class="form-control" type="text" onblur="this.value=removeSpaces(this.value);" name="registration_number" autocomplete="off">
								</div>
								</div>

								<div class="input-group form-control-lg">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">confirmation_number</i>
										</span>
									</div>
									<div class="form-group select-category">
										<label for="exampleInput1" class="bmd-label-floating">Engine number</label>
										<input class="form-control" type="text" name="engine_number" autocomplete="off">
									</div>
								</div>

								<div class="input-group form-control-lg">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">format_list_numbered_rtl</i>
										</span>
									</div>
									<div class="form-group select-category">
										<label for="exampleInput1" class="bmd-label-floating">Chassis number</label>
										<input class="form-control" type="text" name="chassis_number" autocomplete="off">
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
									<a href="/vehicles/create-step1" style="color:#fff; font-weight:700;text-decoration:none;">
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
  <script src="/js/dashboard/core/jquery.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/core/popper.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/js/dashboard/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/dashboard/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
</body>

</html>