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
          @if(auth()->user()->isAdmin())
            <li class="nav-item">
              <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/vehicles') }}">
                  <i class="material-icons">people</i>
                  <p>Manage Fleet</p>
              </a>
            </li>

            <li class="nav-item ">
            <a class="nav-link" href="{{ url('users/show') }}">
                <i class="material-icons">person</i>
                <p>My Account</p>
              </a>
            </li>

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
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/vehicles') }}">
                  <i class="material-icons">people</i>
                  <p>Manage Fleet</p>
              </a>
            </li>

            <li class="nav-item ">
              <a class="nav-link" href="{{ url('users/show') }}">
                  <i class="material-icons">person</i>
                  <p>My Account</p>
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
              <a class="navbar-brand" href="{{ url('admin') }}">All Fleet</a>
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
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0"> AFMS Fleet</h4>
                    <p class="card-category"> List of all our vehicles</p>
                    <div class="add-div-btn">
                      <a href="{{ URL::to('exportUsers/csv') }}" class="add-user-btn">
                        <button class="btn btn-info btn-inline" onclick="demo.showNotification('bottom','right')">Export Fleet</button>
                      </a>
                      <a href="{{ url('/vehicles/create-step1') }}" class="add-user-btn">
                        <button class="btn btn-info btn-inline btn-inline-2">Add Fleet</button>
                      </a>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                        <thead class="">
                            <th>
                            &nbsp;&nbsp; #
                            </th>
                            <th>
                            Service number
                            </th>
                            <th>
                            Client name
                            </th>
                            <th>
                            Vehicle registration
                            </th>
                            <th>
                            Actions
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                            <tr>
                            <td>
                                <!--<img src="/storage/profile_images/{{--$user->profile_image --}}" style="height:35px; width:35px;" class="avatar" alt="Avatar">-->
                            </td>
                            <td>
                              <a href="/vehicles/show/{{$vehicle->id}}">
                                {{ str_pad($vehicle->id, 6, '0', STR_PAD_LEFT) }}
                              </a>
                            </td>

                            <td>
                              {{$vehicle->client_name}}
                            </td>
                            <td>
                              {{$vehicle->registration_number}}
                            </td>
                            <!--<td>
                                {{--$vehicle->created_at->format('d-M-Y')--}}
                            </td>-->
                            <td class="actions-btn">
                                <a href="/profiles/{{$vehicle->id}}/edit" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons" style="margin-top:-14px;">&#xE8B8;</i></a>
                                
                                <form method="POST" action="/vehicle/{{ $vehicle->id }}/delete" onsubmit = "return ConfirmDelete()">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    
                                    <button type="submit" class="btn-delete" title="Delete" data-toggle="tooltip">
                                        <i class="material-icons">&#xE5C9;</i>
                                    </button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <!--<div class="clearfix">
                            <div class="hint-text">Showing <b>{{-- $vehicles->firstItem() --}} - {{-- $vehicles->lastItem() --}}</b> out of <b>{{-- $vehicles->total() --}}</b> entries</div>
                            {{--$vehicles->links()--}}
                        </div>-->
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
  <!-- //JavaScript -->
  <script type="text/javascript">
    $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-danger").slideUp(500);
    });

    $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(500);
    });

    function ConfirmDelete() {
    var x = confirm("Are you sure you want to delete this record?");
    if (x)
    return true;
    else
    return false;
    }
  </script>
  <script>
    demo = {
      showNotification: function(from, align) {
        type = ['', 'success'];
        color = Math.floor( + 1);
        $.notify({
          icon: "add_alert",
          message: "Your <b>CSV</b> is ready for download."
        }, {
          type: type[color],
          timer: 3000,
          placement: {
            from: from,
            align: align
          }
        });
      }
    }
  </script>
  <script src="js/dashboard/plugins/bootstrap-notify.js"></script>
</body>

</html>