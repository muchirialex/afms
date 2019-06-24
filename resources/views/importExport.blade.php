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

          <li class="nav-item active">
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
            <a class="navbar-brand" href="{{ url('importExport') }}">Upload / Download Fleet</a>
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
      <div class="container importExport" style="padding:6em 0 0 14em;">
          <br>
          @if ( Session::has('success') )
              <div class="alert alert-success alert-dismissible" role="alert" style="float:left;margin-top:-6em;width:40%;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                  </button>
                  <strong>{{ Session::get('success') }}</strong>
              </div>
          @endif
    
          @if ( Session::has('error') )
              <div class="alert alert-danger alert-dismissible" role="alert" style="float:left;padding:4px;padding-top:1em;margin-top:-6em;width:40%;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      <span class="sr-only">Close</span>
                  </button>
                  <strong>{{ Session::get('error') }}</strong>
              </div>
          @endif
    
          @if (count($errors) > 0)
              <div class="alert alert-danger" style="float:left;padding:4px;padding-top:1em;margin-top:-6em;width:40%;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  <div>
                      @foreach ($errors->all() as $error)
                          <p>{{ $error }}</p>
                      @endforeach
                  </div>
              </div>
          @endif
  
          <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success" onclick="demo.showNotification('bottom','right')">Download CSV</button></a>
          <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success" onclick="demo.showNotification('bottom','right')">Download Excel xlsx</button></a>
          <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success" onclick="demo.showNotification('bottom','right')">Download Excel xls</button></a>
  
    
          <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <br>
              <p id="input-label">Choose your XLSX/CSV File :</p>
              <input type="file" name="file" class="form-control" style="cursor:pointer; width: 25%;">
              <button type="submit" class="btn btn-info" style="margin-top: 1em;">Submit</button>
          </form>
    
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
    var x = confirm("Are you sure you want to delete this user?");
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
          message: "Your <b>Excel</b> is ready for download."
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