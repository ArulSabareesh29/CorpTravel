<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'corpTravel'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (isset($_POST['submit_btn'])) {
    $query = "INSERT INTO trans_hotel (employee_name, contact_no, line_mgr, alt_line_mgr, req_first_name, req_last_name, email, req_contact_no, dept_name, cost_center, check_in, check_out, no_people, no_rooms, room_type, description) VALUES
		(
        '" . $_POST["employee_name"] . "',
        '" . $_POST["contact_no"] . "',
        '" . $_POST["line_mgr"] . "',
        '" . $_POST["alt_line_mgr"] . "',
        '" . $_POST["req_first_name"] . "',
        '" . $_POST["req_last_name"] . "',
        '" . $_POST["email"] . "',
        '" . $_POST["req_contact_no"] . "',
        '" . $_POST["dept_name"] . "',
        '" . $_POST["cost_center"] . "',
        '" . $_POST["check_in"] . "',
        '" . $_POST["check_out"] . "',
        '" . $_POST["no_people"] . "',
        '" . $_POST["no_rooms"] . "',
        '" . $_POST["room_type"] . "',
        '" . $_POST["description"] . "')";

    $result = mysqli_query($conn, $query);

    if (!empty($result)) {
        $error_message = "";
        $success_message = "Successfully Submitted!";
        unset($_POST);
    } else {
        $error_message = "Problem in occurred. Please Try Again!";
    }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <style>
  .container {
    padding-top: 50px;
  }
  </style>

  <title>Hotel Booking Form</title>
</head>

<body>
  <!-- Hotel Form -->
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
            <h4 class="center">Hotel Booking Form</h4>
            <form method="post" action="<?php $_PHP_SELF?>">
              <?php
if (isset($success_message)) {echo "<div>" . $success_message . "</div>";}
?>
              <h5>Visitor Details</h5>
              <hr />
              <div class="row addUser">
                <div class="input-field col s6 m6 l6">
                  <i class="material-icons prefix">person_pin</i>
                  <input placeholder="John" id="first_name" type="text" class="validate" name="employee_name"
                    required />
                  <label for="visitor_name">Employee First Name</label>
                </div>
                <div class="input-field col s6 m6 l6">
                  <i class="material-icons prefix">person_pin</i>
                  <input placeholder="Doe" id="last_name" type="text" class="validate" name="last_name" required />
                  <label for="last_name">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">mail</i>
                  <input placeholder="JohnDoe@example.com" id="email" type="email" class="validate" name="email"
                    required />

                  <label for="email">Email</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">phone</i>
                  <input type="number" id="number" placeholder="Enter Phone No..." class="validate" name="contact_no"
                    required />
                  <label for="number">Contact Number</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">person_pin</i>
                  <select id="line_mgr" name="line_mgr" required>
                    <option value="" disabled selected>Choose your Approver</option>
                    <option value="John Doe">John Doe</option>
                    <option value="Michael Marsh">Michael Marsh</option>
                    <option value="Rick Grimes">Rick Grimes</option>
                  </select>
                  <label>Line Manager</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">supervisor_account</i>
                  <select id="alt_line_mgr" name="alt_line_mgr" required>
                    <option value="" disabled selected>Choose your Alternate Approver
                    </option>
                    <option value="John Doe">John Doe</option>
                    <option value="Michael Marsh">Michael Marsh</option>
                    <option value="Rick Grimes">Rick Grimes</option>
                  </select>
                  <label>Alternate Line Manager</label>
                </div>
              </div>
              <h5>Requestor Details</h5>
              <hr />
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">person_pin</i>
                  <input placeholder="John" id="first_name" type="text" class="validate" name="req_first_name"
                    required />
                  <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">person_pin</i>
                  <input placeholder="Doe" id="last_name" type="text" class="validate" name="req_last_name" required />
                  <label for="last_name">Last Name</label>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">mail</i>
                    <input placeholder="JohnDoe@example.com" id="email" type="email" class="validate" name="email"
                      required />
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input type="number" id="number" placeholder="Enter Phone No..." class="validate"
                      name="req_contact_no" required />
                    <label for="number">Contact Number</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <select id="dept_name" name="dept_name" required>
                      <option value="" disabled selected>Select your Department</option>
                      <option value="Finance">Finance</option>
                      <option value="Human Resources">Human Resourses</option>
                      <option value="Supply Chain">Supply Chain</option>
                      <option value="Marketing">Marketing</option>
                    </select>
                    <label>Department Name</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <select id="cost_center" name="cost_center" required>
                      <option value="" disabled selected>Select your CRG</option>
                      <option value="250">250</option>
                      <option value="269">269</option>
                      <option value="200">200</option>
                    </select>
                    <label>Cost Center</label>
                  </div>
                </div>
                <h5>Room Details</h5>
                <hr />
                <div class="row">
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">hotel</i>
                    <input type="date" id="date" name="check_in" class="datepicker" required />
                    <label for="employee_name">Arrival</label>
                  </div>
                  <div class="input-field col s6 m6">
                    <i class="material-icons prefix">hotel</i>
                    <input type="date" id="date" name="check_out" class="datepicker" required />
                    <label for="employee_name">Departure</label>
                  </div>
                  <div class="input-field col s12 m6 l4">
                    <select id="no_people" name="no_people" required>
                      <option value="" disabled selected>No of Persons</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                    <label>Persons</label>
                  </div>
                  <div class="input-field col s12 m6 l4">
                    <select id="no_rooms" name="no_rooms" required>
                      <option value="" disabled selected>No of Rooms</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                    <label>Rooms</label>
                  </div>
                  <div class="input-field col s12 m6 l4">
                    <select id="room_type" name="room_type" required>
                      <option value="" disabled selected>Type</option>
                      <option value="Single Room">Single Room</option>
                      <option value="Double Room">Double Room</option>
                      <option value="Deluxe Room">Deluxe Room</option>
                    </select>
                    <label>Room Type</label>
                  </div>
                  <div class="input-field col s12 m12 l12">
                    <textarea placeholder="Description" id="textarea1" class="materialize-textarea" data-length="120"
                      name="description" required></textarea>
                    <label for="textarea1">Travel Description</label>
                  </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="submit_btn">Submit
                  <i class="material-icons right">check</i>
                </button>
                <button class="btn waves-effect waves-light" type="rest" name="submit_btn">Reset
                  <i class="material-icons right">clear</i>
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
  //            $('.datepicker').datepicker({
  //                disableWeekends: true,
  //                yearRange: 1
  //            });
  //            $(document).ready(function() {
  //                $('.timepicker').timepicker();
  //            });

  $(document).ready(function() {
    $('select').formSelect();
  });
  $(document).ready(function() {
    $('textarea#textarea1').characterCounter();
  });

  // //Add User Code
  // $(document).ready(function() {
  //     var maxField = 10; //Input fields increment limitation
  //     var addButton = $('.add_button'); //Add button selector
  //     var wrapper = $('.addUser'); //Input field wrapper
  //     var fieldHTML =
  //         '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="btn-floating blue pulse prefix remove_button"><i class="material-icons">add</i>'; //New input field html
  //     var x = 1; //Initial field counter is 1

  //     //Once add button is clicked
  //     $(addButton).click(function() {
  //         //Check maximum number of input fields
  //         if (x < maxField) {
  //             x++; //Increment field counter
  //             $(wrapper).append(fieldHTML); //Add field html
  //         }
  //     });

  //     //Once remove button is clicked
  //     $(wrapper).on('click', '.remove_button', function(e) {
  //         e.preventDefault();
  //         $(this)
  //             .parent('div')
  //             .remove(); //Remove field html
  //         x--; //Decrement field counter
  //     });
  // });
  </script>
</body>

</html>