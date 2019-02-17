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
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        <br>
        <br>
        <br>
        <br>
        <div>
            <center><h2><U>ACTIVE USERS</U></h2></center>
            <table id="user_table" border="1">
                <thead>
                    <th>User id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
include 'db-config.php';
$query = mysqli_query($conn, "select * from `user`");
while ($row = mysqli_fetch_array($query)) {
    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['user_type']; ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
}
?>
                </tbody>
            </table>
            <br>
            <a href="home.php"><button class="button" type="button">CLOSE</button></a>
        </div>
        <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("user_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
    </body>
</html>