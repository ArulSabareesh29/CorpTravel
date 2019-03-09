<?php include 'admin/functions.php'?>
<!DOCTYPE html>
<html>
<head>
<!--Import Google Icon Font-->
<link
    href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet"
		/>
 <!-- Compiled and minified CSS -->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
		/>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Captcha For Login -->
<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
<title>Login for Corp Travel</title>
</head>
<body>
	<!-- Nav Bar -->
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
                <a href="index.html">Home</a>
              </li>
              <li>
                <a href="login.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <ul class="sidenav" id="mobile-nav">
      <li>
        <a href="#home">Home</a>
      </li>
      <li>
        <a href="#popular">Popular Places</a>
      </li>
      <li>
        <a href="#gallery">Gallery</a>
      </li>
      <li>
        <a href="#contact">Contact</a>
      </li>
      <li>
        <a href="login.php">Login</a>
      </li>
		</ul>

	<!-- Login Form -->
<div class="container uForm">
	<div class="row">
		<div class="col s12 m6 l6 offset-l3">
			<div class="card">
				<div class="card-action cyan darken-1 white-text">
					<h3 class="center">Login Form</h3>
				</div>
				<div class="card-content">
					<form method="post" action="login.php">

						<?php include 'errors.php';?>

						<div class="input-group">
						<label>Username</label>
						<input type="text" name="username" >
						</div>
						<div class="input-group">
						<label>Password</label>
						<input type="password" name="password">
						</div>
						<div class="form-field">
						<label>Remember Me</label>
						<input type="checkbox" name="rememberme">
						</div><br>
						<div class="input-group">
						<button type="submit" class="btn-large waves-effect waves-dark cyan darken-1" style="width:100%;" name="login_user">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>