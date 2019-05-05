<?php
include_once "../../admin/db-config.php";

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
        echo '<script type="text/javascript">alert("Successfully Submitted!");</script>';
        header("Refresh:0");
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
    <link rel="stylesheet" href="css/hotel.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="img/LogoV1.png">
    <title>Corp Travel - Hotel</title>
</head>
<body id="home" class="scrollspy">
<div class="navbar-fixed">
    <nav class="cyan darken-1">
        <div class="container">
            <div class="nav-wrapper">
                <a href="../../menu/menu.php" class="brand-logo"><img src="img/title_corp_travel.png" width="40%"></a>
                <a href="../../menu/menu.php" data-target="mobile-nav" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="#home">Hi, <?php echo $_SESSION['user']['username']; ?></a>

                    </li>
                    <li id="myaccount">
                        <a href="viewhotel.php">My Bookings</a>
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
        <a href="viewhotel.php">My Bookings</a>
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

<!--Showcase-->
<div class="row showcase">
    <div class="col s12 m10 offset-m1 center">
        <h2 class="white-text">Hotel Booking</h2>
        <h5 class="white-text">
            Any Type of Hospitality Needs for Employees could be booked here
        </h5>
        <br/><br/>
        <a href="#hotelType" class="btn btn-large light-blue white-text">Get Started</a>
    </div>
</div>

<!-- Types of Hotel -->
<section id="hotelType" class="scrollspy">
    <div class="container">
        <div class="row">

            <?php
            $sql = "SELECT * FROM corp_hotels";
            //  mysql_select_db;
            $retval = mysqli_query($conn, $sql);

            if (!$retval) {
                die('Could not get data: ' . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($retval)) {
                ?>
                <div class="col s12 m4 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="<?php echo $row['image_path']; ?>"/>
                        </div>


                        <div class="card-content">
                            <span class="card-title"><?php echo $row['hotel_name']; ?></span>
                            <h6>Type - <?php echo $row['hotel_type']; ?></h6>
                            <h6>Price - LKR: <?php echo $row['single_room']; ?></h6>
                            <h6>Rating</h6>
                        </div>
                        <div class="card-action">
                            <a href="#modal1" class="waves-effect waves-light modal-trigger">Book Now</a>
                        </div>
                    </div>
                </div>

                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h5>Hotel Agreement</h5>
                        <p>
                            Corp Travel PLC is a public quoted company which entered
                            the leisure industry with a commitment to build and manage a
                            chain of distinctive hotels and resorts that are benchmarked
                            against the most coveted in the world. Corp Travel intends to
                            provide the most exceptional and memorable hospitality in
                            Sri Lanka by exceeding guest expectations and by creating a
                            travel experience like no other.
                        </p>
                        <br/>
                        <p>
                            By Requesting to book you are agreeing with the
                            companies Hospitality Policy
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="hotelform.php" target="_blank" class="modal-close waves-effect waves-green btn-flat">Agree & Request
                            Booking</a>
                    </div>
                </div>
                <?php
            }
            //echo "Fetched data successfully\n";
            mysqli_close($conn);
            ?>
</section>

<!-- Feedback form -->
<section class="section grey lighten-5 scrollspy" id="contact">
    <div class="container">
        <div class="row">
            <div class="col s12 l5">
                <h3 class="blue-text text-darken-4">Feedback</h3>
                <p>
                    Corp Travel ensures every user in the company has a great experience in using this site.
                </p>
                <p>
                    Please feel free to contact us for any feedback or any complains regarding this site.
                </p>
                <p>
                    Got any idea to improve the side? Please feel free to fill the form and we will take the request
                    into
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
    </div>
</section>
<section>
    <footer class="section cyan darken-1 white-text center">
        <p class="flow-text">Corp Travel 2019 &copy; 2019</p>
    </footer>
</section>

<!-- Chatbot -->
<?php include '../../chat.php' ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="../../js/materialize.min.js"></script>
<script>
    // Side Nav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});

    $(document).ready(function () {
        $('.modal, .modal2, .modal3, .modal4, .modal5, .modal6').modal();
    });
    $('.datepicker').datepicker({
        disableWeekends: true,
        yearRange: 1
    });
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>

<!-- Disable copy and paste -->
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