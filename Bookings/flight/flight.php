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
    $query = "INSERT INTO `flight_booking`(`passenger_name`, `from_airport`, `to_Airport`, `arrivalDate`, `departureDate`, `flight_Class`)  VALUES
		(
        '" . $_POST["passenger_name"] . "',
        '" . $_POST["from_airport"] . "',
        '" . $_POST["to_Airport"] . "',
        '" . $_POST["arrivalDate"] . "',
        '" . $_POST["departureDate"] . "',
        '" . $_POST["flight_Class"] . "')";

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


include_once 'flightBooking_connection.php';

include '../../admin/functions.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/materialize.min.css"/>
    <link rel="stylesheet" href="css/flight.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="./../../img/LogoV1.png">
    <title>Flight Booking</title>
</head>

<body id="home" class="scrollspy">

<div class="navbar-fixed">
    <nav class="cyan darken-1">
        <div class="container">
            <div class="nav-wrapper">
                <a href="#home" class="brand-logo"><img src="img/title_corp_travel.png" width="40%"></a>
                <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="#welcome">Hi, <?php echo $_SESSION['user']['username']; ?></a>
                    </li>
                    <li id="myaccount">
                        <a href="viewflight.php">My Bookings</a>
                    </li>
                    <li>
                        <a href="../../index.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- Side Navigation: Mobile View -->
<ul class="sidenav" id="mobile-nav">
    <li>
        <a href="#home">Hi, <?php echo $_SESSION['user']['username']; ?></a>
    </li>
    <li>
        <a href="viewflight.php">My Bookings</a>
    </li>
    <li id="menu">
        <a href="../../menu/menu.php">Menu</a>
    </li>
    <li id="contact">
        <a href="#contact">Feedback</a>
    </li>
    <li>
        <a href="../../index.php">Sign Out</a>
    </li>
</ul>

<!-- Showcase -->
<section class="showcase">
    <div class="row">
        <div class="col s12 m10 offset-m1 center">
            <h2 class="white-text">Flight Booking</h2>
            <h5 class="white-text">
                Any Type of Flight tickets could be booked here
            </h5>
            <br/><br/>
            <a href="#flightBooking" class="btn btn-large light-blue white-text">Get Booking</a>
        </div>
    </div>
</section>

<!-- Section: Search -->
<section id="search" class="section section-search cyan darken-1  white-text center scrollspy">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Search Destination</h3>
                <div class="input-field">
                    <input type="text" class="white grey-text autocomplete" id="autocomplete-input"
                           placeholder="Search Destinations Here"/>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Flight Details Search -->
<section class="scrollspy" id="flightBooking">
    <div class="row">
        <form class="container" method="post" action="<?php $_PHP_SELF ?>">
            <?php
            if (isset($success_message)) {
                echo "<div>" . $success_message . "</div>";
            }
            ?>
            <h4 class="center-align">Flight Booking Form</h4>
            <div class="row">
                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">person_pin</i>
                    <input placeholder="<?php echo $_SESSION['user']['username']; ?>"
                           value="<?php echo $_SESSION['user']['username']; ?>" id="passenger_name" type="text"
                           class="validate"
                           name="passenger_name"
                           required/>
                    <label for="passenger_name">Employee Name</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">local_airport</i>
                    <input
                            id="from"
                            type="text"
                            name="from_airport"
                            class="validate" required
                    />
                    <label for="From">From</label>
                    <div id="fromList"></div>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">local_airport</i>
                    <input name="to_Airport" id="to" type="text" class="validate" required/>
                    <label for="To">To</label>
                    <div id="toList"></div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">calendar_today</i>
                    <input type="text" name="arrivalDate" id="arrivalDate" class=" datepicker" required/>
                    <label for="number">Arrival</label>
                    <div id="arrivalDateList"></div>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">calendar_today</i>
                    <input type="text" name="departureDate" id="departureDate" class=" datepicker validate" required/>
                    <label for="Departure">Departure</label>
                    <div id="departureDateList"></div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">card_travel</i>
                        <select name="flight_Class" id="class" required>
                            <option value="economy">Economy</option>
                            <option value="business">Business</option>
                            <option value="luxury">Luxury</option>
                        </select>
                    </div>
                </div>
                <div class="center-align">
                    <button class="btn waves-effect waves-light" type="submit" name="submit_btn">Submit
                        <i class="material-icons right">check</i>
                    </button>
                    <button class="btn waves-effect waves-light" type="reset" name="reset_btn">Reset
                        <i class="material-icons right">clear</i>
                    </button>
                </div>
            </div>
        </form>
