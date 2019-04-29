<?php
include 'functions.php';
include '../nav.php';

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../images/title.png">
    <!--Import Google Icon Font-->
    <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"
    />
    <!-- Compiled and minified CSS -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous"
    />

    <title>Admin Home</title>
    <style>
        .header {
            background: #0097a7;
        }

        button[name=register_btn] {
            background: #0097a7;
        }


        #user_table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #user_table td, #user_table th {
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
            padding-top: 8px;
            padding-bottom: 20px;
            text-align: left;
            background-color: #00acc1;
            color: white;
        }

        /*Css code for apply buttons*/
        .button {
            background-color: # #00acc1;
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

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php if (isset($_SESSION['user'])): ?>
        <strong><?php echo $_SESSION['user']['username']; ?></strong>

        <small>
            <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
            <br>
            <button type=""><a href="view.php" target="_blank">View Users</a></button>
            <button><a href="home.php?logout='1'" style="color: red;">logout</a></button>
        </small>

    <?php endif ?>
    <!-- logged in user information -->
    <div class="profile_info">
        <!--        <img src="../images/admin_profile.png"  >-->


    </div>
    <div class="container">
        <center><h4>Following Users Have Booked in the System</h4></center>
        <table id="user_table" border="1">
            <thead>
            <th>
                <center>Booking ID</center>
            </th>
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
                <center>Timestamp</center>
            </th>
            </thead>
            <tbody>
    </div>
    <?php
    include 'db-config.php';
    $query = mysqli_query($conn, "select * from `booking`");
    while ($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td>
                <center><?php echo $row['booking_id']; ?></center>
            </td>
            <td>
                <center><?php echo $row['booking_type']; ?></center>
            </td>
            <td>
                <center><?php echo $row['booking_code']; ?></center>
            </td>
            <td>
                <center><strong><?php echo $row['status']; ?></strong></center>
            </td>
            <td>
                <center><?php echo $row['timestamp']; ?></center>
            </td>

        </tr>
        <?php
    }
    ?>
    </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>