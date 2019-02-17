<?php
include 'functions.php';

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../images/title.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin Home</title>
    <style>
        .header {
            background: #003366;
        }
        button[name=register_btn] {
            background: #003366;
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

        #user_table tr:nth-child(even){background-color: #f2f2f2;}

        #user_table tr:hover {background-color: #ddd;}

        #user_table th {
            padding-top: 8px;
            padding-bottom: 20px;
            text-align: left;
            background-color: #0033669c;
            color: white;
        }

        /*Css code for apply buttons*/
        .button {background-color: #f44336;
            border: none;
            color: white;
            padding: 9px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;}

        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>Admin - Home Page</h2>
</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="error success" >
            <h3>
                <?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
            </h3>
        </div>
    <?php endif?>

    <?php if (isset($_SESSION['user'])): ?>
        <strong><?php echo $_SESSION['user']['username']; ?></strong>

        <small>
            <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
            <br>
            <button type=""><a href="view.php" target="_blank">Delete User</a></button>
            <button><a href="home.php?logout='1'" style="color: red;">logout</a></button>
        </small>

    <?php endif?>
    <!-- logged in user information -->
    <div class="profile_info">
<!--        <img src="../images/admin_profile.png"  >-->

        <div>

        </div>
    </div>
</div>
<center><h2><U>Following Users Have Booked in the System</U></h2></center>
<table id="user_table" border="1">
    <thead>
    <th><center>Booking ID</center></th>
    <th><center>Booking Type</center></th>
    <th><center>Booking Code</center></th>
    <th><center>Status</center></th>
    <th><center>Timestamp</center></th>
    <th><center>Date and Time</center></th>
    <!-- <th><center></center></th> -->
    </thead>
    <tbody>
    <?php
include 'db-config.php';
$query = mysqli_query($conn, "select * from `booking`");
while ($row = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><center><?php echo $row['booking_id']; ?></center></td>
            <td><center><?php echo $row['booking_type']; ?></center></td>
            <td><center><?php echo $row['booking_code']; ?></center></td>
            <td><center><strong><?php echo $row['status']; ?></strong></center></td>
            <td><center><?php echo $row['timestamp']; ?></center></td>
            <td><center><?php echo $row['date and time']; ?></center></td>
            <!-- <td><center><?php echo $row['Returned Date']; ?></center></td> -->
        </tr>
        <?php
}
?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>