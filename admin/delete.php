<?php
	$id=$_GET['id'];
	include('db-config.php');
	mysqli_query($conn,"delete from `user` where id='$id'");
	header('location:view.php');
?>