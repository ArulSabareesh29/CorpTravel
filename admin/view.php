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

            #user_table td, #user_table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #user_table tr:nth-child(even){background-color: #f2f2f2;}

            #user_table tr:hover {background-color: #ddd;}

            #user_table th {
                padding-top: 25px;
                padding-bottom: 20px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }

            /*Css code for apply buttons*/
            .button {background-color: #f44336;
                border: none;
                color: white;
                padding: 9px 15px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;}
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
            <center><h2><U></U></h2></center>
            <table id="user_table" border="1">
                <thead>
                    <th>Booking Id</th>
                    <th>Passenger Name</th>
                    <th>Contact No</th>
                    <th>Line Manager</th>
                    <th>Journey Start</th>
                    <th>Journey End</th>
                </thead>
                <tbody id="myTable">
                    <?php
include 'db-config.php';
$query = mysqli_query($conn, "select * from `trans_data`");
while ($row = mysqli_fetch_array($query)) {
    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['passenger_name']; ?></td>
                        <td><?php echo $row['contact_no']; ?></td>
                        <td><?php echo $row['line_mgr']; ?></td>
                        <td><?php echo $row['journey_start']; ?></td>
                        <td><?php echo $row['journey_end']; ?></td>
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
            $(document).ready(function(){
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