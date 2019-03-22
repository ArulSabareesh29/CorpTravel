<?php
include '../../nav.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <link rel="stylesheet" href="css/flight.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <title>Flight Booking</title>
</head>

<body>
  <section class="showcase">
    <div class="row">
      <div class="col s12 m10 offset-m1 center">
        <h2 class="white-text">Transport Booking</h2>
        <h5 class="white-text">
          Any Type of Road Transport needs could be booked here
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

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>