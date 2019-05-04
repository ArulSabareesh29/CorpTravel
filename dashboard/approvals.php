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
        <a href="approvals.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Approvals</a>
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
    <hr>

    <div class="w3-container">
        <div class="w3-responsive">
            <h3 class="w3-center">Types of Bookings</h3>
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
        <br>

        <div class="w3-container w3-padding">
            <h3 class="w3-center">User Transport Booking</h3>
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
                    <th>Timestamp</th>
                    <th></th>
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
    <br>
    <div class="w3-container w3-padding w3-responsive">
        &nbsp; <h3 class="w3-center">User Transport Booking - Approval</h3>
        <table class="data-table" class=" w3-table-all w3-hoverable">
            <thead>
            <tr>
                <th>Booking ID</th>
                <th>Passenger Name</th>
                <th>Contact No</th>
                <th>Line Manager</th>
                <th>Alt Line Manager</th>
                <th>Dept. Name</th>
                <th>Journey Start</th>
                <th>Journey End</th>
                <th>Pickup Location</th>
                <th>Drop Location</th>
                <th>Approve/Decline</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $sql = "SELECT * FROM `trans_transport` WHERE `approval_status` NOT LIKE 'Approved'";

            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query))
            {
            ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <strong>
                            <h3>Booking Approval Form</h3>
                        </strong>
                    </center>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="<?php $_PHP_SELF ?>">
                        <div class="row">
                            <div class="form-group">
                                <label for="usr">Passanger name:</label>
                                <input type="text" class="form-control"
                                       placeholder="<?php echo $row['passenger_name'] ?>"
                                       value="<?php echo $row['passenger_name'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Approval Status:</label>
                                <select class="form-control" name="approval_status"
                                        id="approval_status<?php echo $row['id'] ?>">
                                    <option value="Approved">Approved</option>
                                    <option value="Decline">Decline</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="save_update(<?php echo $row['id'] ?>)" name="update"
                                        class="btn btn-primary">Submit
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                echo '<tr>
					<td><center>' . $row['id'] . '</center></td>
                    <td>' . $row['passenger_name'] . '</td>
                    <td><center>' . $row['contact_no'] . '</center></td>
                    <td><center><font size="2.4px"><b>' . $row['line_mgr'] . '</b></font></center></td>
                    <td><center>' . $row['alt_line_mgr'] . '</center></td>
                    <td><center>' . $row['dept_name'] . '</center></td>
                    <td><center>' . $row['journey_start'] . '</center></td>
                    <td><center>' . $row['journey_end'] . '</center></td>
                    <td><center>' . $row['pickup_location'] . '</center></td>
                    <td><center>' . $row['drop_location'] . '</center></td>
                    <td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal' . $row['id'] . '">Approved</button></td>
				</tr>';
                } ?>
                <tr>
                </tr>
            </div>
        </div>
    </div>
    </tbody>
    </table>
    <br>
    <br>

    <!--   user feedbacks     -->
    <div class="w3-container w3-padding">
        <h3>User Feedbacks</h3>

        <div class="w3-responsive">
            <table id="example" class=" w3-table-all w3-hoverable">
                <thead>
                <tr>
                    <th>
                        <center>Feedback ID</center>
                    </th>
                    <th>
                        <center>User name</center>
                    </th>
                    <th>
                        <center>User Email</center>
                    </th>
                    <th>
                        <center>Contact No.</center>
                    </th>
                    <th>
                        <center>Feedback</center>
                    </th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php

                $sql = "SELECT * FROM corp_feedback";

                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query)) {
                    ?>

                    <?php
                    echo '<tr>
                    <td><center>' . $row['feedback_id'] . '</center></td>
                    <td><center>' . $row['feedback_name'] . '</center></td>
                    <td><center><font size="3px"><b>' . $row['feedback_email'] . '</b></font></center></td>
                    <td><center>' . $row['feedback_phone'] . '</center></td>
                    <td><center>' . $row['feedback_message'] . '</center></td>
				</tr>';
                } ?>
                <tr>
                </tr>
                </tbody>
            </table>
        </div>
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

</body>

</html>