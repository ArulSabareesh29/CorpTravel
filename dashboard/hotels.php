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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);

  body {
    margin-top: 20px;
    font-family: "Open Sans", sans-serif;
    color: #282828;
  }

  .skills {
    width: 80%;
    max-width: 960px;
    height: 780px;
    margin: auto;
    position: relative;
  }

  .lines {
    height: 100%;
    position: relative;
  }

  .line {
    height: inherit;
    width: 2px;
    position: absolute;
    background: rgba(238, 238, 238, 0.6);
  }

  .line.l--0 {
    left: 0;
  }

  .line.l--25 {
    left: 25%;
  }

  .line.l--50 {
    left: 50%;
  }

  .line.l--75 {
    left: 75%;
  }

  .line.l--100 {
    left: calc(100% - 1px);
  }

  .line__label {
    display: block;
    width: 130px;
    text-align: center;
    position: absolute;
    bottom: -20px;
    right: -50px;
    font-weight: 900;
  }

  .line__label.title {
    text-transform: uppercase;
    font-weight: bold;
  }

  .charts {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 105px;
    left: 0;
    z-index: 10;
  }

  .chart {
    margin: 30px 0 0;
  }

  .chart:first-child {
    margin: 0;
  }

  .chart__title {
    display: block;
    margin: 0 0 10px;
    font-weight: bold;
    opacity: 0;
    animation: 1s anim-lightspeed-in ease forwards;
  }

  .chart--prod .chart__title {
    animation-delay: 3.3s;
  }

  .chart--design .chart__title {
    animation-delay: 4.5s;
  }

  .chart--horiz {
    overflow: hidden;
  }

  .chart__bar {
    height: 60px;
    margin-bottom: 10px;
    background: linear-gradient(to left, #3c7ac5, #ca46ab);
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    opacity: 0;
    animation: 1s anim-lightspeed-in ease forwards;
  }

  .chart--dev .chart__bar:nth-of-type(11) {
    animation-delay: 2.7s;
  }

  .chart--dev .chart__bar:nth-of-type(10) {
    animation-delay: 2.5s;
  }

  .chart--dev .chart__bar:nth-of-type(9) {
    animation-delay: 2.3s;
  }

  .chart--dev .chart__bar:nth-of-type(8) {
    animation-delay: 2.1s;
  }

  .chart--dev .chart__bar:nth-of-type(7) {
    animation-delay: 1.9s;
  }

  .chart--dev .chart__bar:nth-of-type(6) {
    animation-delay: 1.7s;
  }

  .chart--dev .chart__bar:nth-of-type(5) {
    animation-delay: 1.5s;
  }

  .chart--dev .chart__bar:nth-of-type(4) {
    animation-delay: 1.3s;
  }

  .chart--dev .chart__bar:nth-of-type(3) {
    animation-delay: 1.1s;
  }

  .chart--dev .chart__bar:nth-of-type(2) {
    animation-delay: 0.9s;
  }

  .chart--dev .chart__bar:nth-of-type(1) {
    animation-delay: 0.7s;
  }

  .chart--prod .chart__bar:nth-of-type(2) {
    animation-delay: 4.2s;
  }

  .chart--prod .chart__bar:nth-of-type(1) {
    animation-delay: 4s;
  }

  .chart--design .chart__bar:nth-of-type(3) {
    animation-delay: 5.6s;
  }

  .chart--design .chart__bar:nth-of-type(2) {
    animation-delay: 5.4s;
  }

  .chart--design .chart__bar:nth-of-type(1) {
    animation-delay: 5.2s;
  }

  .chart__label {
    padding-left: 10px;
    line-height: 30px;
    color: white;
  }

  @keyframes anim-lightspeed-in {
    0% {
      transform: translateX(-200%);
      opacity: 1;
    }

    100% {
      transform: translateX(0);
      opacity: 1;
    }
  }
  </style>
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
            <h2>Hotels</h2>
          </div>
        </div>

        <hr />
        <!-- Search Bar - Filter Table -->
        <input class="form-control form-control-lg" id="myInput" type="text" placeholder="Search..">
        <br>
        <table class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>
                <center>Hotel Name</center>
              </th>
              <th>
                <center>Hotel Type</center>
              </th>
              <th>
                <center>Rating</center>
              </th>
              <th>
                <center>Location</center>
              </th>
              <th>
                <center>Single Room</center>
              </th>
              <th>
                <center>Double Room</center>
              </th>
              <th>
                <center>Deluxe Room</center>
              </th>
            </tr>
          </thead>
          <tbody id='myTable'>
            <?php

$sql = "SELECT * FROM corp_hotels";

$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($query)) {
    ?>

            <?php
echo '<tr>
                    <td>' . $row['hotel_name'] . '</td>
                    <td><center>' . $row['hotel_type'] . '</center></td>
                    <td><center><font size="3px"><b>' . $row['rating'] . '</b></font></center></td>
                    <td><center>' . $row['location'] . '</center></td>
                    <td><center>' . $row['single_room'] . '</center></td>
                    <td><center>' . $row['double_room'] . '</center></td>
                    <td><center>' . $row['deluxe_room'] . '</center></td>
				</tr>';
} ?>
            <tr>
            </tr>
          </tbody>
        </table>
        <!--Bar chart-->
        <div class="skills">
          <ul class="lines">
            <li class="line l--0">
              <span class="line__label title">
                Hotel Rating:
              </span>
            </li>
            <li class="line l--25">
              <span class="line__label">
                2
              </span>
            </li>
            <li class="line l--50">
              <span class="line__label">
                5
              </span>
            </li>
            <li class="line l--75">
              <span class="line__label">
                7
              </span>
            </li>
            <li class="line l--100">
              <span class="line__label">
                10
              </span>
            </li>
          </ul>
          <div class="charts">
            <div class="chart chart--dev">
              <br>
              <span class="chart__title">Hotel Rating Chart for <?php
echo date("l jS \of F Y") . "<br>";
?></span>
              <br>
              <br>
              <ul class="chart--horiz">
                <?php
$sql = "SELECT * FROM corp_hotels WHERE rating";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    ?>
                <li class="chart__bar" style="width: <?=$row['rating']?>00px;">
                  <span class="chart__label">
                    <?=$row['hotel_name']?> | <?=$row['rating']?>
                  </span>
                </li>
                <?php
}?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.metisMenu.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
</body>

</html>