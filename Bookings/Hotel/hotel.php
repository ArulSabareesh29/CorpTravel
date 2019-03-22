<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'corpTravel');

// variable declaration
$username = "";
$email = "";
$errors = array();

include '../../admin/db-config.php';

$sql = "SELECT * FROM trans_hotel WHERE hotel_id = '" . $_SESSION['hotelId'] . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <link rel="stylesheet" href="css/hotel.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <title>Hotel Booking</title>
</head>

<body>
  <div class="navbar-fixed">
    <nav class="cyan darken-1">
      <div class="container">
        <div class="nav-wrapper">
          <a href="./../index.php" class="brand-logo">Corp Travel</a>
          <a href="./../index.php" data-target="mobile-nav" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
          <ul class="right hide-on-med-and-down">
            <li id="myaccount">
              <a href="viewhotel.php">View Bookings</a>
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
      <a href="#account">View Bookings</a>
    </li>
    <li>
      <a href="../../index.html">Sign Out</a>
    </li>
  </ul>

  <!-- <h3 class="center align">Transport Services</h3> -->

  <div class="row showcase">
    <div class="col s12 m10 offset-m1 center">
      <h2 class="white-text">Hotel Booking</h2>
      <h5 class="white-text">
        Any Type of Hospitality Needs for Employees could be booked here
      </h5>
      <!-- <p class="white-text">
