<?php
$id=$_GET['id'];
include_once "../admin/db-config.php";
mysqli_query($conn,"delete from `trans_hotel` where id='$id'");
header('location:bookings.php');
?>