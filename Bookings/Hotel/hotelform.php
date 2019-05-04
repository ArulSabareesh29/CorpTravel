<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'corpTravel'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (isset($_POST['submit_btn'])) {
    $query = "INSERT INTO trans_hotel (employee_name, contact_no, line_mgr, alt_line_mgr, dept_name, check_in, check_out, no_people, no_rooms, room_type, description) VALUES
		(
        '" . $_POST["employee_name"] . "',
        '" . $_POST["contact_no"] . "',
        '" . $_POST["line_mgr"] . "',
        '" . $_POST["alt_line_mgr"] . "',
        '" . $_POST["dept_name"] . "',
        '" . $_POST["check_in"] . "',
        '" . $_POST["check_out"] . "',
        '" . $_POST["no_people"] . "',
        '" . $_POST["no_rooms"] . "',
        '" . $_POST["room_type"] . "',
        '" . $_POST["description"] . "')";

    $result = mysqli_query($conn, $query);

    if (!empty($result)) {
        $error_message = "";
        $success_message = "Successfully Submitted!";
        echo '<script type="text/javascript">alert("Successfully Submitted!");</script>';
        header("Refresh:0");
        unset($_POST);
    } else {
        $error_message = "Problem is occurred. Please Try Again!";
    }
}

include '../../admin/functions.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
    <link rel="shortcut icon" href="img/LogoV1.png">
    <style>
        #form1 {
            padding-top: 50px;
        }

    </style>

    <title>Hotel Booking Form</title>
</head>

<body>

<!--Nav Bar-->
<div class="navbar-fixed">
    <nav class="cyan darken-1">
        <div class="container">
            <div class="nav-wrapper">
                <a href="../../menu/menu.php" class="brand-logo"><img src="img/title_corp_travel.png" width="40%"></a>
                <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="#welcome">Hi, <?php echo $_SESSION['user']['username']; ?></a>

                    </li>
                    <li id="myaccount">
                        <a href="#account">My Account</a>
                    </li>
                    <li>
                        <a href="../../index.php">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!--Responsive Side Bar for Mobile Devices-->
<ul class="sidenav" id="mobile-nav">
    <li>
        <a href="transport.php">Hi, <?php echo $_SESSION['user']['username']; ?></a>
    </li>
    <li id="myaccount">
        <a href="#account">My Account</a>
    </li>
    <li>
        <a href="../../index.php">Log Out</a>
    </li>
</ul>

<!--Hotel Form-->
<section>
    <div id="form1" class="container">
        <div class="row">
            <div class="card hoverable">
                <div class="card-content">
                    <span class="card-title"><h4 class="center">Hotel Booking Form</h4></span>

                    <form method="post" action="<?php $_PHP_SELF ?>" class="hotel_box">
                        <?php
                        if (isset($success_message)) {
                            echo "<div>" . $success_message . "</div>";
                        }
                        ?>
                        <h5>Visitor Details</h5>
                        <hr/>
                        <div class="row addUser">
                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">person_pin</i>
                                <input placeholder="<?php echo $_SESSION['user']['username']; ?>" id="first_name"
                                       type="text" class="validate"
                                       name="employee_name"
                                       required value="<?php echo $_SESSION['user']['username']; ?>"/>
                                <label for="visitor_name">Employee First Name</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">phone</i>
                                <input type="number" id="number" placeholder="Enter Phone No..." class="validate"
                                       name="contact_no"
                                       required/>
                                <label for="number">Contact Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">person_pin</i>
                                <select id="line_mgr" name="line_mgr" required>
                                    <option value="" disabled selected>Choose your Approver</option>
                                    <option value="John Doe">John Doe</option>
                                    <option value="Michael Marsh">Michael Marsh</option>
                                    <option value="Rick Grimes">Rick Grimes</option>
                                </select>
                                <label>Line Manager</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">supervisor_account</i>
                                <select id="alt_line_mgr" name="alt_line_mgr" required>
                                    <option value="" disabled selected>Choose your Alternate Approver
                                    </option>
                                    <option value="Ruwan">Ruwan</option>
                                    <option value="Ponting">Michael Marsh</option>
                                    <option value="Kumar">Kumar</option>
                                </select>
                                <label>Alternate Line Manager</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l12">
                                <i class="material-icons prefix">work</i>
                                <select id="dept_name" name="dept_name" required>
                                    <option value="" disabled selected>Select your Department</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Human Resources">Human Resourses</option>
                                    <option value="Supply Chain">Supply Chain</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                                <label>Department Name</label>
                            </div>
                        </div>
                        <h5>Room Details</h5>
                        <hr/>
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">hotel</i>
                                <input type="text" id="date" name="check_in" class="datepicker" required/>
                                <label for="check_in">Check in</label>
                            </div>
                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">hotel</i>
                                <input type="text" id="date" name="check_out" class="datepicker" required/>
                                <label for="check_out">Check Out</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <i class="material-icons prefix">people_outline</i>
                                <select id="no_people" name="no_people" required>
                                    <option value="" disabled selected>No of Persons</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <label>Persons</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <i class="material-icons prefix">people</i>
                                <select id="no_rooms" name="no_rooms" required>
                                    <option value="" disabled selected>No of Rooms</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <label>Rooms</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <i class="material-icons prefix">people_outline</i>
                                <select id="room_type" name="room_type" required>
                                    <option value="" disabled selected>Type</option>
                                    <option value="Single Room">Single Room</option>
                                    <option value="Double Room">Double Room</option>
                                    <option value="Deluxe Room">Deluxe Room</option>
                                </select>
                                <label>Room Type</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">textsms</i>
                                <textarea placeholder="Description" id="textarea1" class="materialize-textarea"
                                          data-length="120" name="description" required></textarea>
                                <label for="textarea1">Travel Description</label>
                            </div>
                        </div>
                        <div class="center-align">
                            <button class="btn waves-effect waves-light" type="submit" name="submit_btn">Submit
                                <i class="material-icons right">check</i>
                            </button>
                            <button class="btn waves-effect waves-light" type="rest" name="submit_btn">Reset
                                <i class="material-icons right">clear</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section : Footer -->
<footer class="section cyan darken-1 white-text center">
    <p class="flow-text">Corp Travel 2019 &copy; 2019</p>
</footer>

<!-- Chatbot -->
<?php include '../../chat.php' ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="../../js/materialize.min.js"></script>
<script>
    // Side Nav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});
    $('.datepicker').datepicker({
        disableWeekends: true,
        yearRange: 1
    });
    $(document).ready(function () {
        $('.timepicker').timepicker();
    });

    $(document).ready(function () {
        $('select').formSelect();
    });
    $(document).ready(function () {
        $('textarea#textarea1').characterCounter();
    });
</script>
</body>

</html>