<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/images/icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard - AFMS | Fleet management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Raleway+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="/css/dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
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
            <li class="nav-item ">
              <a class="nav-link" href="{{ url('/work') }}">
                <i class="material-icons">content_paste</i>
                <p>Add Fleet</p>
              </a>
            </li>
            <li class="nav-item active">
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
              <a class="nav-link" href="{{ url('/work') }}">
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
              <a class="navbar-brand" href="#pablo">Dashboard</a>
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
      <div class="content" style="margin-top: 40px;">
        <div class="container-fluid">
          <form method="POST" action="{{route('users.update', $user)}}" enctype = "multipart/form-data">
          <div class="row">
              <div class="col-md-3">
                <div class="card card-profile" style="background:none;border:none;box-shadow:none;">
                    <div class="card-avatar">
                    <img class="img" src="/storage/profile_images/{{ $user->profile_image }}" />
                    </div>
                </div>
                <input type="file" name="profile_image" class="form-control" />
                
              </div>
              

            
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('users.update', $user)}}" enctype = "multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company</label>
                          <input type="text" class="form-control" value="AFMS" disabled>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Your Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone number</label>
                          <input class="form-control" type="tel" name="phone" value="{{ $user->phone }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Passport/Identification number</label>
                          <input type="text" class="form-control" name="identification" value="{{ $user->identification }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" name="city" value="{{ $user->city }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" class="form-control" name="country" value="{{ $user->country }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Address</label>
                          <input type="text" class="form-control" name="postalcode" value="{{ $user->postalcode }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Twitter/Facebook/GiHub/LinkedIn Url</label>
                          <input type="text" class="form-control" name="twitter" value="{{ $user->twitter }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Bio...</label>
                            <textarea class="form-control" name="bio" rows="5">{{ $user->bio }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-info pull-right">{{ __('Update Details') }}</button>
                    <div class="clearfix"></div>
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
  <script src="/js/dashboard/core/jquery.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/core/popper.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="/js/dashboard/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chartist JS -->
  <script src="/js/dashboard/plugins/chartist.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/dashboard/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
</body>

</html>