<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logs.png">
    <title>Terms and Conditions - In Job Out</title>
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
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }
        .navbar-nav > li > a {
            color: #333;
            font-size: 16px;
        }
        .container {
            margin-top: 20px;
        }
        footer {
            background: #f8f8f8;
            padding: 15px;
            text-align: center;
            margin-top: 20px;
        }
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
            /*padding: 10px 10px 10px 16px;*/
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
        /*padding: 10px 10px 10px 10px;*/
    }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index">
                <span class="logo-lg"><img src="img/logo.png" style="margin-top: -31px;"></span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="jobs">Jobs</a></li>
                <li><a href="#candidates">Candidates</a></li>
                <li><a href="#company">Company</a></li>
                <li><a href="#about">About Us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">FAQs <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="privacy_policy">Privacy Policy</a></li>
                        <li><a href="terms-and-conditions">Terms & Conditions</a></li>
                    </ul>
                </li>
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
<div class="container">
    <div class="row">
    <h1>Terms and Conditions</h1>
    <p>Please read and understand these Terms and Conditions before registering for our services.</p>

    <h2>Acceptance of Terms</h2>
    <p>By using this website, both Employers and Employees agree to these Terms and Conditions.</p>

    <h2>Purpose of the Website</h2>
    <p>The website connects Employers with Employees and allows Employers to view Employee profiles. We do not issue experience certificates.</p>

    <h2>Content Restrictions</h2>
    <p>Profiles containing political or illegal content will not be accepted.</p>

    <h2>Data Security</h2>
    <p>We take reasonable precautions to protect data but are not liable for unauthorized access by third parties.</p>

    <h2>Member Responsibilities</h2>
    <p>Members must provide valid contact details and must not impersonate others.</p>

    <h2>Liability Disclaimer</h2>
    <p>We are not responsible for any loss or damage resulting from website usage.</p>

    <h2>Privacy Policy</h2>
    <p>By agreeing to these Terms, you also consent to our privacy policy.</p>

    <h2>Modifications to Terms</h2>
    <p>We reserve the right to modify these Terms and Conditions at any time.</p>

    <h2>Legal Jurisdiction</h2>
    <p>These Terms are governed by Indian law and fall under the jurisdiction of Indian courts.</p>

    <h2>Placement Agencies & Consultancies</h2>
    <p>We do not cater to placement agencies, and any payments made by them will not be refunded.</p>

    <h2>Employer’s Responsibility for Background Verification</h2>
    <p>We are not responsible for crimes committed by candidates. Employers must conduct background verification.</p>
    </div>
<footer class="main-footer" style="margin-left: 0px;">
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

</body>
</html>