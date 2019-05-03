<?php
include_once "../admin/db-config.php";

$id = $_POST['id'];
$usr_email = mysqli_real_escape_string($conn,$_POST['approval_status']);


$sql = "UPDATE trans_transport SET approval_status= '".$usr_email."' where id = $id";

$retval = mysqli_query( $conn,$sql);

if(! $retval ) {
    die('Could not update data: ' . mysqli_error($conn));
}

echo "Updated data Successfully\n";
mysqli_close($conn);

?>