<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_company'])) {
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
    <style>
        #datah4 {
            display: flex;
            justify-content: space-between;
        }
        @media (max-width: 768px) {
            #datah4 {
                display: grid;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body class="hold-transition  sidebar-mini">
<div class="wrapper">

  <header class="main-header">

  <a href="index" class="logo logo-bg">
    <span class="logo-mini"><img src="../img/logo.png"></span>
    <span class="logo-lg"><img src="../img/logo.png"></span>
  </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                  
        </ul>
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
                  <li><a href="index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="edit-company"><i class="fa fa-tv"></i> My Company</a></li>
                  <li><a href="create-job-post"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                  <li><a href="my-job-post"><i class="fa fa-file-o"></i> My Job Post</a></li>
                  <li class="active"><a href="job-applications"><i class="fa fa-file-o"></i> Job Application</a></li>
                  <li><a href="mailbox"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="settings"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="resume-database"><i class="fa fa-user"></i> Resume Database</a></li>
                  <li><a href="../logout"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
            <?php
            // Define the number of results per page
            $results_per_page = 5;

            // Get the current page number
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($page < 1) $page = 1;

            // Calculate the starting point for results
            $start_limit = ($page - 1) * $results_per_page;

            // Count total number of applications
            $sql_count = "SELECT COUNT(*) AS total FROM job_post 
              INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  
              INNER JOIN users ON users.id_user=apply_job_post.id_user 
              WHERE apply_job_post.id_company='$_SESSION[id_company]'";
            $result_count = $conn->query($sql_count);
            $total_rows = $result_count->fetch_assoc()['total'];
            $total_pages = ceil($total_rows / $results_per_page);

            // Fetch paginated data
            $sql = "SELECT * FROM job_post 
        INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  
        INNER JOIN users ON users.id_user=apply_job_post.id_user 
        WHERE apply_job_post.id_company='$_SESSION[id_company]' 
        LIMIT $start_limit, $results_per_page";

            $result = $conn->query($sql);
            ?>

            <div class="col-md-9 bg-white padding-2">
                <h2><i>Recent Applications</i></h2>

                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="attachment-block clearfix padding-2">
                            <h4 class="attachment-heading" id="datah4">
                    <span>
                        <a href="user-application?id=<?= $row['id_user']; ?>&id_jobpost=<?= $row['id_jobpost']; ?>">
                            <?= $row['jobtitle'] . ' (' . $row['firstname'] . ' ' . $row['lastname'] . ')'; ?>
                        </a>
                    </span>
                                <span><strong>Qualification :</strong> <?= $row['qualification']; ?></span>
                                <span><strong>City :</strong> <?= $row['city']; ?></span>
                            </h4>
                            <br>
                            <h4 class="attachment-heading" id="datah4">
                                <span><strong>Email Id :</strong> <?= $row['email']; ?></span>
                                <span><strong>Designation :</strong> <?= $row['designation']; ?></span>
                            </h4>
                            <div class="attachment-text padding-2">
                                <div class="pull-left"><i class="fa fa-calendar"></i> <?= $row['createdat']; ?></div>
                                <?php
                                if ($row['status'] == 0) {
                                    echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                                } elseif ($row['status'] == 1) {
                                    echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                                } elseif ($row['status'] == 2) {
                                    echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div>';
                                }
                                ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No applications found.</p>
                <?php endif; ?>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if ($page > 1): ?>
                            <li><a href="?page=<?= $page - 1; ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="<?= ($i == $page) ? 'active' : ''; ?>"><a href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <li><a href="?page=<?= $page + 1; ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>

            <!--          <div class="col-md-9 bg-white padding-2">-->
<!--            <h2><i>Recent Applications</i></h2>-->
<!---->
<!--            --><?php
//             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]'";
//                  $result = $conn->query($sql);
//
//                  if($result->num_rows > 0) {
//                    while($row = $result->fetch_assoc())
//                    {
//            ?>
<!--            <div class="attachment-block clearfix padding-2">-->
<!--                <h4 class="attachment-heading" id="datah4">-->
<!--                    <span><a href="user-application?id=--><?php //echo $row['id_user']; ?><!--&id_jobpost=--><?php //echo $row['id_jobpost']; ?><!--">-->
<!--                        --><?php //echo $row['jobtitle'].'       ('.$row['firstname'].' '.$row['lastname'].')'; ?>
<!--                    </a></span>-->
<!--                    <span><strong>Qualification :</strong> --><?php //echo $row['qualification']; ?><!--</span>-->
<!--                    <span><strong>City :</strong> --><?php //echo $row['city']; ?><!--</span>-->
<!--                </h4>-->
<!--                <br>-->
<!--                <h4 class="attachment-heading" id="datah4">-->
<!--                    <span><strong>Email Id :</strong> --><?php //echo $row['email']; ?><!--</span>-->
<!--                    <span><strong>Designation :</strong> --><?php //echo $row['designation']; ?><!--</span>-->
<!--                </h4>-->
<!--                <div class="attachment-text padding-2">-->
<!--                  <div class="pull-left"><i class="fa fa-calendar"></i> --><?php //echo $row['createdat']; ?><!--</div>  -->
<!--                  --><?php //
//
//                  if($row['status'] == 0) {
//                    echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
//                  } else if ($row['status'] == 1) {
//                    echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
//                  } else if ($row['status'] == 2) {
//                    echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
//                  }
//                  ?>
<!--                                -->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            --><?php
//              }
//            }
//            ?>
<!--            -->
<!--          </div>-->
<!--      </div>-->
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


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