Any Transport needs could be booked here
</p> -->
      <br /><br />
      <a href="#" class="btn btn-large light-blue white-text">Get Booking</a>
    </div>
  </div>

  <!-- Types of Hotel -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <img
                src="https://images.unsplash.com/photo-1515362778563-6a8d0e44bc0b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" />
            </div>
            <div class="card-content">
              <span class="card-title">Citrus</span>
              <h6>Type - Hotel</h6>
              <h6>Price (Est) - xx</h6>
              <h6>Rating</h6>
            </div>
            <div class="card-action">
              <a href="#modal1" class="waves-effect waves-light modal-trigger">Book Now</a>
            </div>
            <!-- Modal Content -->
            <div id="modal1" class="modal">
              <div class="modal-content">
                <h5>Citrus</h5>
                <p>
                  Citrus Leisure PLC is a public quoted company which entered
                  the leisure industry with a commitment to build and manage a
                  chain of distinctive hotels and resorts that are benchmarked
                  against the most coveted in the world. Citrus intends to
                  provide the most exceptional and memorable hospitality in
                  Sri Lanka by exceeding guest expectations and by creating a
                  travel experience like no other.
                </p>
                <br />
                <p>
                  By Requesting to book for Citrus you are agreeing with the
                  companies Hospitality Policy
                </p>
              </div>
              <div class="modal-footer">
                <a href="hotelform.php" class="modal-close waves-effect waves-green btn-flat">Agree & Request
                  Booking</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <img src="https://www.w3schools.com/w3images/room_double.jpg" />
            </div>
            <div class="card-content">
              <span class="card-title">The Kingsbury</span>
              <h6>Type - Hotel</h6>
              <h6>Price (Est) - xx</h6>
              <h6>Rating</h6>
            </div>
            <div class="card-action">
              <a href="#modal2" class="waves-effect waves-light modal-trigger">Book Now</a>
            </div>
            <!-- Modal Content -->
            <div id="modal2" class="modal">
              <div class="modal-content">
                <h5>The Kingsbury</h5>
                <p>
                  The Kingsbury is the crown jewel of the Leisure and Aviation
                  sector of Sri Lanka’s leading conglomerate, Hayley’s PLC and
                  was the first hotel to be reinstated as a five-star hotel in
                  Colombo in 2017. Since its launch in 2012, it has grown from
                  strength to strength gaining international acclaim including
                  Regional Winner Luxury Business Hotel in South West Asia
                  (2016) and Winner- Best Luxury Business Hotel in Sri Lanka
                  (2017) at The World Luxury Hotel Awards.
                </p>
                <br />
                <p>
                  By Requesting to book for Citrus you are agreeing with the
                  companies Hospitality Policy
                </p>
              </div>
              <div class="modal-footer">
                <a href="hotelform.php" class="modal-close waves-effect waves-green btn-flat">Request Booking</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <img src="https://www.w3schools.com/w3images/room_deluxe.jpg" />
            </div>
            <div class="card-content">
              <span class="card-title">Galadari</span>
              <h6><?php echo $row['hotel_id']; ?></h6>
              <h6>Price (Est) - xx</h6>
              <h6>Rating</h6>
            </div>
            <div class="card-action">
              <a href="#modal3" class="waves-effect waves-light modal-trigger">Book Now</a>
            </div>
            <!-- Modal Content -->
            <div id="modal3" class="modal">
              <div class="modal-content">
                <h4>Citrus</h4>
                <p>
                  he story of Galadari Hotel Colombo which opened its doors in
                  1984 is a splendid tale of continual improvement of product
                  and the highest standards of quality in hospitality. Having
                  embraced over 3 decades of expertise in hospitality our
                  vision and beliefs are firmly grounded in extending a true
                  personalized service to all our guests, laced with an
                  unforgettable luxury hotel experience.
                </p>
                <br />
                <p>
                  By Requesting to book for Citrus you are agreeing with the
                  companies Hospitality Policy
                </p>
              </div>
              <div class="modal-footer">
                <a href="hotelform.php" class="modal-close waves-effect waves-green btn-flat">Agree & Request
                  Booking</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <img
                src="https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" />
            </div>
            <div class="card-content">
              <span class="card-title">Nuwer Eliya</span>
              <h6>Type - Bunglow</h6>
              <h6>Rooms - 3</h6>
              <h6>Rating</h6>
            </div>
            <div class="card-action">
              <a href="#modal4" class="waves-effect waves-light modal-trigger">Book Now</a>
            </div>
            <!-- Modal Content -->
            <div id="modal4" class="modal">
              <div class="modal-content">
                <h4>Company Bunglow</h4>
                <p>
                  Unilever has a range of Bunglows all over the island which
                  provides a great oppurtunity for employees to travel for
                  business meetings or on personal trips on vacations
                </p>
                <br />
                <p>
                  By Requesting to book for Citrus you are agreeing with the
                  companies Hospitality Policy
                </p>
              </div>
              <div class="modal-footer">
                <a href="hotelform.php" class="modal-close waves-effect waves-green btn-flat">Agree & Request
                  Booking</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <img
                src="https://images.unsplash.com/photo-1480074568708-e7b720bb3f09?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1353&q=80" />
            </div>
            <div class="card-content">
              <span class="card-title">Bentota</span>
              <h6>Type - Bunglow</h6>
              <h6>Rooms - 2</h6>
              <h6>Rating</h6>
            </div>
            <div class="card-action">
              <a href="#modal4" class="waves-effect waves-light modal-trigger">Book Now</a>
            </div>
            <!-- Modal Content -->
            <div id="modal4" class="modal">
              <div class="modal-content">
                <h4>Company Bunglow</h4>
                <p>
                  Unilever has a range of Bunglows all over the island which
                  provides a great oppurtunity for employees to travel for
                  business meetings or on personal trips on vacations
                </p>
                <br />
                <p>
                  By Requesting to book for Citrus you are agreeing with the
                  companies Hospitality Policy
                </p>
              </div>
              <div class="modal-footer">
                <a href="hotelform.php" class="modal-close waves-effect waves-green btn-flat">Agree & Request
                  Booking</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m4 l4">
          <div class="card">
            <div class="card-image">
              <img
                src="https://images.unsplash.com/photo-1459535653751-d571815e906b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1349&q=80" />
            </div>
            <div class="card-content">
              <span class="card-title">Bunglow</span>
              <h6>Type - Bunglow</h6>
              <h6>Rooms - 3</h6>
              <h6>Rating</h6>
            </div>
            <div class="card-action">
              <a href="#modal6" class="waves-effect waves-light modal-trigger">Book Now</a>
            </div>
            <!-- Modal Content -->
            <div id="modal6" class="modal">
              <div class="modal-content">
                <h4>Company Bunglow</h4>
                <p>
                  Unilever has a range of Bunglows all over the island which
                  provides a great oppurtunity for employees to travel for
                  business meetings or on personal trips on vacations
                </p>
                <br />
                <p>
                  By Requesting to book for Citrus you are agreeing with the
                  companies Hospitality Policy
                </p>
              </div>
              <div class="modal-footer">
                <a href="hotelform.php" class="modal-close waves-effect waves-green btn-flat">Agree & Request
                  Booking</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- contact form -->
  <section class="section container scrollspy" id="contact">
    <div class="row">
      <div class="col s12 l5">
        <h2 class="blue-text text-darken-4">Contact Us</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum
          at lacus congue, suscipit elit nec, tincidunt orci.
        </p>
        <p>
          Mauris dolor augue, vulputate in pharetra ac, facilisis nec libero.
          Fusce condimentum gravida urna, vitae scelerisque erat ornare nec.
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
            <input id="name" type="text" class="validate" />
            <label for="name">Name</label>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">email</i>
            <input type="email" id="email" />
            <label for="email">Your Email</label>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">message</i>
            <textarea id="message" class="materialize-textarea" cols="20" rows="20"></textarea>
            <label for="message">Your Message</label>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">date_range</i>
            <input type="text" id="date" class="datepicker" />
            <label for="date">Choose a date you need me for...</label>
          </div>
          <div class="input-field center">
            <button class="light-blue btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <section>
    <footer class="section cyan darken-1 white-text center">
      <p class="flow-text">Corp Travel 2019 &copy; 2019</p>
    </footer>
  </section>

  <!-- Chatbot -->
  <?php include '../../chat.php'?>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
  // Side Nav
  const sideNav = document.querySelector('.sidenav');
  M.Sidenav.init(sideNav, {});

  $(document).ready(function() {
    $('.modal, .modal2, .modal3, .modal4, .modal5, .modal6').modal();
  });
  $('.datepicker').datepicker({
    disableWeekends: true,
    yearRange: 1
  });
  $(document).ready(function() {
    $('select').formSelect();
  });
  </script>
</body>

</html>