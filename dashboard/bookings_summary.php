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
<link rel="shortcut icon" href="../img/LogoV1.png">
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
    <a href="../menu/menu.php"><img src="../img/title_corp_travel.png" width="12%"></a>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s8 w3-bar">
            <h4>
                <span>Welcome <strong><?php echo $_SESSION['user']['username']; ?></strong></span>
            </h4>
        </div>
        <hr>
        <br>
        <img src="assets/banner.jpg" alt="admin_user" width="100%" height="100%">
    </div>
    <hr>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
     title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <hr>
    <h3 class="w3-center"><?php echo $_SESSION['user']['username']; ?>'s summary Of transport bookings
        for <?php echo date("d/M/Y") ?></h3>
    <div class="w3-container">
        <!--   User feedbacks     -->
        <div class="w3-responsive">
            <table class="data-table">
                <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Passenger Name</th>
                    <th>Contact No</th>
                    <th>Line Manager</th>
                    <th>Alt Line Manager</th>
                    <th>Department</th>
                    <th>Pickup Location</th>
                    <th>Drop Location</th>
                    <th>Journey Start Date</th>
                    <th>Journey End Date</th>
                    <th>Approval Status</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $sql = "SELECT * FROM `trans_transport` where `passenger_name` = '" . $_SESSION['user']['username'] . "'";

                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($query))
                {
                ?>

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
                                            <label for="usr">Passenger name:</label>
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
                                            <button type="button" onclick="save_update(<?php echo $row['id'] ?>)"
                                                    name="update" class="btn btn-primary">Submit
                                            </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
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
                    <td><center>' . $row['pickup_location'] . '</center></td>
                    <td><center>' . $row['drop_location'] . '</center></td>
                    <td><center>' . $row['journey_start'] . '</center></td>
                    <td><center>' . $row['journey_end'] . '</center></td>
                    <td><center><font color="#f44e42"><strong>' . $row['approval_status'] . '</strong></font></center></td>
				</tr>';
                            } ?>
                            <tr>
                            </tr>
                        </div>
                    </div>
                </div>
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