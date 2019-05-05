<?php
include_once "../admin/db-config.php";

$sql = "SELECT * FROM user ORDER BY id";

if ($result = mysqli_query($conn, $sql)) {
    $rowcount = mysqli_num_rows($result);
}

$sql_2 = "SELECT * FROM trans_transport ORDER BY id";

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

$connect = mysqli_connect("localhost", "root", "", "corptravel");
if (isset($_POST["insert"])) {
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO tbl_images(name) VALUES ('$file')";
    if (mysqli_query($connect, $query)) {
        echo '<script>alert("Image Inserted into Database")</script>';
    }
}

?>

<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="img/LogoV1.png">
<title>Corp Travel - Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<head>
    <style>
        table td {
            transition: all .5s;
        }


        /* Table */
        .data-table {
            border-collapse: collapse;
            font-size: 14px;
            min-width: 537px;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #e1edff;
            padding: 7px 17px;
        }

        .data-table caption {
            margin: 7px;
        }

        /* Table Header */
        .data-table thead th {
            color: #000000;
            border-color: #6ea1cc !important;
        }

        /* Table Body */
        .data-table tbody td {
            color: #353535;
        }

        .data-table tbody td:first-child,
        .data-table tbody td:nth-child(4),
        .data-table tbody td:last-child {
            text-align: right;
        }

        .data-table tbody tr:nth-child(odd) td {
            background-color: #f4fbff;
        }

        .data-table tbody tr:hover td {
            background-color: #90EE90;
            border-color: #32CD32;
        }

        /* Table Footer */
        .data-table tfoot th {
            background-color: #e5f5ff;
            text-align: right;
        }

        .data-table tfoot th:first-child {
            text-align: left;
        }

        .data-table tbody td:empty {
            background-color: #ffcccc;
        }

        .modal-body {
            position: relative;
            padding: 35px;
        }

        .modal-header {
            padding: 0px;
            border-bottom: 1px solid #e5e5e5;
        }
    </style>
