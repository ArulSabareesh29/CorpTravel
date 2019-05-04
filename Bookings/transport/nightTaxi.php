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
    $query = "INSERT INTO night_taxi (passenger_name, contact_no, line_mgr, alt_line_mgr, dept_name, pickup_location, drop_location, taxi_date, journey_start_time, journey_end_time, description) VALUES
		(
        '" . $_POST["passenger_name"] . "',
        '" . $_POST["contact_no"] . "',
        '" . $_POST["line_mgr"] . "',
        '" . $_POST["alt_line_mgr"] . "',
        '" . $_POST["dept_name"] . "',
        '" . $_POST["pickup_location"] . "',
        '" . $_POST["drop_location"] . "',
        '" . $_POST["taxi_date"] . "',
        '" . $_POST["journey_start_time"] . "',
        '" . $_POST["journey_end_time"] . "',
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
        .form {
            padding-top: 50px;
        }

        .card .card-content {
            padding: 39px;
        }
    </style>

    <title>Night Taxi Form</title>
    <style>
        .btn_float {
            float: right;
        }
    </style>
</head>

<body>

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
                    <li id="myBookings">
                        <a href="../../dashboard/bookings_summary.php">My Bookings</a>
                    </li>
                    <li>
                        <a href="../../index.php">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<ul class="sidenav" id="mobile-nav">
    <li>
        <a href="transport.php">Hi, <?php echo $_SESSION['user']['username']; ?></a>
    </li>
    <li id="myBookings">
        <a href="../../dashboard/bookings_summary.php">My Bookings</a>
    </li>
    <li>
        <a href="../../index.php">Log Out</a>
    </li>
</ul>


<!-- Transport Form -->
<section class="form container">
    <div class="row">
        <div class="card hoverable">
            <div class="card-content">
                <h4 class="center">Night Taxi Form</h4>
                <form method="post" action="<?php $_PHP_SELF ?>">
                    <?php
                    if (isset($success_message)) {
                        echo "<div>" . $success_message . "</div>";
                    }
                    ?>
                    <!--                    <h5>Passenger Details</h5>-->
                    <!--                    <hr/>-->
                    <div class="row addUser">
                        <div class="input-field col s6 m6">
                            <i class="material-icons prefix">person_pin</i>
                            <input id="employee_name" type="text" class="validate"
                                   name="passenger_name"
                                   value="<?php echo $_SESSION['user']['username']; ?>"
                                   required/>
                            <label for="employee_name">Employee Name</label>
                        </div>
                        <div class="input-field col s6 m6">
                            <i class="material-icons prefix">phone</i>
                            <input id="contact_no" type="number" class="validate"
                                   name="contact_no"
                                   required/>
                            <label for="contact_no">Contact No</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">business_center</i>
                            <select id="line_mgr" name="line_mgr" required>
                                <option value="" disabled selected>Choose your Approver</option>
                                <option value="John Doe">John Doe</option>
                                <option value="Michael Marsh">Michael Marsh</option>
                                <option value="Rick Grimes">Rick Grimes</option>
                            </select>
                            <label>Line Manager</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">business_center</i>
                            <select id="alt_line_mgr" name="alt_line_mgr" required>
                                <option value="" disabled selected>Choose your Alternate Approver
                                </option>
                                <option value="Kumar">Kumar</option>
                                <option value="Ruwan">Ruwan</option>
                                <option value="Ponting">Ponting</option>
                            </select>
                            <label>Alternate Line Manager</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <i class="material-icons prefix">work_outline</i>
                            <select id="dept_name" name="dept_name" required>
                                <option value="" disabled selected>Select your Department</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                                <option value="HR">HR</option>
                            </select>
                            <label>Department Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">local_taxi</i>
                            <input type="text" id="pickup" name="pickup_location" required/>
                            <label for="pickup_location">Pickup Location Address</label>
                        </div>
                        <div class="input-field col s6 m6">
                            <i class="material-icons prefix">local_taxi</i>
                            <input type="text" id="drop" name="drop_location" required/>
                            <label for="pickup_location">Drop Location Address</label>
                        </div>
                        <div class="input-field col s12 m12">
                            <i class="material-icons prefix">place</i>
                            <input type="text" id="date" name="taxi_date" class="datepicker" required/>
                            <label for="taxi_date">Date</label>
                        </div>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">timer</i>
                        <input type="text" id="date" name="journey_start_time" class="timepicker" required/>
                        <label for="journey_start_time">Journey Start Time</label>
                    </div>
                    <div class="input-field col s6 m6">
                        <i class="material-icons prefix">timer</i>
                        <input type="text" id="date" name="journey_end_time" class="timepicker" required/>
                        <label for="journey_end_time">Journey End Time</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix">message</i>
                        <textarea placeholder="Description" id="textarea1" class="materialize-textarea"
                                  name="description"
                                  required></textarea>
                        <label for="textarea1">Travel Description</label>
                    </div>
                    <div class="center-align">
                        <button class="btn waves-effect waves-light" type="submit" name="submit_btn">Submit
                            <i class="material-icons right">check</i>
                        </button>
                        <button class="btn waves-effect waves-light" type="rest" name="submit_btn">Reset
                            <i class="material-icons right">clear</i>
                        </button>
                    </div>
            </div>
        </div>
        </form>
    </div>
</section>

<!-- Section : Footer -->
<footer class="section cyan darken-1 white-text center">
    <p class="flow-text">Corp Travel 2019 &copy; Designed by Arul Sabareesh</p>
</footer>

<!-- Chatbot -->
<?php include '../../chat.php' ?>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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


</script>
</body>

</html>