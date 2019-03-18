<?php
$id = $_GET['id'];
include 'db-config.php';
mysqli_query($conn, "delete from `trans_transport` where id='$id'");
header('location:view.php');