<?php
include_once 'flightBooking_connection.php';
?>

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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="../../css/materialize.min.css" />
        <link rel="stylesheet" href="css/flight.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
              integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
        <link rel="shortcut icon" href="./../../img/LogoV1.png">
        <title>Flight Booking</title>
    </head>

    <body>

        <div class="navbar-fixed">
            <nav class="cyan darken-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="../../menu/menu.php" class="brand-logo">Corp Travel</a>
                        <a href="../../menu/menu.php" data-target="mobile-nav" class="sidenav-trigger">
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
                                <a href="../../index.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Showcase -->
        <section class="showcase">
            <div class="row">
                <div class="col s12 m10 offset-m1 center">
                    <h2 class="white-text">Flight Booking</h2>
                    <h5 class="white-text">
                        Any Type of Flight tickets could be booked here
                    </h5>
                    <!-- <p class="white-text">
Any Transport needs could be booked here
</p> -->
                    <br /><br />
                    <a href="flightBooking.php" class="btn btn-large light-blue white-text">Get Booking</a>
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
                                   placeholder="Search Destinations Here" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Flight Details Search -->
        <section class="card">
            <div class="row">
                <div class="card-content">
                    <form class="container">
                        <h4>Flight Booking Form</h4>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">local_airport</i>
                                <input
                                       id="from"
                                       type="text"
                                       name="from" 
                                       class="validate"
                                       />
                                <label for="From">From</label>
                                <div id="fromList"></div>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">local_airport</i>
                                <input name="to" id="to" type="text" class="validate" />
                                <label for="To">To</label>
                                <div id="toList"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">calendar_today</i>
                                <input type="date" name="departureDate" id="departureDate" class="validate" />
                                <label for="Departure">Departure</label>
                                <div id="departureDateList"></div>
                                <span class="helper-text" data-error="Enter Valid E-mail"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">calendar_today</i>
                                <input type="date" name="arrivalDate" id="arrivalDate" class="validate" />
                                <label for="number">Arrival</label>
                                <div id="arrivalDateList"></div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">card_travel</i>
                                    <select name="class" id="class" required>
                                        <option value="economy">Economy</option>
                                        <option value="business">Business</option>
                                        <option value="luxury">Luxury</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </section>

            <?php include '../../chat.php'?>


            <!-- <section>
<h1>My First Google Map</h1>
<div id="map" style="width:50%;height:200px;"></div>
</section> -->
            <!-- Compiled and minified JavaScript -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="../../js/materialize.min.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZf_J6NsuyTn4abnSc7mw6yJbE_y_f39s&callback=myMap">
            </script>
            <script>
                function myMap() {
                    var map = new google.maps.Map(
                        document.getElementById('map'),
                        mapOptions
                    );
                    var myCenter = new google.maps.LatLng(6.9271, 79.8612);
                    var mapCanvas = document.getElementById('map');
                    var mapOptions = {
                        center: myCenter,
                        zoom: 10
                    };
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                    var marker = new google.maps.Marker({
                        position: myCenter
                    });
                    marker.setMap(map);
                }

                $(document).ready(function() {
                    $('select').formSelect();
                });
            </script>
            <script>

                $(document).ready(function () {
                    $('#from').keyup(function () {
                        let fromQuery = $(this).val();
                        if(fromQuery !== '') {
                            $.ajax({
                                url:"flightBooking_connection.php",
                                method:"POST",
                                data:{fromQuery:fromQuery},
                                success:function (data) {
                                    $('#fromList').fadeIn();
                                    $('#fromList').html(data);
                                }
                            })
                        }else {
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
                        if(toQuery !== '') {
                            $.ajax({
                                url:"flightBooking_connection.php",
                                method:"POST",
                                data:{toQuery:toQuery},
                                success:function (data) {
                                    $('#toList').fadeIn();
                                    $('#toList').html(data);
                                }
                            })
                        }else {
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
                        let departureDate = reorderD[2]+'/'+reorderD[1]+'/'+reorderD[0];
                        let pullADate = $("#arrivalDate").val();
                        let reorderA = pullADate.split("-");
                        let arrivalDate = reorderA[2]+'/'+reorderA[1]+'/'+reorderA[0];
                        /*let arrivalDate = $("#arrivalDate").val();*/
                        let classVal = $("#class").val();

                        e.preventDefault();

                        $.ajax({
                            url: 'flightBooking_connection.php',
                            method:"POST",
                            data: /*$('form').serialize()*/ {from:from, to:to, departureDate:departureDate, arrivalDate:arrivalDate, classVal:classVal},
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
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('select');
                    var instances = M.FormSelect.init(elems, options);
                });

                // Or with jQuery

                $(document).ready(function(){
                    $('select').formSelect();
                });
            </script>

            </body>

        </html>