<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/reservation.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
  <div class="header">
    <h1>G6 RESTURENT</h1>
  </div>
  <?php include("navbar.php") ?>

  <?php

  include "../control/db.php";

  $name = $guest = $time = $date = $note = $status = "";
  $nameError = $guestError = $timeError = $dateError = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $guest = $_POST["guest"];
    $time = $_POST["time"];
    $date = $_POST["date"];
    $note = $_POST["note"];
    $table = "reservations";

    $db = new db();
    $conn = $db->OpenCon();
    $query = $conn->query("INSERT INTO $table (name, number_of_guest, time, note) VALUES ('$name', '$guest', '$time', '$note')");

    if ($query) {
      $status = "Successfully Reserved";
    } else $status = "Failed to Reserve";

    if (empty($name)) {
      $nameError = "Please enter your this field";
    }

    if (empty($guest)) {
      $guestError = "Please enter your this field";
    }

    if (empty($time)) {
      $time = "Please enter your this field";
    }

    if (empty($date)) {
      $dateError = "Please enter your this field";
    }

    // $target_dir = "files/";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //   echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    // } else {
    //   echo "Sorry, there was an error uploading your file.";
    // }
  }


  ?>

  <div class="container">
 <div class="card">
   <h2 class="card-header">Reservation Form </h2>
  <div class="card-body">

    <p><?php if ($status) echo $status; ?></p>

    <form id="reserve_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>""   enctype=" multipart/form-data"> <table style="width:2%">
      <tr>
    <td> Name:</td>
    <td> <input type="text" name="name" required></td>
    <td> <?php echo $nameError; ?></td>

     </tr>
   <td>number of guest:</td>
   <td><input type="number" name="guest" required>
     <td></td><?php echo $guestError; ?></td>
      <tr>
     <td>time:</td>
   <td> <input type="text" name="time" required></td>
      <td><?php echo $timeError; ?></td>
   </tr>

     <tr>
      <td>date:</td>
      <td><input type="date" name="date" required></td>
     <td><?php echo $dateError; ?></td>
      </tr>


   <td>Note:</td>
     <td> <textarea name="note" rows="5" cols="40"></textarea></td>
     </tr>
  </table>

    <input type="submit" name="submit" value="Submit">
    </form>
    </div>
    </div>

    <div class="card">
    <div class="card-body">
   <?php
   if($name){
     echo "<h3>Your Reservation deatils:</h3>";

     echo $name;
     echo "<br>";
     echo $guest;
     echo "<br>";
     echo $time;
     echo "<br>";
     echo $date;
     echo "<br>";
     echo $note;
     echo "<br>";
      }
    ?>
   </div>
 </div>
</body>

</html>