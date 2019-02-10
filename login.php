<!-- <?php include 'nav.php'?> -->
<?php include 'admin/functions.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>Login for Corp Travel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>

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
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<!-- <p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p> -->
	</form>


</body>
</html>