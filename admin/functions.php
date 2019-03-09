<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'corpTravel');

// variable declaration
$username = "";
$email = "";
$errors = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    register();
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_user'])) {
    login();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../login.php");
}

// TO REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $user_type = mysqli_real_escape_string($db, $_POST['user_type']);

    // form validation: ensure that the form is correctly filled
    if (empty($username)) {array_push($errors, "Username is required");}
    if (empty($email)) {array_push($errors, "Email is required");}
//        if (empty($dob)) { array_push($errors, "Date of Birth is Required"); }
    if (empty($password_1)) {array_push($errors, "Password is required");}

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
//      $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO user (username, email, dob, password, pw_reset,user_type)
					  VALUES('$username', '$email','$dob', '$password_1', '$password_2','$user_type')";
        mysqli_query($db, $query);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: genre.php');
    }

}

// return user array from their id
function getUserById($id)
{
    global $db;
    $query = "SELECT * FROM user WHERE id=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

// LOGIN USER
function login()
{
    global $db, $username, $errors;

    // Get the values
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    //Make sure form is filled properly to check Validation
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // Login if no errors on form
    if (count($errors) == 0) {

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are now logged in";
                header('location: dashboard/index.html');

            } elseif ($logged_in_user['user_type'] == 'user') {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You are now logged in";

                header('location:menu/menu.html ');
            }

        } else {
            array_push($errors, "Wrong username/password ");
        }
    }
}

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function isAdmin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

// escape string
function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}
