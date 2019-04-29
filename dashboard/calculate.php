
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
