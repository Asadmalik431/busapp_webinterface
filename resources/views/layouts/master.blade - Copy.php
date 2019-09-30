
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="base-url" content="{{ url('') }}">
  <meta name="APP_URL" content="{{ env('API_URL')}}">
  @if(Auth::user())
  <meta name="user-id" content="{{ Auth::user()->id }}">
  @endif
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" type="text/css" href="public/css/app.css">
  <style>
    .badg_count{
      margin-right: -5px;
      margin-top: -8px;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini">
  <!-- <button class="button" onClick="window.open('http://localhost:8080/lara-vue-adminlte/test#/test', 'New Window','width=500,height=500,top=70,left=1100,resizable=no');">
     <span class="icon">Open</span>
</button> -->
<div class="wrapper" id="app">

  <!-- Navbar -->
  @if(Auth::user())
    @php
      $clas = 'content-wrapper';
      $div_class = 'display:block'
    @endphp
 
  @else
   @php
      $clas = '';
      $div_class = 'display:none'
    @endphp
  @endif
  <div id="login_condition" style = "{{$div_class}}">
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    
    <!-- <notification-component :count = "counter" ></notification-component> -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
           
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
         
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown show">
        
      <notification-component></notification-component>
          
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right hide" style="width: 308px;">
          <span class="dropdown-item dropdown-header message_count_custom">0 Notifications</span>
          <div class="dropdown-divider"></div>
          <notification-contetnt></notification-contetnt>
          <!-- <my-checkbox >
            
          </my-checkbox> -->
          <div class="dropdown-divider"></div>
          
        <notification-footer></notification-footer>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('')}}" class="brand-link">
      <img src="{{url('public/img/school_bus.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('public/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          @if(Auth::user())
            {{ Auth::user()->name }}
          @endif
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
                Dashboard
                
              </p>
            </router-link>
          </li>

          <!-- <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-cog green"></i>
              <p>
                Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="users" class="nav-link ">
                  <i class="fas fa-users "></i>
                  <p>Users</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="profile" class="nav-link">
              <i class="nav-icon fas fa-user orange"></i>
              <p>
                Profile
                
              </p>
            </router-link>
          </li> -->
          <li class="nav-item">
            <router-link to="parents" class="nav-link">
              <i class="nav-icon fas fa-user-friends teal"></i>
              <p>
                Parents 
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="drivers" class="nav-link">
              <i class="nav-icon fas fa-user orange"></i>
              <p>
                Drivers
                
              </p>
            </router-link>
          </li>
          
          <li class="nav-item">
            <router-link to="busses" class="nav-link">
              <i class="nav-icon fas fa-bus cyan"></i>
              <p>
                Busses 
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="routes" class="nav-link">
              <i class="nav-icon fas fa-road orange"></i>
              <p>
                Routes 
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-power-off red"></i>
              <p>
                {{ __('Logout') }}
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
            <form 
              id     = "logout-form" 
              action = "{{ route('logout') }}" 
              method = "POST" 
              style  = "display: none;">
              @csrf
            </form>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="{{$clas}}">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-6 col-xs-4">
          
            <router-view></router-view>
  
            <vue-progress-bar></vue-progress-bar>
          </div>
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @if(Auth::user())
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018- 2019 <a href="https://cicm.pk/cicmsite">cicm.pk</a>.</strong> All rights reserved.
  </footer>
  @endif
</div>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='http://192.168.100.2/cicm_import/admin/views/admin/test_api.php';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->



        <!-- jQuery -->

        
<script type="text/javascript" src="public/js/app.js"></script>

<!--End of Tawk.to Script-->


</body>
</html>
