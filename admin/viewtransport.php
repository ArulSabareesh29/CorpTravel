<?php
session_start();
include 'db-config.php';

if ($row_count > 0) {
    //session setup
    $_SESSION['myusername'] = $value['Username'];
    $_SESSION['mypassword'] = $value['Password'];
    $_SESSION['myusertype'] = $value['Type'];

    if ($_SESSION['usertype'] == "admin") {
        header("location: admin.php");
    } else if ($_SESSION['myusertype'] == "User") {
        header("location: user.php");
    } else {
        ($_SESSION['myusertype'] == "Visitor") {
            header("location: visitor.php")
        };
    }

} else {

    include "index.php";
    echo "Wrong user or password";
    echo "<br>Please try to <a href='index.php'>Log in</a> again or go to <a        href='sign.php'>registration</a> page";
}
;
?>
shareimpr