</section>


<!-- Section : Footer -->
<footer class="section cyan darken-1 white-text center">
    <p class="flow-text">Corp Travel 2019 &copy; 2019</p>
</footer>

<?php include '../../chat.php' ?>


<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../../js/materialize.min.js"></script>

<script>

    //ScrollSpy
    const ss = document.querySelectorAll('.scrollspy');
    M.ScrollSpy.init(ss, {});

    // Side Nav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});

    $('.datepicker').datepicker({
        disableWeekends: true,
        yearRange: 1
    });
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function () {
        $('select').formSelect();
    });

    // Autocomplete
    const ac = document.querySelector('.autocomplete');
    M.Autocomplete.init(ac, {
        data: {
            India: null,
            'Cancun Mexico': null,
            Bangalore: null,
            'Nuwer Eliya': null,
            Colombo: null,
            BIA: null,
            Agarapathana: null
        }
    });


    //Ajax
    $(document).ready(function () {
        $('#from').keyup(function () {
            let fromQuery = $(this).val();
            if (fromQuery !== '') {
                $.ajax({
                    url: "flightBooking_connection.php",
                    method: "POST",
                    data: {fromQuery: fromQuery},
                    success: function (data) {
                        $('#fromList').fadeIn();
                        $('#fromList').html(data);
                    }
                })
            } else {
                $('#fromList').fadeOut();
                $('#fromList').html("");
            }
        });
        $(document).on('click', 'li.from', function () {
            $('#from').val($(this).text().split('|', 1));
            $('#fromList').fadeOut();
        })
    });

    $(document).ready(function () {
        $('#to').keyup(function () {
            let toQuery = $(this).val();
            if (toQuery !== '') {
                $.ajax({
                    url: "flightBooking_connection.php",
                    method: "POST",
                    data: {toQuery: toQuery},
                    success: function (data) {
                        $('#toList').fadeIn();
                        $('#toList').html(data);
                    }
                })
            } else {
                $('#toList').fadeOut();
                $('#toList').html("");
            }
        });
        $(document).on('click', 'li.to', function () {
            $('#to').val($(this).text().split('|', 1));
            $('#toList').fadeOut();
        })
    });

    $(function () {

        $('form').on('submit', function (e) {
            let from = $("#from").val();
            let to = $("#to").val();
            let pullDDate = $("#departureDate").val();
            let reorderD = pullDDate.split("-");
            // let departureDate = reorderD[2] + '/' + reorderD[1] + '/' + reorderD[0];
            let pullADate = $("#arrivalDate").val();
            let reorderA = pullADate.split("-");
            // let arrivalDate = reorderA[2] + '/' + reorderA[1] + '/' + reorderA[0];
            /*let arrivalDate = $("#arrivalDate").val();*/
            let classVal = $("#class").val();

            e.preventDefault();

            $.ajax({
                url: 'flightBooking_connection.php',
                method: "POST",
                data: /*$('form').serialize()*/ {
                    from: from,
                    to: to,
                    departureDate: departureDate,
                    arrivalDate: arrivalDate,
                    classVal: classVal
                },
                success: function (data) {
                    console.log($('form').serialize());
                    console.log(departureDate);
                    console.log(arrivalDate);
                    $('#check').html(data);

                }
            });

        });

    });
</script>

</body>

</html>