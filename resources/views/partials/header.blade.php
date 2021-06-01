<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manager/Operator Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Contract Farming</span>
    </a>

    <!-- Sidebar -->
 <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Roji Kayastha Prajapati</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashbaord
              </p>
            </a>
          </li>
          <li class="nav-item">

          <!-- <li class="nav-item menu-open">-->            
            <a href="#" class="nav-link {{ (request()->is('officers')) ? 'menu-open' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Officers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/officers')}}" class="nav-link  {{ (request()->is('officers')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-table"></i>
                  <p>View Officers</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="add-operator.html" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Add Officer</p>
                </a>
              </li> -->
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('/advertisingcrops') }}" class="nav-link  {{ (request()->is('advertisingcrops')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-leaf"></i>
              <p>
                Advertising Crops
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('/myfarmers') }}" class="nav-link  {{ (request()->is('myfarmers')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Farmers
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('/myqueries') }}" class="nav-link  {{ (request()->is('myqueries')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Queries
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="change-password.html" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>