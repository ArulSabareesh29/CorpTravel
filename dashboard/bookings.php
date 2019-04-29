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
include '../admin/functions.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html></html>
<title>Corp Travel - Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="css/dashboard.css">

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:1000">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i
                class="fa fa-bars"></i>  Menu
    </button>
    <span class="w3-bar-item w3-right">Corp Travel</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="../dashboard/assets/img/find_user.jpg" class="w3-circle w3-margin-right" alt="admin_user"
                 style="width:75px">
        </div>
        <div class="w3-col s8 w3-bar">
            <span>Welcome <em><?php echo $_SESSION['user']['username']; ?></em></span><br>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
           onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="home.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
        <a href="bookings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book-open fa-fw"></i>  Bookings</a>
        <a href="views.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Views</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
        <a href="geo.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
     title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fas fa-users-cog"></i> My Dashboard</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
            <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="far fa-calendar-check w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php echo date("Y-m-d-l"); ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Current Date</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php echo $rowcount; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>All Users</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-book-open w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php echo $rowcount_booking; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>All Bookings</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-car w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php echo $rowcount_trans_hotel; ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Hotel Transport</h4>
            </div>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <div class="w3-responsive">
            <table id="example" class=" w3-table-all w3-hoverable tbl_border" border="5">
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
                <tbody id="myTable">
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
        <!--        Enter Card Analytics of Boking Here-->
        <div class="w3-quarter">
            <h4>Booking Card</h4>
        </div>
        <div class="w3-quater">

            <h4>Booking Card 2</h4>
        </div>
    </div>
    <div class="w3-container">
        <!--   Transport Booking Details     -->
        <div class="w3-responsive">
            <table id="example" class=" w3-table-all w3-hoverable">
                <thead>
                <tr>
                    <th>
                        <center>Booking ID</center>
                    </th>
                    <th>
                        <center>Passenger Name</center>
                    </th>
                    <th>
                        <center>Contact No.</center>
                    </th>
                    <th>
                        <center>Line Manager</center>
                    </th>
                    <th>
                        <center>Requstor Name</center>
                    </th>
                    <th>
                        <center>Cost Center</center>
                    </th>
                    <th>
                        <center>Journey Start</center>
                    </th>
                    <th>
                        <center>Journey End</center>
                    </th>
                    <th>
                        <center>Timestamp</center>
                    </th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php

                $sql = "SELECT * FROM trans_transport";

                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {
                    ?>

                    <?php
                    echo '<tr>
                    <td><center>' . $row['id'] . '</center></td>
                    <td><center>' . $row['passenger_name'] . '</center></td>
                    <td><center><font size="3px"><b>' . $row['contact_no'] . '</b></font></center></td>
                    <td><center>' . $row['line_mgr'] . '</center></td>
                    <td><center>' . $row['req_first_name'] . '</center></td>
                    <td><center>' . $row['cost_center'] . '</center></td>
                    <td><center>' . $row['journey_start'] . '</center></td>
                    <td><center>' . $row['journey_end'] . '</center></td>
                    <td><center>' . $row['timestamp'] . '</center></td>
				</tr>';
                } ?>
                <tr>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer w3-container w3-teal">
        <h5>All Rights Reserved Corp Travel Designed by Arul Sabareesh</h5>
    </footer>
    <!-- End page content -->

</div>
<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }

    <!-- Js code for map -->

    function myMap() {
        var map = new google.maps.Map(
            document.getElementById('map'),
            mapOptions
        );
        var myCenter = new google.maps.LatLng(6.9271, 79.8612);
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: myCenter,
            zoom: 10
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            position: myCenter
        });
        marker.setMap(map);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZf_J6NsuyTn4abnSc7mw6yJbE_y_f39s&callback=myMap">
</script>

</body>

</html>