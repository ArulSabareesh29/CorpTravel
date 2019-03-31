<?php
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
    <link rel="stylesheet" href="../../css/materialize.min.css"/>
    <link rel="stylesheet" href="css/transport.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <title>Transport Booking</title>
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

<!-- <h3 class="center align">Transport Services</h3> -->

<div class="row showcase">
    <div class="col s12 m10 offset-m1 center">
        <h2 class="white-text">Transport Booking</h2>
        <h5 class="white-text">
            Any Type of Road Transport needs could be booked here
        </h5>
        <!-- <p class="white-text">
            Any Transport needs could be booked here
          </p> -->
        <br/><br/>
        <a href="transportform.php" class="btn btn-large light-blue white-text">Book Now</a>
    </div>
</div>

<!-- photo / grid New Code -->
<h4 class="col s12 m10 offset-m1 center blue-text text-darken-4">
    Types of Transport
</h4>
<section class="container section scrollspy" id="photos">
    <div class="row">
        <div class="col s12 l4">
            <img
                    src="https://images.unsplash.com/photo-1534452783036-3c9a9dfa7dc4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                    alt="" class="responsive-img materialboxed"/>
        </div>
        <div class="col s12 l6 offset-l1">
            <h2 class="blue-text text-darken-4">Office</h2>
            <p>
                Your daily office related transport such as factory visits, workshops and home transport can be booked
                here.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l4 offset-l1 push-l7">
            <img
                    src="https://images.unsplash.com/photo-1517243667550-44d5628894d0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                    alt="" class="responsive-img materialboxed"/>
        </div>
        <div class="col s12 l6 offset-l1 pull-l5 right-align">
            <h2 class="blue-text text-darken-4">Airport</h2>
            <p>
                Transport for office staff, project related parties from other companies can be booked here
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l4">
            <img
                    src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                    alt="" class="responsive-img materialboxed"/>
        </div>
        <div class="col s12 l6 offset-l1">
            <h2 class="blue-text text-darken-4">Night Taxi</h2>
            <p>
                Late night transport for employees to ensure a safe drive home
            </p>
        </div>
    </div>
</section>

<!-- parallax -->
<div class="parallax-container">
    <div class="parallax">
        <img src="img/Pimage1.jpg" alt="" class="responsive-img"/>
    </div>
</div>

<!-- contact form -->
<section class="section container scrollspy" id="contact">
    <div class="row">
        <div class="col s12 l5">
            <h2 class="blue-text text-darken-4">Contact Us</h2>
            <p>
                Corp Travel ensures every user in the company has a great experience in using this site.
            </p>
            <p>
                Please feel free to contact us for any feedback or any complains regarding this site.
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum
                at lacus congue, suscipit elit nec, tincidunt orci.
            </p>
            <p>
                Mauris dolor augue, vulputate in pharetra ac, facilisis nec libero.
                Fusce condimentum gravida urna, vitae scelerisque erat ornare nec.
            </p>
        </div>
        <div class="col s12 l5 offset-l2">
            <form>
                <div class="input-field">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="name" type="text" class="validate"/>
                    <label for="name">Name</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <input type="email" id="email"/>
                    <label for="email">Your Email</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">message</i>
                    <textarea id="message" class="materialize-textarea" cols="20" rows="20"></textarea>
                    <label for="message">Your Message</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" id="date" class="datepicker"/>
                    <label for="date">Choose a date you need me for...</label>
                </div>
                <div class="input-field center">
                    <button class="light-blue btn">Submit</button>
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
</body>

</html>