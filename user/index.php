<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_user'])) {
  header("Location: ../index");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../img/logs.png">
  <title>In Job Out</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
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
    <span class="logo-mini"><img src="../img/logo.png"></span>
    <span class="logo-lg"><img src="../img/logo.png"></span>
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
          <li><a href="../jobs">Jobs</a></li>
          <li><a href="../logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="edit-profile"><i class="fa fa-user"></i> Edit Profile</a></li>
                  <li class="active"><a href="index"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                  <li><a href="../jobs"><i class="fa fa-list-ul"></i> Jobs</a></li>
                  <li><a href="mailbox"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="settings"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="../logout"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
            <div class="col-md-9 bg-white padding-2">
                <h2><i>Recent Applications</i></h2>
                <p>Below you will find job roles you have applied for</p>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost = apply_job_post.id_jobpost WHERE apply_job_post.id_user = '$_SESSION[id_user]'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><a href="view-job-post?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></td>
                                <td><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 0) {
                                        echo '<strong class="text-orange">Pending</strong>';
                                    } else if ($row['status'] == 1) {
                                        echo '<strong class="text-red">Rejected</strong>';
                                    } else if ($row['status'] == 2) {
                                        echo '<strong class="text-green">Under Review</strong>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="view-job-post?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
      <div class="row" style="text-align: -webkit-center;">
          <div class="col-md-3">
              <a href="privacy_policy">Privacy Policy</a>
          </div>
          <div class="col-md-3">
              <a href="terms-and-conditions">Terms & Conditions</a>
          </div>
          <div class="col-md-3">
              <a href="faq">FAQ`s</a>
          </div>
          <div class="col-md-3">
              <a href="contact">Contact</a>
          </div>
      </div>
      <br>
       <div class="text-center">
        <strong>Copyright &copy; 2025 <a href="https://in_job_out.com">In Job Out</a>.</strong> All rights
        reserved.
    </div>
    <div class="text-center">
        <strong>Design and develop by <a href="https://cloudeflux.com">Cloudeflux LLP</a>.</strong>
    </div>
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

<!-- Include jQuery and DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "paging": true,         // Enable pagination
            "lengthChange": false,  // Disable length change dropdown
            "searching": true,      // Enable search
            "ordering": true,       // Enable sorting
            "info": true,           // Show info text
            "autoWidth": false      // Disable auto width
        });
    });
</script>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
