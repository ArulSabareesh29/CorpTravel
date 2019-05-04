
<!-- admin count -->
<?php
$sql = "SELECT * FROM user WHERE user_type ='admin'";
//  mysql_select_db;
$connStatus = $conn->query($sql);

$numberOfAdUserRows = mysqli_num_rows($connStatus);

// echo $numberOfAdUserRows;
?>

<!-- admin count -->
<?php
$sql = "SELECT * FROM user WHERE user_type ='user'";
//  mysql_select_db;
$connStatus = $conn->query($sql);

$numberOfEUserRows = mysqli_num_rows($connStatus);

// echo $numberOfAdUserRows;
?>

<!-- admin count -->
<?php
$sql = "SELECT * FROM user WHERE user_type ='vendor'";
//  mysql_select_db;
$connStatus = $conn->query($sql);

$numberOfVenUserRows = mysqli_num_rows($connStatus);

// echo $numberOfAdUserRows;
?>

<!-- transport booking count -->
<?php
$sql = "SELECT * FROM trans_transport";
//  mysql_select_db;
$connStatus = $conn->query($sql);

$numberOfTransBookRows = mysqli_num_rows($connStatus);

// echo $numberOfAdUserRows;
?>

<!-- hotel booking count -->
<?php
$sql = "SELECT * FROM trans_hotel";
//  mysql_select_db;
$connStatus = $conn->query($sql);

$numberOfHotelBookRows = mysqli_num_rows($connStatus);

// echo $numberOfAdUserRows;
?>

<!-- flight booking count -->
<?php
$sql = "SELECT * FROM flight_booking";
//  mysql_select_db;
$connStatus = $conn->query($sql);

$numberOfFlightBookRows = mysqli_num_rows($connStatus);

// echo $numberOfAdUserRows;
?>
