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
  <link href="css/dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="images/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo" style="border-bottom:none;">
        <img src="/storage/profile_images/{{ Auth::user()->profile_image }}" style="float:left; margin-left:20px;width:55px;height:55px;border-radius:50%;">
        <h2 class="simple-text logo-normal" style="text-transform:none;margin:10px 5em 0 0;">
          {{ strtok(Auth::user()->name, " ") }}
        </h2>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
          <a class="nav-link" href="{{ url('dashboard') }}">
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

          <li class="nav-item ">
          <a class="nav-link" href="{{ url('users/show') }}">
              <i class="material-icons">person</i>
              <p>My Account</p>
            </a>
          </li>

          <li class="nav-item ">
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
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="{{ url('dashboard') }}">Dashboard</a>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-cogs"></i>
                  </div>
                  <p class="card-category">Fleet Count</p>
                  <h3 class="card-title">#</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">assignment</i> All tasks in the system
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">people</i>
                  </div>
                  <p class="card-category">All workers</p>
                  <h3 class="card-title">{{ $workers }}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">group_add</i> Elite workers
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <p class="card-category">All managers</p>
                <h3 class="card-title">{{ $inactiveUsers }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">people</i> Those needing improvement
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment_ind</i>
                  </div>
                  <p class="card-category">Administrators</p>
                <h3 class="card-title">{{ $activeUsers }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Accurate workers
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Tasks Completed</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-check-square"></i> # </span> tasks in this week's output.
                  </p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Tasks in Queue</h4>
                  <p class="card-category">
                    <span class="text-info"><i class="fa fa-cogs"></i> # </span> fleet waiting to be processed.
                  </p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> just checked now
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Tasks Not Processing</h4>
                  <p class="card-category">
                    <span class="text-danger"><i class="fa fa-bomb"></i> # </span> tasks in the system.
                  </p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> uploaded 2 days ago
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="js/dashboard/core/jquery.min.js" type="text/javascript"></script>
  <script src="js/dashboard/core/popper.min.js" type="text/javascript"></script>
  <script src="js/dashboard/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="js/dashboard/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chartist JS -->
  <script src="js/dashboard/plugins/chartist.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="js/dashboard/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>