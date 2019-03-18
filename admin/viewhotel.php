<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" href="../images/title.png">
  <title>Corp Travel</title>
  <style>
  #user_table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #user_table td,
  #user_table th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #user_table tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #user_table tr:hover {
    background-color: #ddd;
  }

  #user_table th {
    padding-top: 25px;
    padding-bottom: 20px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
  }

  /*Css code for apply buttons*/
  .button {
    background-color: #f44336;
    border: none;
    color: white;
    padding: 9px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
  </style>
</head>

<body>
  <input id="myInput" type="text" placeholder="Search..">
  <br><br>
  <br>
  <br>
  <br>
  <br>
  <div>
    <center>
      <h2><U></U></h2>
    </center>
    <table id="user_table" border="1">
      <thead>
        <th>Id </th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Contact Number</th>
        <th>Approver</th>
        <th>Requestor Name</th>
        <th>Requestor Phone No.</th>
        <th>Requestor Department</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>No. of Persons</th>
        <th>No. of Rooms</th>
        <th>Room Type</th>
        <th>Travel Description</th>
      </thead>
      <tbody id="myTable">
        <?php
include 'db-config.php';
$query = mysqli_query($conn, "select * from `trans_hotel`");
while ($row = mysqli_fetch_array($query)) {
    ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['employee_name']; ?></td>
          <td><?php echo $row['contact_no']; ?></td>
          <td><?php echo $row['line_mgr']; ?></td>
          <td><?php echo $row['req_first_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['req_contact_no']; ?></td>
          <td><?php echo $row['dept_name']; ?></td>
          <td><?php echo $row['check_in']; ?></td>
          <td><?php echo $row['check_out']; ?></td>
          <td><?php echo $row['no_people']; ?></td>
          <td><?php echo $row['no_rooms']; ?></td>
          <td><?php echo $row['room_type']; ?></td>
          <td><?php echo $row['description']; ?></td>
        </tr>
        <?php
}
?>
      </tbody>
    </table>
    <br>
    <a href="home.php"><button class="button" type="button">CLOSE</button></a>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
</body>

</html>