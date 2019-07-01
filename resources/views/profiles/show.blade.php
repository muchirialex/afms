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
            <li class="nav-item" style="padding-top:9.75em;">
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
            <a class="navbar-brand" href="/profiles/{{$user->id}}">User Profile</a>
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
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tasks completed: <strong style="font-size:1.25em;">#</strong></h4>
                  <p class="card-category">Make sure your profile is up-to-date</p>
                  <div class="add-div-btn">
                    <a href="{{$user->id}}/editUser" class="add-user-btn">
                      <button class="btn btn-info btn-inline edit-btn">Edit profile</button>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">AFMS</label>
                          <h5 class="bmd-label-floating">AFMS</h5>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <h5 class="bmd-label-floating">{{ $user->email }}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Your Name</label>
                          <h5 class="bmd-label-floating">{{ $user->name }}</h5>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone number</label>
                          <h5 class="bmd-label-floating">{{ $user->phone }}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Passport/Identification number</label>
                          <h5 class="bmd-label-floating">{{ $user->identification }}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <h5 class="bmd-label-floating">{{ $user->city }}</h5>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <h5 class="bmd-label-floating">{{ $user->country }}</h5>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Address</label>
                          <h5 class="bmd-label-floating">{{ $user->postalcode }}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="/storage/profile_images/{{$user->profile_image}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">{{ $user->type }}</h6>
                  <h4 class="card-title">{{ $user->name }}</h4>
                  <p class="card-description">
                    {{ $user->bio }}
                  </p>
                  <a href="{{ $user->twitter }}" target="_blank" class="btn btn-info btn-round">Follow</a>
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
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/dashboard/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
</body>

</html>