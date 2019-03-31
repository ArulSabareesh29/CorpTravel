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
  <style>
  #modal {
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 99999;
    height: 100%;
    width: 100%;
  }

  .modalconent {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    width: 80%;
    padding: 20px;
  }
  </style>
</head>

<body class="grey lighten-4">


  <div id="modal">
    <div class="modalconent">
      <div class="row">
        <div class="col s12 m10 offset-m1 center">
          <h4>Welcome to Corp Travel <font color="red"><?php echo $_SESSION['user']['username']; ?> </font>
          </h4>
          <button id="button" class="btn waves-effect waves-light">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="cyan darken-1">
      <div class="container">
        <div class="nav-wrapper">
          <a href="../index.php" class="brand-logo">Corp Travel</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger">
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
  <!-- Side Navigation: Mobile View -->
  <ul class="sidenav" id="mobile-nav">
    <li>
      <a href="#welcome">Hi, <?php echo $_SESSION['user']['username']; ?></a>
    </li>
    <li>
      <a href="#account">View Bookings</a>
    </li>
    <li>
      <a href="../../index.html">Sign Out</a>
    </li>
  </ul>

  <!-- Card -->
  <div class="centerflipcards">
    <div class="square-flip">
      <div class="square" data-image="images/transportation-img.jpg">
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
      <div class="square" data-image="images/hotel.jpg">
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
      <div class="square" data-image="images/flight-img.jpg">
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
</body>

</html>