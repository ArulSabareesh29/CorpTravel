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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="../../css/materialize.min.css" />
  <link rel="stylesheet" href="css/flight.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
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
            <li>
              <a href="../index.php">Logout</a>
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
        <a href="flightBooking.html" class="btn btn-large light-blue white-text">Get Booking</a>
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
          <div class="row">
            <div class="input-field col m6">
              <i class="material-icons prefix">local_airport</i>
              <input id="flying_from" type="text" class="validate" placeholder="City or Airport">
              <label for="flying_from">Flying From</label>
            </div>
            <div class="input-field col m6">
              <i class="material-icons prefix">local_airport</i>
              <input id="flying_to" type="text" class="validate" placeholder="City or Airport">
              <label for="flying_to">Flying To</label>
            </div>
            <div class="row">
              <div class="input-field col m6 l3">
                <i class="material-icons prefix">calendar_today</i>
                <input id="departing" type="date" class="validate">
                <label for="departing">Departing</label>
              </div>

              <div class="input-field col m6 l3">
                <i class="material-icons prefix">calendar_today</i>
                <input id="flying_to" type="date" class="validate">
                <label for="flying_to">Returning</label>
              </div>
              <div class="input-field col m6 l6">
                <i class="material-icons prefix">card_travel</i>
                <select>
                  <option value="" disabled selected>Flight Type</option>
                  <option value="First Class">First Class</option>
                  <option value="Business Class">Business Class</option>
                  <option value="Economy Class">Economy Class</option>
                </select>
                <label>Flight Type</label>
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

</body>

</html>