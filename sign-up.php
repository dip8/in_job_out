<?php 

session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index");
  exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
                 <!-- Bootstrap 3.3.7 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery and Bootstrap 3.3.7 JS (Required for Navbar Collapse) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  /* Ensure Navbar Background is White */
  .navbar {
    background-color: white;
    border-bottom: 1px solid #ddd;
  }

  /* White Background for Mobile Menu */
  .navbar-collapse {
    background: white;
    padding: 10px;
  }

  /* Font Size Adjustments */
  .navbar-nav > li > a {
    font-size: 16px; /* Default */
    color: #333;
  }

  /* Mobile View Styles */
  @media (max-width: 768px) {
    .navbar-nav {
      width: 100%;
      text-align: center; /* Center menu items */
    }
    .navbar-nav > li {
      float: none; /* Make items stack */
    }
    .navbar-nav > li > a {
      font-size: 16px; /* Smaller font for mobile */
      display: block;
      padding: 10px 10px 10px 16px;
    }
    .navbar-collapse {
      background: white;
    }
  }

  /* Ensure Toggle Button is Visible */
  .navbar-toggle {
    border: none;
    background: transparent !important;
  }

  .navbar-toggle .icon-bar {
    background-color: #333; /* Dark color for visibility */
  }

  /* Adjust Navbar Padding */
  .navbar-static-top {
    padding: 10px 10px 10px 10px;
  }
</style>
</head>
<body class="hold-transition  sidebar-mini">
<div class="wrapper">

<header class="main-header">
  <!-- Logo -->
  <a href="index" class="logo logo-bg">
    <span class="logo-mini"><img src="img/logo.png"></span>
    <span class="logo-lg"><img src="img/logo.png"></span>
  </a>

  <!-- Navbar -->
  <nav class="navbar navbar-static-top">
    <div class="container">
      <!-- Navbar Header (Mobile Toggle Button) -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNav" 
                aria-expanded="false">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collapsible Menu -->
      <div class="collapse navbar-collapse navbar-custom-menu" id="navbarNav">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="jobs">Jobs</a></li>
          <li><a href="index#candidates">Candidates</a></li>
          <li><a href="index#company">Company</a></li>
          <li><a href="index#about">About Us</a></li>

          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li><a href="login">Login</a></li>
          <li><a href="sign-up">Sign Up</a></li>
          <?php } else { 
            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li><a href="user/index">Dashboard</a></li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li><a href="company/index">Dashboard</a></li>
          <?php } ?>
          <li><a href="logout">Logout</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center margin-bottom-20">Sign Up</h1>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-yellow padding-5">
              <div class="inner">
                <h3 class="text-center">User Registration</h3>
              </div>
              <a href="register-candidates" class="small-box-footer">
                Register <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-red padding-5">
              <div class="inner">
                <h3 class="text-center">Company Registration</h3>
              </div>
              <a href="register-company" class="small-box-footer">
                Register <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2025 <a href="https://in_job_out.com">In Job Out</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
