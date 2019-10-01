<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() .'public'; ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url() .'public'; ?>/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
	UST - Center for Campus Ministry
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all11.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url() .'public/fontawesome/css/'; ?>all.css" >
  <!-- CSS Files -->
  <link href="<?php echo base_url() .'public'; ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() .'public'; ?>/assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url() .'public'; ?>/assets/demo/demo.css" rel="stylesheet" />
  
   <!--   Core JS Files   -->
  <script src="<?php echo base_url() .'public'; ?>/assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url() .'public'; ?>/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() .'public'; ?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url() .'public'; ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 
  <!-- Chart JS -->
  <script src="<?php echo base_url() .'public'; ?>/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url() .'public'; ?>/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url() .'public'; ?>/assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url() .'public'; ?>/assets/demo/demo.js"></script>

  
  
</head>

<body class="user-profile">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow" style="background-color:red">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <img src="<?php echo base_url(); ?>public/assets/img/logo.png" />
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li <?php if($this->router->fetch_class() == 'dashboard'){ echo 'class="active"'; } ?> >
            <a href="<?php echo base_url() . 'index.php/dashboard/'; ?>">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li <?php if($this->router->fetch_class() == 'customer'){ echo 'class="active"'; } ?> >
            <a href="<?php echo base_url() . 'index.php/customer/'; ?>">
              <i class="now-ui-icons users_single-02"></i>
              <p>Customers</p>
            </a>
          </li>
		  
		 
         
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">UST - Center for Campus Ministry</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!--<form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>-->
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  
                  <i class="now-ui-icons users_single-02"></i>
				  <?php echo $this->session->userdata('userName'); ?>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?php echo base_url() . 'index.php/welcome/logout/'; ?>">Logout</a>
                </div>
              </li>
            
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm">
      </div>