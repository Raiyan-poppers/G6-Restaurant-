<?php
session_start();
include('../control/db.php');
include('../control/updatecheck.php');

if (empty($_SESSION["username"])) // Destroying All Sessions
{
  header("Location: login.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/reg.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
  <div class="header">
    <h1>G6 RESTURENT</h1>
  </div>
  <?php include "navbar.php" ?>

  <div class="container">
    <div class="card">
      <h2 class="card-header">Profile Page</h2>
      <div class="card-body">

        <?php

        if ($stat)
          echo "<div style='padding-bottom:8px'>" . $stat . "</div>";
        ?>

        <?php
        $connection = new db();
        $conobj = $connection->OpenCon();
        $userQuery = $connection->CheckUser($conobj, "raiyan", $_SESSION["username"], $_SESSION["password"]);

        if ($userQuery->num_rows > 0) {
          echo "<form action='' method='post'>";
          // output data of each row
          while ($row = $userQuery->fetch_assoc()) {
            echo "Name <br><input type='text' name='fname' value=" . $row["name"] . " > <br>";
            echo "Email <br> <input type='text' name='email' value=" . $row["email"] . " ><br>";
            echo "Address <br> <textarea name='address' >" . $row["address"] . "</textarea><br>";
            echo "Phone <br> <input type='text' name='phone' value=" . $row["phone"] . " ><br>";
            echo "Date of Birth <br> <input type='text' name='dateofbirth' value=" . $row["dateofbirth"] . " ><br>";
          }
          echo   "<input name='update' type='submit' value='Update'>";
        } else {
          echo "0 results";
        }
        ?>

        <a href="changepassword.php">Change Password</a>
      </div>
    </div>
  </div>

</body>

</html>