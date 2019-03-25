<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="css/materialize.min.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CorpTravel</title>
</head>

<body id="home" class="scrollspy">
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
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="#popular">Popular Places</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
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
      <a href="#contact">Contact</a>
    </li>
    <li>
      <a href="login.php">Login</a>
    </li>
  </ul>

  <!-- Section Slider -->
  <section class="slider">
    <ul class="slides">
      <li>
        <img src="https://amadeus.com/images/en/air-transportation/airports/airport-terminal-aircrafts-at-dusk.jpg" />
        <!-- random image -->
        <div class="caption center-align">
          <h3>Book Your Travel!</h3>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore
            fugit quis temporibus quisquam iusto quidem fugiat alias in nulla
            sunt.
          </h5>
        </div>
      </li>
      <li>
        <img
          src="https://images.unsplash.com/photo-1469286663112-f58a16c6f075?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=701&q=80" />
        <!-- random image -->
        <div class="caption left-align">
          <h3>We Work with all Budgets</h3>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto
            laborum illum quibusdam magni officia repudiandae in reprehenderit
            necessitatibus voluptatem eum?
          </h5>
        </div>
      </li>
      <li>
        <img
          src="https://images.unsplash.com/photo-1497290788934-80266e135a5e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" />
        <!-- random image -->
        <div class="caption right-align">
          <h3>Group & Individual Getaways</h3>
          <h5 class="light grey-text text-lighten-3">
            Here's our small slogan.
          </h5>
        </div>
      </li>
    </ul>
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

  <!-- Section: Popular Places -->
  <section id="popular" class="section section-popular scrollspy">
    <div class="container">
      <h4 class="center">Company Sites</h4>
      <div class="row">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img
                src="https://images.unsplash.com/photo-1479837524808-8bfbd8b0ce8d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                alt="" />
              <span class="card-title">Bangalore,India</span>
            </div>
            <div class="card-content">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo,
              temporibus vitae quod cupiditate accusamus adipisci.
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img
                src="https://images.unsplash.com/photo-1522570939475-2f2f9cd2a7a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
                alt="" />
              <span class="card-title">Nuwer Eliya,Sri Lanka</span>
            </div>
            <div class="card-content">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo,
              temporibus vitae quod cupiditate accusamus adipisci.
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="img/resort3.jpg" alt="" />
              <span class="card-title">Cancun,Mexico</span>
            </div>
            <div class="card-content">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo,
              temporibus vitae quod cupiditate accusamus adipisci.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Icon Boxes -->
  <section class="section section-icons grey lighten-4 center">
    <div class="container">
      <h4>Bookings</h4>
      <div class="row">
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large cyan-text">room</i>
            <h4>Transportation</h4>
            <p>
              Click here for all your corporate transportation aarangement
              needs.
            </p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large cyan-text">store</i>
            <h4>Hotel</h4>
            <p>
              Click here to view our Hotel partners and available Bunglows for
              your stay needs.
            </p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel">
            <i class="material-icons large cyan-text">airplanemode_active</i>
            <h4>Flight</h4>
            <p>
              Click here for all your corporate travel arangement needs.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Contact -->
  <section id="contact" class="section section-contact scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="card-panel cyan white-text center">
            <i class="material-icons">email</i>
            <h5>Contact Us For Booking</h5>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor
              mollitia accusantium necessitatibus vel delectus ea quod commodi
              libero nobis maxime.
            </p>
          </div>
          <ul class="collection with-header">
            <li class="collection-header">
              <h4>Location</h4>
            </li>
            <li class="collection-item">Corp Travel</li>
            <li class="collection-item">555 Beach Rd, Suite</li>
            <li class="collection-item">Miami, Florida 555</li>
          </ul>
        </div>
        <div class="col s12 m6">
          <!-- <iframe allow="microphone;" width="350" height="430"
            src="https://console.dialogflow.com/api-client/demo/embedded/c2cc24f2-95a6-4746-a1ad-aa0e724c2cb8">
          </iframe> -->
          <!-- <div class="card-panel grey lighten-3">
              <h5>Please Fill out this form</h5>
              <div class="input-field">
                <input type="text" placeholder="Name" />
              </div>
              <div class="input-field">
                <input type="text" placeholder="Email" />
              </div>
              <div class="input-field">
                <input type="text" placeholder="Phone" />
              </div>
              <div class="input-field">
                <textarea
                  class="materialize-textarea"
                  placeholder="Message"
                ></textarea>
              </div>
              <input type="submit" class="cyan darken-1 btn" />
            </div> -->
        </div>
      </div>
    </div>
  </section>

  <!-- Section : Footer -->
  <footer class="section cyan darken-1 white-text center">
    <p class="flow-text">Corp Travel 2019 &copy; Designed by Arul Sabareesh</p>
  </footer>

  <?php include 'chat.php'?>

  <!-- Compiled and minified JavaScript -->
  <script src="js/materialize.min.js"></script>
  <script>
  // Side Nav
  const sideNav = document.querySelector('.sidenav');
  M.Sidenav.init(sideNav, {});

  //Slider
  const slider = document.querySelector('.slider');
  M.Slider.init(slider, {
    indicators: false,
    height: 500,
    transition: 500,
    interval: 6000
  });

  // Autocomplete
  const ac = document.querySelector('.autocomplete');
  M.Autocomplete.init(ac, {
    data: {
      India: null,
      'Cancun Mexico': null,
      Bangalore: null,
      'Nuwer Eliya': null,
      Colombo: null,
      Horana: null,
      Agarapathana: null
    }
  });

  //Material Boxed
  const mb = document.querySelectorAll('.materialboxed');
  M.Materialbox.init(mb, {});

  //ScrollSpy
  const ss = document.querySelectorAll('.scrollspy');
  M.ScrollSpy.init(ss, {});
  </script>
</body>

</html>