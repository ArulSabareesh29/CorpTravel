<?php
include_once "../admin/db-config.php";

$sql = "SELECT * FROM user ORDER BY id";

if ($result = mysqli_query($conn, $sql)) {
    $rowcount = mysqli_num_rows($result);
}

$sql_2 = "SELECT * FROM booking ORDER BY booking_id";

if ($result_booking = mysqli_query($conn, $sql_2)) {
    $rowcount_booking = mysqli_num_rows($result_booking);
}

$sql_3 = "SELECT * FROM trans_hotel ORDER BY id";

if ($result_trans_hotel = mysqli_query($conn, $sql_3)) {
    $rowcount_trans_hotel = mysqli_num_rows($result_trans_hotel);
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Corp Travel - Dashboard</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/custom.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="adjust-nav">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Corp Travel - Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Logout</a></li>
          </ul>
        </div>

      </div>
    </div>
    <!--Navigation Bar  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center user-image-back">
            <img src="assets/img/find_user.jpg" class="img-responsive" />

          </li>


          <li>
            <a href="index.php"><i class="fa fa-tachometer"></i>Dashboard</a>
          </li>

          <li>
            <a href="user_infor.php"><i class="fa fa-users"></i>User Information</a>
          </li>

          <li>
            <a href="hotels.php"><i class="fa fa-bed"></i>Hotels</a>
          </li>

          <li>
            <a href="bookings.php"><i class="fa fa-bookmark-o"></i>Bookings</a>
          </li>

          <li>
            <a href="#"><i class="fa fa-file-text-o"></i>Reports</a>
          </li>
        </ul>

      </div>

    </nav>
    <!-- Side Navigation  -->
    <div id="page-wrapper">
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">
            <h2>Admin Dashboard</h2>
          </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="panel panel-primary text-center no-boder bg-color-blue">
              <div class="panel-body">
                <i class="fa fa-calendar fa-5x"></i>
              </div>
              <div class="panel-footer back-footer-blue">
                <?php echo "Today is " . date("Y-m-d-l"); ?>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-info text-center">
              <i class="fa fa-users fa-5x"></i>
              <h3>Current Active Users <br> <?php echo $rowcount; ?></h3>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-info text-center">
              <i class="fa fa-bed fa-5x"></i>
              <h3>All Bookings <br> <?php echo $rowcount_booking; ?></h3>
            </div>
          </div>

          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-info text-center">
              <i class="fa fa-car fa-5x"></i>
              <h3>Hotel Transport <br> <?php echo $rowcount_trans_hotel; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
  </div>
  <!-- /. WRAPPER  -->
  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/custom.js"></script>


</body>

</html>