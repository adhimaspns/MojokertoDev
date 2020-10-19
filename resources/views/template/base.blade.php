<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/summernote/summernote-bs4.css')  }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Untuk menambahkan Custom css  -->
  @stack('customcss')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> --}}

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
            <span class="hidden-xs">
              Hi,
              {{ Auth::user()->name}}
            </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            
            <li class="user-header bg-primary">
              <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      
              <p>
                {{ Auth::user()->name}}
                <small>Member since {{ Auth::user()->created_at->format('Y') }}</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                {{-- TOmbol Logout --}}
                <a href="{{ url('/signout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                  Logout
              </a>    
              <form id="frm-logout" action="{{ url('/signout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
              </div>
            </li>
          </ul>
          
        </li>
      </ul>

    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->name}}</span>
      </a>

      <!-- Sidebar -->
        <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->

              @if (auth()->user()->role == 'admin')
              <li class="nav-item " style="margin: 3px;">
                <a href="{{ url('/home') }}" class="nav-link bg-primary">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p style="margin-left: 10px;">Beranda</p>
                </a>
              </li>
              <li class="nav-item" style="margin: 3px;">
                <a href="{{ url('event') }}" class="nav-link bg-danger text-white">
                  <i class="fas fa-calendar-alt"></i>
                  <p style="margin-left: 10px;">Event</p>
                </a>
              </li>
              <li class="nav-item" style="margin: 3px;">
                <a href="{{ url('showcase') }}" class="nav-link bg-secondary">
                  <i class="fas fa-store"></i>
                  <p style="margin-left: 10px;">Show Case</p>
                </a>
              </li>
              <li class="nav-item" style="margin: 3px;">
                <a href="{{ url('mentor') }}" class="nav-link bg-warning">
                  <i class="nav-icon fas fa-male"></i>
                  <p>Mentor</p>
                </a>
              </li>


              @endif

              

             

              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Contoh Dropdown
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li>
                </ul>
              </li> --}}

              
              
              

              @if(auth()->user()->role == 'superadmin')
                <li class="nav-item " style="margin: 3px;">
                  <a href="{{ url('/home') }}" class="nav-link bg-primary">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p style="margin-left: 10px;">Beranda</p>
                  </a>
                </li>
                <li class="nav-item" style="margin: 3px;">
                  <a href="{{ url('event') }}" class="nav-link bg-danger text-white">
                    <i class="fas fa-calendar-alt"></i>
                    <p style="margin-left: 10px;">Event</p>
                  </a>
                </li>
                <li class="nav-item" style="margin: 3px;">
                  <a href="{{ url('showcase') }}" class="nav-link bg-secondary">
                    <i class="fas fa-store"></i>
                    <p style="margin-left: 10px;">Show Case</p>
                  </a>
                </li>
                <li class="nav-item" style="margin: 3px;">
                  <a href="{{ url('admin') }}" class="nav-link bg-success text-white">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>Admin</p>
                  </a>
                </li>
                <li class="nav-item" style="margin: 3px;">
                  <a href="{{ url('mentor') }}" class="nav-link bg-warning">
                    <i class="nav-icon fas fa-male"></i>
                    <p>Mentor</p>
                  </a>
                </li>
              @endif
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      <!-- /.sidebar -->
    </aside>
  <!-- /.main-sidebar -->

  
  
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">@yield('title-header-content')</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                @yield('breadcrumb')
                
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          @yield('main-content')
        </section>
        <!-- /.content -->
      </div>
    <!-- Content Wrapper. Contains page content -->
    

    

    <!-- Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; {{ now()->year }} <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.5
        </div>
      </footer>
    <!-- / Footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ URL::asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ URL::asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ URL::asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ URL::asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('dist/js/demo.js') }}"></script>
</body>
</html>
