<?php
include_once "../admin/db-config.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Corp Travel - Dashboard</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/custom.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <style>
  .button {
    background-color: #4CAF50;
    /* Green */
    border: none;
    color: white;
    padding: 7px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px 0px;
    cursor: pointer;
  }

  .btn_red {
    background-color: #f44336;
  }

  /* Red */
  </style>
</head>

<body>
  <div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="adjust-nav">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Corp Travel - Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Logout</a></li>
          </ul>
        </div>

      </div>
    </div>

    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center user-image-back">
            <img src="assets/img/find_user.jpg" class="img-responsive" />

          </li>


          <li>
            <a href="index.php"><i class="fa fa-tachometer"></i>Back to Dashboard</a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page-wrapper">
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">
            <h2>User Information</h2>
          </div>
        </div>

        <hr />
        <table class="table table-striped table-bordered" style="width:100%">
          <thead>
            <th>User id</th>
            <th>Username</th>
            <th>Email</th>
            <th>DOB</th>
            <th>User type</th>
            <th></th>
          </thead>
          <tbody>
            <?php
include '../admin/db-config.php';
$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_type` NOT LIKE 'admin'");
while ($row = mysqli_fetch_array($query)) {
    ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['user_type']; ?></td>
              <td>
                <center>
                  <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="deletemsg()"><button
                      class="button btn_red">Delete</button></a>
                </center>
              </td>
            </tr>
            <?php
}
?>
          </tbody>
        </table>

      </div>

    </div>

  </div>
  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.metisMenu.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
  function deletemsg() {
    alert("Successfully Removed");
  }
  </script>
</body>

</html>