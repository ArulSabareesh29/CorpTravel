<?php
$id = $_GET['id'];
include '../admin/db-config.php';
mysqli_query($conn, "delete from `user` where id='$id'");
header('location:user_infor.php');