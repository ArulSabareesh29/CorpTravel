<?php
include 'admin/functions.php';

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
  <link rel="stylesheet" href="css/materialize.min.css" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <title>Navbar - Login</title>
</head>

<body>
  <div class="navbar-fixed">
    <nav class="cyan darken-1">
      <div class="container">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo">Corp Travel</a>
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
      <a href="#welcome">Hi, <?php echo $_SESSION['user']['username']; ?></a>
    </li>
    <li id="myaccount">
      <a href="#account">My Account</a>
    </li>
    <li>
      <a href="login.php">Login</a>
    </li>
  </ul>

  <script src="js/materialize.min.js"></script>
  <script>
  // Side Nav
  const sideNav = document.querySelector('.sidenav');
  M.Sidenav.init(sideNav, {});
  </script>
</body>

</html>