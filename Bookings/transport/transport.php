<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'corpTravel'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

include '../../admin/functions.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_POST['submit_btn'])) {
    $query = "INSERT INTO corp_feedback (feedback_name, feedback_email, feedback_phone, feedback_message) VALUES
		(
        '" . $_POST["feedback_name"] . "',
        '" . $_POST["feedback_email"] . "',
        '" . $_POST["feedback_phone"] . "',
        '" . $_POST["feedback_message"] . "')";

    $result = mysqli_query($conn, $query);

    if (!empty($result)) {
        $error_message = "";
        $success_message = "Successfully Submitted!";
        unset($_POST);
    } else {
        $error_message = "Problem is occurred. Please Try Again!";
    }
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
    <link rel="stylesheet" href="../../css/materialize.min.css"/>
    <link rel="stylesheet" href="css/transport.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="img/LogoV1.png">
    <title>Transport Booking</title>
</head>

<body id="home" class="scrollspy">

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
                        <a href="#home">Hi, <?php echo $_SESSION['user']['username']; ?></a>
                    </li>
                    <li id="menu">
                        <a href="#menu">Menu</a>
                    </li>
                    <li id="myBookings">
                        <a href="../../dashboard/bookings_summary.php" target="_blank">My Bookings</a>
                    </li>
                    <li id="contact">
                        <a href="#contact">Contact Us</a>
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
    <li id="menu">
        <a href="#menu">Menu</a>
    </li>
    <li id="myBookings">
        <a href="../../dashboard/bookings_summary.php" target="_blank">My Bookings</a>
    </li>
    <li id="contact">
        <a href="#contact">Contact Us</a>
    </li>
    <li>
        <a href="../../index.php">Sign Out</a>
    </li>
</ul>

<!--ShowCase-->

<div class="row showcase">
    <div class="col s12 m10 offset-m1 center">
        <h2 class="white-text">Transport Booking</h2>
        <h5 class="white-text">
            Any Type of Road Transport needs could be booked here
        </h5>

        <br/><br/>
        <a href="#transportType" class="btn btn-large light-blue white-text">Get Started</a>
    </div>
</div>

<!-- photo / grid New Code -->
<h4 class="col s12 m10 offset-m1 center blue-text text-darken-4">
    Types of Transport
</h4>
<section class="container section scrollspy" id="transportType">
    <div class="row">
        <div class="col s12 l4">
            <img
                    src="img/car1.jpg"
                    alt="" class="responsive-img materialboxed"/>
        </div>
        <div class="col s12 l6 offset-l1">
            <h2 class="blue-text text-darken-4">Office</h2>
            <p>
                Your daily office related transport such as factory visits, workshops and home transport can be booked
                here.
            </p>
            <a href="transportform.php" target="_blank" class="btn btn-small light-blue white-text">Book Now</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l4 offset-l1 push-l7">
            <img
                    src="img/car2.jpg"
                    alt="" class="responsive-img materialboxed"/>
        </div>
        <div class="col s12 l6 offset-l1 pull-l5 right-align">
            <h2 class="blue-text text-darken-4">Airport</h2>
            <p>
                Transport for office staff, project related parties from other companies can be booked here
            </p>
            <a href="airportForm.php" target="_blank" class="btn btn-small light-blue white-text">Book Now</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l4">
            <img
                    src="img/car3.jpg"
                    alt="" class="responsive-img materialboxed"/>
        </div>
        <div class="col s12 l6 offset-l1">
            <h2 class="blue-text text-darken-4">Night Taxi</h2>
            <p>
                Late night transport for employees to ensure a safe drive home
            </p>
            <a href="nightTaxi.php" target="_blank" class="btn btn-small light-blue white-text">Book Now</a>
        </div>
    </div>
</section>

<!-- parallax -->
<div class="parallax-container">
    <div class="parallax">
        <img src="img/Pimage1.jpg" alt="" class="responsive-img"/>
    </div>
</div>

<!-- Feedback form -->
<section class="section container scrollspy" id="contact">
    <div class="row">
        <div class="col s12 l5">
            <h2 class="blue-text text-darken-4">Feedback</h2>
            <p>
                Corp Travel ensures every user in the company has a great experience in using this site.
            </p>
            <p>
                Please feel free to contact us for any feedback or any complains regarding this site.
            </p>
            <p>
                Got any idea to improve the side? Please feel free to fill the form and we will take the request into
                consideration.
            </p>
        </div>
        <div class="col s12 l5 offset-l2">
            <form method="post" action="<?php $_PHP_SELF ?>">
                <div class="input-field">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="name" type="text" class="validate" name="feedback_name"/>
                    <label for="name">Name</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <input type="email" id="email" name="feedback_email"/>
                    <label for="email">Your Email</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">phone_android</i>
                    <input type="tel" id="email" name="feedback_phone"/>
                    <label for="email">Your Phone</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">message</i>
                    <textarea id="message" class="materialize-textarea" cols="20" rows="20"
                              name="feedback_message"></textarea>
                    <label for="message">Your Message</label>
                </div>

                <div class="input-field center">
                    <button class="light-blue btn" type="submit" name="submit_btn">Submit</button>
                </div>
            </form>
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
<script src="../../js/materialize.min.js"></script>

<script>
    // Side Nav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});
    // Paralax
    $(document).ready(function () {
        $('.parallax').parallax();
    });
    // Date Picker
    $('.datepicker').datepicker({
        disableWeekends: true,
        yearRange: 1
    });

    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
        direction: 'top',
        hoverEnabled: false
    });
</script>

<!--        disable copy and paste -->
<script type="text/JavaScript">
    //courtesy of BoogieJack.com
    function killCopy(e) {
        return false
    }

    function reEnable() {
        return true
    }

    document.onselectstart = new Function("return false")
    if (window.sidebar) {
        document.onmousedown = killCopy
        document.onclick = reEnable
    }
    //ScrollSpy
    const ss = document.querySelectorAll('.scrollspy');
    M.ScrollSpy.init(ss, {});
</script>
<!--        js code ends here-->

</body>

</html>