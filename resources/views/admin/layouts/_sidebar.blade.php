@php
  $getSetting = App\Models\SettingModel::first();
@endphp

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ url('upload/' .$getSetting->favicon)}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link"  href="{{ url('logout') }}">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('upload/' .$getSetting->logo)}} " alt="GST Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $getSetting->web_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('upload/'.Auth::user()->profile_image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    

          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment
            (2) == 'dashboard')active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="{{ url('admin/parties_type') }}" class="nav-link @if(Request::segment
            (2) == 'parties_type')active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Parties Type
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/parties') }}" class="nav-link @if(Request::segment
            (2) == 'parties')active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Parties 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/gst_bills') }}" class="nav-link @if(Request::segment
            (2) == 'gst_bills')active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                GST Bills
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/my_account') }}" class="nav-link @if(Request::segment
            (2) == 'my_account')active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/setting') }}" class="nav-link @if(Request::segment
            (2) == 'my_account')active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Setting
              </p>
            </a>
          </li>

          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>