<?php
include '../admin/functions.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Corp Travel - Menu</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" />
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="../css/materialize.min.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
              integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
        <link rel="shortcut icon" href="img/LogoV1.png">
    </head>

    <body class="grey lighten-4" oncontextmenu="return false;">
        <!-- Navbar -->
        <div class="navbar-fixed">
            <nav class="cyan darken-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                            <a href="../index.php" class="brand-logo"><img src="../img/title_corp_travel.png" width="40%"></a>
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="#welcome">Welcome To Corp Travel, <font color="#ff4500"><strong><?php echo $_SESSION['user']['username']; ?></strong></font></a>
                            </li>
                            <li>
                                <a href="../dashboard/bookings_summary.php">Bookings Summary</a>
                            </li>
                            <li>
                                <a href="../index.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Side Navigation: Mobile View -->
        <ul class="sidenav" id="mobile-nav">
            <li>
                <a href="#welcome">Welcome To Corp Travel, <font color="#ff4500"><strong><?php echo $_SESSION['user']['username']; ?></strong></font></a>
            </li>
            <li>
                <a href="../dashboard/bookings_summary.php">Bookings Summary</a>
            </li>
            <li>
                <a href="../index.php">Logout</a>
            </li>
        </ul>

        <!-- Card -->
        <div class="centerflipcards">
            <div class="square-flip">
                <div class="square" data-image="img/transportation-img.jpg">
                    <div class="square-container">
                        <h2 class="textshadow">Transportation</h2>
                        <h3 class="textshadow">
                            Click here for all your corporate transportation arragngements
                            needs.
                        </h3>
                    </div>
                    <div class="flip-overlay"></div>
                </div>
                <div class="square2">
                    <div class="square-container2">
                        <div class="align-center"></div>
                        <a href="../bookings/transport/transport.php" target="_blank" class="boxshadow kallyas-button">View
                            Transport</a>
                    </div>
                    <div class="flip-overlay"></div>
                </div>
            </div>
            <div class="square-flip">
                <div class="square" data-image="img/hotel.jpg">
                    <div class="square-container">
                        <h2 class="textshadow">Hotel</h2>
                        <h3 class="textshadow">
                            Click here to view our Hotel Partners and avaliable Bunglows for
                            your stay needs.
                        </h3>
                    </div>
                    <div class="flip-overlay"></div>
                </div>
                <div class="square2">
                    <div class="square-container2">
                        <div class="align-center"></div>
                        <a href="../bookings/hotel/hotel.php" target="_blank" class="boxshadow kallyas-button">View Hotels</a>
                    </div>
                    <div class="flip-overlay"></div>
                </div>
            </div>
            <div class="square-flip">
                <div class="square" data-image="img/flight-img.jpg">
                    <div class="square-container">
                        <h2 class="textshadow">Flight</h2>
                        <h3 class="textshadow">
                            Click here for all your corporate transportation arragngements
                            needs.
                        </h3>
                    </div>
                    <div class="flip-overlay"></div>
                </div>
                <div class="square2">
                    <div class="square-container2">
                        <div class="align-center"></div>
                        <a href="../bookings/flight/flight.php" target="_blank" class="boxshadow kallyas-button">View
                            Flights</a>
                    </div>
                    <div class="flip-overlay"></div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>
                All Rights Reserved
                <?php echo date("Y"); ?>
                &copy; Corp Travel Designed by Arul Sabareesh
            </p>
        </div>
        <br />
        <br />
        <br />

        <?php include '../chat.php' ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script>
            // Side Nav
            const sideNav = document.querySelector('.sidenav');
            M.Sidenav.init(sideNav, {});

            jQuery(document).ready(function($) {
                var countSquare = $('.square').length;

                //For each Square found add BG image
                for (i = 0; i < countSquare; i++) {
                    var firstImage = $('.square').eq([i]);
                    var secondImage = $('.square2').eq([i]);

                    var getImage = firstImage.attr('data-image');
                    var getImage2 = secondImage.attr('data-image');

                    firstImage.css('background-image', 'url(' + getImage + ')');
                    secondImage.css('background-image', 'url(' + getImage2 + ')');
                }
            });

            window.onload = function() {
                document.getElementById('button').onclick = function() {
                    document.getElementById('modal').style.display = 'none';
                };
            };
        </script>

        <!--Auto logout functionality-->
        <script>
            var IDLE_TIMEOUT = 10; //seconds
            var _idleSecondsCounter = 0;
            document.onclick = function() {
                _idleSecondsCounter = 0;
            };
            document.onmousemove = function() {
                _idleSecondsCounter = 0;
            };
            document.onkeypress = function() {
                _idleSecondsCounter = 0;
            };
            window.setInterval(CheckIdleTime, 10000);

            function CheckIdleTime() {
                _idleSecondsCounter++;
                var inactivity = document.getElementById("SecondsUntilExpire");
                if (inactivity)
                    inactivity.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
                if (_idleSecondsCounter >= IDLE_TIMEOUT) {
                    alert("Your session time have expired! Please login again.");
                    document.location.href = "../index.php";
                }
            }
        </script>
        <!--        js code ends here-->

        <!--        disable the Inspect element-->
<!--        <script>-->
<!--            document.onkeydown = function(e) {-->
<!--                if(event.keyCode == 123) {-->
<!--                    return false;-->
<!--                }-->
<!--                if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {-->
<!--                    return false;-->
<!--                }-->
<!--                if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {-->
<!--                    return false;-->
<!--                }-->
<!--                if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {-->
<!--                    return false;-->
<!--                }-->
<!--                if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {-->
<!--                    return false;-->
<!--                }-->
<!--            }-->
<!--        </script>-->
        <!--        js code ends here-->

        <!--Disable copy and paste -->
        <script type="text/JavaScript">
            //courtesy of BoogieJack.com
            function killCopy(e){
                return false
            }
            function reEnable(){
                return true
            }
            document.onselectstart=new Function ("return false")
            if (window.sidebar){
                document.onmousedown=killCopy
                document.onclick=reEnable
            }
        </script>
        <!--Javascript code ends here-->

    </body>

</html>