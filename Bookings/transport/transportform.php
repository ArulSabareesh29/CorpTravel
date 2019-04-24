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
    $query = "INSERT INTO trans_transport (passenger_name, contact_no, line_mgr, alt_line_mgr, req_first_name, req_last_name, email, req_contact_no, dept_name, cost_center, journey_start, journey_end, journey_start_time, journey_end_time, description) VALUES
		(
        '" . $_POST["passenger_name"] . "',
        '" . $_POST["contact_no"] . "',
        '" . $_POST["line_mgr"] . "',
        '" . $_POST["alt_line_mgr"] . "',
        '" . $_POST["req_first_name"] . "',
        '" . $_POST["req_last_name"] . "',
        '" . $_POST["email"] . "',
        '" . $_POST["req_contact_no"] . "',
        '" . $_POST["dept_name"] . "',
        '" . $_POST["cost_center"] . "',
        '" . $_POST["journey_start"] . "',
        '" . $_POST["journey_end"] . "',
        '" . $_POST["journey_start_time"] . "',
        '" . $_POST["journey_end_time"] . "',
        '" . $_POST["description"] . "')";

    $result = mysqli_query($conn, $query);

    if (!empty($result)) {
        $error_message = "";
        $success_message = "Successfully Submitted!";
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
    <style>
        .form {
            padding-top: 50px;
        }
        .card .card-content {
            padding: 39px;
        }
    </style>

    <title>Transport Form</title>
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
                <a href="../../menu/menu.php" class="brand-logo">Corp Travel</a>
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


<!-- Transport Form -->
<section class="form container">
    <div class="row">
        <div class="card hoverable">
            <div class="card-content">
                <h4 class="center">Transport Form</h4>
                <form method="post" action="<?php $_PHP_SELF ?>">
                    <?php
                    if (isset($success_message)) {
                        echo "<div>" . $success_message . "</div>";
                    }
                    ?>
                    <h4>Passenger Details</h4>
                    <hr/>
                    <div class="row addUser">
                        <div class="input-field col s6 m6">
                            <i class="material-icons prefix">mail</i>
                            <input placeholder="John" id="employee_name" type="text" class="validate"
                                   name="passenger_name"
                                   required/>
                            <label for="employee_name">Employee Name</label>
                        </div>
                        <div class="input-field col s6 m6">
                            <div class="btn_float">
                                <a href="#" class="btn-floating blue pulse prefix add_button">
                                    <i class="material-icons">add</i>
                                </a>
                            </div>

                            <input placeholder="Contact Details" id="contact_no" type="text" class="validate"
                                   name="contact_no"
                                   required/>
                            <label for="contact_no">Contact No</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <select id="line_mgr" name="line_mgr" required>
                                <option value="" disabled selected>Choose your Approver</option>
                                <option value="John Doe">John Doe</option>
                                <option value="Michael Marsh">Michael Marsh</option>
                                <option value="Rick Grimes">Rick Grimes</option>
                            </select>
                            <label>Line Manager</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <select id="alt_line_mgr" name="alt_line_mgr" required>
                                <option value="" disabled selected>Choose your Alternate Approver
                                </option>
                                <option value="John Doe">John Doe</option>
                                <option value="Michael Marsh">Michael Marsh</option>
                                <option value="Rick Grimes">Rick Grimes</option>
                            </select>
                            <label>Alternate Line Manager</label>
                        </div>
                    </div>
                    <h4>Requestor Details</h4>
                    <hr/>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input placeholder="John" id="first_name" type="text" class="validate" name="req_first_name"
                                   required/>
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input placeholder="Doe" id="last_name" type="text" class="validate" name="req_last_name"
                                   required/>
                            <label for="last_name">Last Name</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input placeholder="JohnDoe@example.com" id="email" type="email" class="validate"
                                       name="email"
                                       required/>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">phone</i>
                                <input type="number" id="number" placeholder="Enter Phone No..." class="validate"
                                       name="req_contact_no"
                                       required/>
                                <label for="number">Contact Number</label>
                            </div>
                        </div>
                        <h4>Additional Details</h4>
                        <hr/>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select id="dept_name" name="dept_name" required>
                                    <option value="" disabled selected>Select your Department</option>
                                    <option value="John Doe">John Doe</option>
                                    <option value="Michael Marsh">Michael Marsh</option>
                                    <option value="Rick Grimes">Rick Grimes</option>
                                </select>
                                <label>Department Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="cost_center" name="cost_center" required>
                                    <option value="" disabled selected>Select your CRG</option>
                                    <option value="250">250</option>
                                    <option value="269">269</option>
                                    <option value="200">200</option>
                                </select>
                                <label>Cost Center</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input type="text" id="date" name="journey_start" class="datepicker" required/>
                                <label for="employee_name">Journey Start</label>
                            </div>
                            <div class="input-field col s6 m6">
                                <input type="text" id="date" name="journey_end" class="datepicker" required/>
                                <label for="employee_name">Journey End</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input type="text" id="date" name="journey_start_time" class="timepicker" required/>
                                <label for="employee_name">Journey Start Time</label>
                            </div>
                            <div class="input-field col s6 m6">
                                <input type="text" id="date" name="journey_end_time" class="timepicker" required/>
                                <label for="employee_name">Journey End Time</label>
                            </div>
                            <div class="input-field col s12 m12">
                            <textarea placeholder="Description" id="textarea1" class="materialize-textarea"
                                      name="description"
                                      required></textarea>
                                <label for="textarea1">Travel Description</label>
                            </div>
                        </div>
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
</section>

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

    //Add User Code
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.addUser'); //Input field wrapper
        var fieldHTML =
            '                    <div class="row addUser">\n' +
            '                        <div class="input-field col s6 m6">\n' +
            '                            <i class="material-icons prefix">mail</i>\n' +
            '                            <input id="employee_name" type="text" class="validate"\n' +
            '                                   name="passenger_name"\n' +
            '                                   required/>\n' +
            '                            <label for="employee_name">Employee Name</label>\n' +
            '                        </div>\n' +
            '                        <div class="input-field col s6 m6">\n' +
            '                            <div class="btn_float">\n' +
            '                                <a href="#" class="btn-floating blue pulse prefix add_button">\n' +
            '                                    <i class="material-icons">add</i>\n' +
            '                                </a>\n' +
            '                            </div>\n' +
            '\n' +
            '                            <input id="contact_no" type="text" class="validate"\n' +
            '                                   name="contact_no"\n' +
            '                                   required/>\n' +
            '                            <label for="contact_no">Contact No</label>\n' +
            '                        </div>\n' +
            '                    </div>'; //New input field html

        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this)
                .parent('div')
                .remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

    $('#add_button').click(function () {
        var html = $('.child_div:first').parent().html();
        $(html).insertBefore(this);
    });

    $(document).on("click", ".deleteButton", function () {
        $(this).closest('.child_div').remove();
    });

</script>
</body>

</html>