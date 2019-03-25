<?php
include_once "../../admin/db-config.php";

include '../../admin/functions.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="../../css/materialize.min.css" />
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
          <a href="../../menu/menu.php" class="brand-logo">Corp Travel</a>
          <a href="../../menu/menu.php" data-target="mobile-nav" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
          <ul class="right hide-on-med-and-down">
            <li>
              <a href="#welcome">Hi, <?php echo $_SESSION['user']['username']; ?></a>

            </li>
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
              <img src="<?php echo $row['image_path']; ?>" />
            </div>


            <div class="card-content">
              <span class="card-title"><?php echo $row['hotel_name']; ?></span>
              <h6>Type - <?php echo $row['hotel_type']; ?></h6>
              <h6>Price (Est) - xx</h6>
              <h6>Rating</h6>
            </div>
            <div class="card-action">
              <a href="#modal1" class="waves-effect waves-light modal-trigger">Book Now</a>
            </div>
          </div>
        </div>

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
        <?php
}
//echo "Fetched data successfully\n";
mysqli_close($conn);
?>
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
  <script src="../../js/materialize.min.js"></script>
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