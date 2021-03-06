<?php include 'admin/functions.php'?>

<!DOCTYPE html>
<html>

    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="css/materialize.min.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
              integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Captcha For Login -->
        <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
        <link rel="shortcut icon" href="img/LogoV1.png">
        <title>Login for Corp Travel</title>
    </head>

    <body class="grey lighten-4">
        <!-- Nav Bar -->
        <div class="navbar-fixed">
            <nav class="cyan darken-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo"><img src="img/title_corp_travel.png" width="40%"></a>
                        <a href="index.php" data-target="mobile-nav" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="mobile-nav">
            <li>
                <a href="index.php">Home</a>
            </li>
        </ul>

        <!-- Login Form -->
        <div class="container uForm">
            <div class="row">
                <div class="col s12 m6 l6 offset-l3">
                    <div class="card">
                        <div class="card-action cyan darken-1 white-text">
                            <h3 class="center">Login </h3>
                        </div>
                        <div class="card-content">
                            <form method="post" action="login.php">


                                <?php echo display_error(); ?>

                                <div class="input-group">
                                    <label>Username</label>
                                    <input type="text" name="username">
                                </div>
                                <div class="input-group">
                                    <label>Password</label>
                                    <input type="password" name="password">
                                </div>
                                <br>
                                <div class="input-group">
                                    <button type="submit" class="btn-large waves-effect waves-dark cyan darken-1" style="width:100%;"
                                            name="login_btn">Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'chat.php' ?>
        <!-- Compiled and minified JavaScript -->
        <script src="js/materialize.min.js"></script>
        <script>
            // Side Nav
            const sideNav = document.querySelector('.sidenav');
            M.Sidenav.init(sideNav, {});
        </script>
    </body>

</html>