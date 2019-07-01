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
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/photochamp/images/sidebar-1.jpg">
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
                <p>Workspace</p>
              </a>
            </li>
            <li class="nav-item">
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
                <p>Workspace</p>
              </a>
            </li>
          @endif
          
          @if(auth()->user()->isAdmin())
            <li class="nav-item active">
            <a class="nav-link" href="{{ url('/admin') }}">
                <i class="material-icons">people</i>
                <p>Manage Users</p>
            </a>
            </li>

            <li class="nav-item ">
            <a class="nav-link" href="{{ url('/importExport') }}">
                <i class="material-icons">backup</i>
                <p>Upload Tasks</p>
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
          <form method="POST" action="/profiles/{{ $user->id }}" enctype = "multipart/form-data">
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
                          <input type="text" class="form-control" value="PhotoChamp" disabled>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Your Name</label>
                          <input type="text" name="name" class="form-control" name="name" value="{{ $user->name }}">
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Role</label>
                          <input id="type" type="text" class="form-control" name="type" value="{{$user->type}}">
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
                      <div class="col-md-4">
                        <div class="switch_box box_4" style="margin-top:1.5em;">
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
                      </div>
                      <div class="col-md-8">
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