</head>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:1000">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i
                class="fa fa-bars"></i>  Menu
    </button>
    <img src="../img/title_corp_travel.png" width="12%">
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="assets/user_vector.jpg" class="w3-circle w3-margin-right" alt="admin_user"
                 style="width:95px">
        </div>
        <div class="w3-col s8 w3-bar">
            <span>Welcome <strong><?php echo $_SESSION['user']['username']; ?></strong></span><br>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <hr style="border: 1px solid black;">
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black"
           onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="home.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
        <a href="bookings.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book-open fa-fw"></i>  Bookings</a>
        <a href="approvals.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Approvals</a>
        <a href="../menu/menu.php" target="_blank" class="w3-bar-item w3-button w3-padding"><i
                    class="fas fa-book fa-fw"></i>  Book Now</a>
        <a href="../index.php" class="w3-bar-item w3-button w3-padding"><i
                    class="fas fa-sign-out-alt fa-fw"></i>  Log Out</a>
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
                    <h3><?php echo date("Y-m-d"); ?></h3>
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
    <hr style="border: 1px solid black;">
    <div class="w3-container w3-responsive">
        <h3 class="w3-center">Employee Office Transport Booking</h3>
        <div class="w3-container">
            <!--   Transport Booking Details     -->
            <div class="w3-responsive">
                <table id="user_table" border="1" class=" w3-table-all w3-hoverable">
                    <thead>
                    <th>Booking ID</th>
                    <th>Passenger Name</th>
                    <th>Contact No</th>
                    <th>Line Manager</th>
                    <th>Requestor Name</th>
                    <th>Department</th>
                    <th>Journey Start</th>
                    <th>Journey End</th>
                    <th>Description</th>
                    <th>Delete Booking</th>
                    </thead>
                    <tbody>
                    <?php
                    include_once "../admin/db-config.php";
                    $query = mysqli_query($conn, "select * from `trans_transport`");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['passenger_name']; ?></td>
                            <td><?php echo $row['contact_no']; ?></td>
                            <td><?php echo $row['line_mgr']; ?></td>
                            <td><?php echo $row['dept_name']; ?></td>
                            <td><?php echo $row['journey_start']; ?></td>
                            <td><?php echo $row['journey_end']; ?></td>
                            <td><?php echo $row['timestamp']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <center>
                                    <a href="delete_booking.php?id=<?php echo $row['id']; ?>">
                                        <button class="w3-btn w3-red" onclick="del_msg()">Delete</button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w3-container w3-responsive">
        <h3 class="w3-center">Employee Airport Transport Booking</h3>
        <div class="w3-container">
            <!--   Transport Booking Details     -->
            <div class="w3-responsive">
                <table id="user_table" border="1" class=" w3-table-all w3-hoverable">
                    <thead>
                    <th>Booking ID</th>
                    <th>Passenger Name</th>
                    <th>Contact No</th>
                    <th>Line Manager</th>
                    <th>Department</th>
                    <th>Flight Date</th>
                    <th>Journey Start</th>
                    <th>Journey End</th>
                    <th>Description</th>
                    <th>Delete Booking</th>
                    </thead>
                    <tbody>
                    <?php
                    include_once "../admin/db-config.php";
                    $query = mysqli_query($conn, "select * from `airport_transport`");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['passenger_name']; ?></td>
                            <td><?php echo $row['contact_no']; ?></td>
                            <td><?php echo $row['line_mgr']; ?></td>
                            <td><?php echo $row['dept_name']; ?></td>
                            <td><?php echo $row['flight_date']; ?></td>
                            <td><?php echo $row['journey_start_time']; ?></td>
                            <td><?php echo $row['journey_end_time']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <center>
                                    <a href="delete_airportbooking.php?id=<?php echo $row['id']; ?>">
                                        <button class="w3-btn w3-red" onclick="del_msg()">Delete</button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w3-container w3-responsive">
        <h3 class="w3-center">Night Taxi Transport Booking</h3>
        <div class="w3-container">
            <!--   Transport Booking Details     -->
            <div class="w3-responsive">
                <table id="user_table" border="1" class=" w3-table-all w3-hoverable">
                    <thead>
                    <th>Booking ID</th>
                    <th>Passenger Name</th>
                    <th>Contact No</th>
                    <th>Line Manager</th>
                    <th>Department</th>
                    <th>Pickup Location</th>
                    <th>Drop Location</th>
                    <th>Journey Start Time</th>
                    <th>Journey End Time</th>
                    <th>Description</th>
                    <th>Delete Booking</th>
                    </thead>
                    <tbody>
                    <?php
                    include_once "../admin/db-config.php";
                    $query = mysqli_query($conn, "select * from `night_taxi`");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['passenger_name']; ?></td>
                            <td><?php echo $row['contact_no']; ?></td>
                            <td><?php echo $row['line_mgr']; ?></td>
                            <td><?php echo $row['dept_name']; ?></td>
                            <td><?php echo $row['pickup_location']; ?></td>
                            <td><?php echo $row['drop_location']; ?></td>
                            <td><?php echo $row['journey_start_time']; ?></td>
                            <td><?php echo $row['journey_end_time']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <center>
                                    <a href="delete_nightTaxibooking.php?id=<?php echo $row['id']; ?>">
                                        <button class="w3-btn w3-red" onclick="del_msg()">Delete</button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="w3-container w3-responsive">
        <h3 class="w3-center">Hotel Booking</h3>
        <div class="w3-container">
            <!--   Transport Booking Details     -->
            <div class="w3-responsive">
                <table id="user_table" border="1" class=" w3-table-all w3-hoverable">
                    <thead>
                    <th>Booking ID</th>
                    <th>Employee Name</th>
                    <th>Contact No</th>
                    <th>Line Manager</th>
                    <th>Department</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Number of People</th>
                    <th>Number of Rooms</th>
                    <th>Room Type</th>
                    <th>Description</th>
                    <th>Delete Booking</th>
                    </thead>
                    <tbody>
                    <?php
                    include_once "../admin/db-config.php";
                    $query = mysqli_query($conn, "select * from `trans_hotel`");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['employee_name']; ?></td>
                            <td><?php echo $row['contact_no']; ?></td>
                            <td><?php echo $row['line_mgr']; ?></td>
                            <td><?php echo $row['dept_name']; ?></td>
                            <td><?php echo $row['check_in']; ?></td>
                            <td><?php echo $row['check_out']; ?></td>
                            <td><?php echo $row['no_people']; ?></td>
                            <td><?php echo $row['no_rooms']; ?></td>
                            <td><?php echo $row['room_type']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <center>
                                    <a href="delete_hotelbooking.php?id=<?php echo $row['id']; ?>">
                                        <button class="w3-btn w3-red" onclick="del_msg()">Delete</button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w3-container">
        <h3 class="w3-center">Vendor Invoices</h3>
        <table class="table table-bordered">
            <?php
            $query = "SELECT * FROM tbl_images ORDER BY id DESC";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '  
                          <tr>  
                               <td>  
                               <center>
                                    <img src="data:image/jpeg;base64,' . base64_encode($row['name']) . '" height="480" width="750" class="img-thumnail" />  
                                    </center>
                               </td>  
                          </tr>  
                     ';
            }
            ?>
        </table>
    </div>
    <div class="w3-center">
        <button class="w3-button w3-cyan" onclick="print_this();"> Print This Page</button>
    </div>
    <br>
    <br>
    <script>
        function save_update(id) {
            var approval_status = '#approval_status' + id;
            var approval_status = $(approval_status).val();

            $.ajax({
                url: 'update_booking.php',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    'id': id,
                    'approval_status': approval_status
                },
                success: function (data) {
                    alert(data);
                    location.reload();
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });

        }
    </script>


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

    //        <!-- Js code for map -->

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

<!--    msg for delete bookings-->
<script>
    function del_msg() {
        alert("Successfully Removed!");
    }
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZf_J6NsuyTn4abnSc7mw6yJbE_y_f39s&callback=myMap">
</script>

<!--js for print screen-->
<script>
    function print_this() {
        window.print();
    }
</script>


<!--js code ends here-->

</body>

</html>