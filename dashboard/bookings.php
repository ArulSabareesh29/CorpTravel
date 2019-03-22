<?php
include_once "../admin/db-config.php";
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

    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center user-image-back">
            <img src="assets/img/find_user.jpg" class="img-responsive" />

          </li>


          <li>
            <a href="index.php"><i class="fa fa-tachometer"></i>Back to Dashboard</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page-wrapper">
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">
            <h2>Bookings</h2>
          </div>
        </div>

        <hr />
        <table class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>
                <center>Booking Type</center>
              </th>
              <th>
                <center>Booking Code</center>
              </th>
              <th>
                <center>Status</center>
              </th>
              <th>
                <center>Date and Time</center>
              </th>
              <th>
                <center>Time of Booking</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php

$sql = "SELECT * FROM booking";

$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($query)) {
    ?>

            <?php
echo '<tr>
                    <td><center>' . $row['booking_type'] . '</center></td>
                    <td><center>' . $row['booking_code'] . '</center></td>
                    <td><center><font size="3px"><b>' . $row['status'] . '</b></font></center></td>
                    <td><center>' . $row['date_time'] . '</center></td>
                    <td><center>' . $row['timestamp'] . '</center></td>
				</tr>';
} ?>
            <tr>
            </tr>
          </tbody>
        </table>
      </div>

    </div>

  </div>
  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.metisMenu.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>