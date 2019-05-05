<?php
include '../../admin/functions.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/materialize.min.css"/>
    <link rel="stylesheet" href="css/hotel.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="img/LogoV1.png">
    <title>Corp Travel - Hotel</title>
        <link rel="shortcut icon" href="../images/title.png">
        <title>Corp Travel</title>
        <style>
            #user_table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #user_table td,
            #user_table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #user_table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            #user_table tr:hover {
                background-color: #ddd;
            }

            #user_table th {
                padding-top: 25px;
                padding-bottom: 20px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }

            /*Css code for apply buttons*/
            .button {
                background-color: #f44336;
                border: none;
                color: white;
                padding: 9px 15px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
    </head>

<body>
<nav class="cyan darken-1">
    <div class="container">
        <div class="nav-wrapper">
            <a href="../../menu/menu.php" class="brand-logo"><img src="img/title_corp_travel.png" width="40%"></a>
            <a href="../../menu/menu.php" data-target="mobile-nav" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="#home">Hi, <?php echo $_SESSION['user']['username']; ?></a>

                </li>
                <li>
                    <a href="../../index.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>
<!-- Side Navigation: Mobile View -->
<ul class="sidenav" id="mobile-nav">
    <li>
        <a href="#home">Hi, <?php echo $_SESSION['user']['username']; ?></a>
    </li>
    <li>
        <a href="#account">My Bookings</a>
    </li>
    <li id="contact">
        <a href="#contact">Feedback</a>
    </li>
    <li>
        <a href="../../index.php">Sign Out</a>
    </li>
</ul>
<div>
    <center>
        <h4> <?php echo $_SESSION['user']['username']; ?>'s Hotel Bookings</h4>
    </center>
    <table id="user_table" border="1">
        <thead>
        <th>Id</th>
        <th>Employee Name</th>
        <th>Contact No.</th>
        <th>Approver</th>
        <th>Department</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>No. of Persons</th>
        <th>No. of Rooms</th>
        <th>Room Type</th>
        <th>Description</th>
        </thead>
        <tbody id="myTable">
        <?php
        include '../../admin/db-config.php';
        $query = mysqli_query($conn, "select * from `trans_hotel` where `employee_name` = '" . $_SESSION['user']['username'] . "' ");
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
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <br>
    <a href="hotel.php">
        <button class="button" type="button">Close</button>
    </a>
    <a href="#">
        <button class="button" type="button" onclick="print_out();">Print</button>
    </a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<!--  js code for print-->
<script>
    function print_out() {
        window.print();
    }
</script>
</body>

</html>