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
                  <li class="active"><a href="edit-profile"><i class="fa fa-user"></i> Edit Profile</a></li>
                  <li><a href="index"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                  <li><a href="../jobs"><i class="fa fa-list-ul"></i> Jobs</a></li>
                  <li><a href="mailbox"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="settings"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="../logout"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Edit Profile</i></h2>
            <form action="update-profile" method="post" enctype="multipart/form-data">
            <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>
              <div class="row">
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                     <label for="fname">First Name</label>
                    <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First Name" onkeypress="return validateName(event);" value="<?php echo $row['firstname']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last Name" onkeypress="return validateName(event);" value="<?php echo $row['lastname']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" class="form-control input-lg" rows="5" placeholder="Address"><?php echo $row['address']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control input-lg" id="city" name="city" onkeypress="return validateName(event);" value="<?php echo $row['city']; ?>" placeholder="city">
                  </div>
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control input-lg" id="state" name="state"  placeholder="state" onkeypress="return validateName(event);" value="<?php echo $row['state']; ?>">
                  </div>
                    <div class="form-group">
                        <select class="form-control input-lg" id="designation" name="designation">
                            <option value="">Select Designation</option>
                            <option value="fresher">Fresher</option>
                            <option value="experienced">Experienced</option>
                        </select>
                    </div>
                    <div class="form-group" id="company-container" style="display: none;">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control input-lg" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo $row['company_name']; ?>">
                    </div>
                    <!-- Experience Dropdown (Initially Hidden) -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Update Profile</button>
                  </div>
                </div>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <label for="contactno">Contact Number</label>
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" onkeypress="return validatePhone(event);" maxlength="10" minlength="10" value="<?php echo $row['contactno']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="qualification">Highest Qualification</label>
                    <input type="text" class="form-control input-lg" id="qualification" name="qualification" placeholder="Highest Qualification" value="<?php echo $row['qualification']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="stream">Stream</label>
                    <input type="text" class="form-control input-lg" id="stream" name="stream" placeholder="stream" value="<?php echo $row['stream']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Skills</label>
                    <textarea class="form-control input-lg" rows="4" name="skills" onkeypress="return validateName(event);" ><?php echo $row['skills']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                  </div>
                    <div class="form-group" id="experience-container" style="display: none;">
                        <label for="experience">Select Experience (Years)</label>
                        <select class="form-control input-lg" id="experience" name="experience">
                            <option value="">Select Experience</option>
                            <!-- Dynamically generated options 1-30 -->
                        </select>
                    </div>
                    <div class="form-group" id="notice-period-container" style="display: none;">
                        <label for="notice_period_container">Notice Period</label>
                        <input type="text" class="form-control input-lg" id="notice_period_container" name="notice_period_container" placeholder="Notice Period" value="<?php echo $row['notice_period']; ?>">
                    </div>
                  <div class="form-group">
                    <label>Upload/Change Resume</label>
                    <input type="file" name="resume" class="btn btn-default">
                  </div>
                </div>
              </div>
              <?php
                }
              }
            ?>   
            </form>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php } ?>
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

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<script type="text/javascript">
  

       function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }




       function validateName(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 32) {
        
          return true;
        } else if( key < 65 || key > 90 && key < 97 || key > 122) {
          // 65-90 97-122 is A-Z a-z alphabets on your keyboard.
          return false;
        } else return true;
      }


</script>
<!-- jQuery for Dynamic Show/Hide -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Populate experience dropdown with 1-30 years dynamically
        for (let i = 1; i <= 30; i++) {
            $('#experience').append('<option value="' + i + '">' + i + ' Years</option>');
        }

        // Show/Hide experience dropdown based on designation selection
        $('#designation').change(function () {
            if ($(this).val() === "experienced") {
                $('#experience-container').show();
                $('#company-container').show();
                $('#notice-period-container').show();
            } else {
                $('#experience-container').hide();
                $('#company-container').hide();
                $('#notice-period-container').hide();
                $('#experience').val(''); // Reset experience selection
            }
        });
    });
</script>
</body>
</html>
