<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db file to avoid rewriting in all files
require_once("db.php");
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
  <link rel="icon" href="img/logs.png">
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

  <!-- <header class="main-header">

    
    <a href="index" class="logo logo-bg">
      <span class="logo-mini"><b>J</b>P</span>
      <span class="logo-lg"><b>Job</b> Portal</span>
    </a>

    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login">Login</a>
          </li>
          <li>
            <a href="sign-up">Sign Up</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout">Logout</a>
          </li>
          <?php } ?>          
        </ul>
      </div>
    </nav>
  </header> -->
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
<!--            <li class="dropdown">-->
<!--                <a href="jobs" class="dropdown-toggle" data-toggle="dropdown">Faq`s <b class="caret"></b></a>-->
                <!-- Nested ul for the submenu -->
<!--                <ul class="dropdown-menu">-->
<!--                    <li><a href="privacy_policy">Privacy Policy</a></li>-->
<!--                    <li><a href="terms-and-conditions">Terms & Conditions</a></li>-->
<!--                </ul>-->
<!--            </li>-->
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li><a href="login-candidates">Candidate Login</a></li>
          <li><a href="login-company">Company Login</a></li>
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
        <div class="row">
          <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center">Latest Jobs</h1>  
            <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Filters</h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> City <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                    <li><a href="" class="citySearch" data-target="Navi Mumbai"><i class="fa fa-circle-o text-yellow"></i> Navi Mumbai</a></li>
                      <li><a href=""  class="citySearch" data-target="Bengaluru"><i class="fa fa-circle-o text-yellow"></i> Bengaluru</a></li>
                      <li><a href=""  class="citySearch" data-target="Pune"><i class="fa fa-circle-o text-yellow"></i> Pune</a></li>
                      <li><a href=""  class="citySearch" data-target="Hyderabad"><i class="fa fa-circle-o text-yellow"></i> Hyderabad</a></li>
                      <li><a href=""  class="citySearch" data-target="Chennai"><i class="fa fa-circle-o text-yellow"></i> Chennai</a></li>
                      <li><a href=""  class="citySearch" data-target="Kolkata "><i class="fa fa-circle-o text-yellow"></i> Kolkata </a></li>
                      <li><a href=""  class="citySearch" data-target="Ahmedabad "><i class="fa fa-circle-o text-yellow"></i> Ahmedabad </a></li>
                      <li><a href=""  class="citySearch" data-target="Chandigarh "><i class="fa fa-circle-o text-yellow"></i> Chandigarh </a></li>
                      <li><a href=""  class="citySearch" data-target="Kochi "><i class="fa fa-circle-o text-yellow"></i> Kochi </a></li>
                      
                    </ul>
                  </li>
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-id-badge text-red"></i> Experience <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href="" class="experienceSearch" data-target='1'><i class="fa fa-circle-o text-yellow"></i> > 1 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='2'><i class="fa fa-circle-o text-yellow"></i> > 2 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='3'><i class="fa fa-circle-o text-yellow"></i> > 3 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='4'><i class="fa fa-circle-o text-yellow"></i> > 4 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='5'><i class="fa fa-circle-o text-yellow"></i> > 5 Years</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>

         
          <div class="col-md-9">

          <?php

          $limit = 4;

          $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();
            $total_records = $row['id'];
            $total_pages = ceil($total_records / $limit);
          } else {
            $total_pages = 1;
          }

          ?>

          
            <div id="target-content">
              
            </div>
            <div class="text-center">
              <ul class="pagination text-center" id="pagination"></ul>
            </div> 

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
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>

<script>
  function Pagination() {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        $("#target-content").html("loading....");
        $("#target-content").load("jobpagination?page="+page);
      }
    });
  }
</script>

<script>
  $(function () {
      Pagination();
  });
</script>

<script>
  $("#searchBtn").on("click", function(e) {
    e.preventDefault();
    var searchResult = $("#searchBar").val();
    var filter = "searchBar";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
  $("#searchBtn").on("click", function (e) {
      e.preventDefault();
      performSearch(); // Call a function to handle search
  });

  // Trigger search when the Enter key is pressed in #searchBar
  $("#searchBar").on("keydown", function (e) {
      if (e.keyCode === 13) { // Check if Enter key is pressed
          e.preventDefault(); // Prevent form submission
          performSearch();
      }
  });

  // Function to handle search
  function performSearch() {
      var searchResult = $("#searchBar").val();
      var filter = "searchBar";

      if (searchResult !== "") {
          $("#pagination").twbsPagination('destroy');
          Search(searchResult, filter);
      } else {
          $("#pagination").twbsPagination('destroy');
          Pagination();
      }
  }

</script>

<script>
  $(".experienceSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "experience";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".citySearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "city";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  function Search(val, filter) {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        val = encodeURIComponent(val);
        $("#target-content").html("loading....");
        $("#target-content").load("search?page="+page+"&search="+val+"&filter="+filter);
      }
    });
  }
</script>


</body>
</html>
