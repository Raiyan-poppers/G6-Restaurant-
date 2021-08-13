<?php

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION["username"])) {
    header("Location: login.php"); 
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
    <div class="header">
        <h1>G6 RESTURENT</h1>
    </div>
    <?php include 'navbar.php' ?>

    <div class="container">
  <div class="card">
<div class="card-body">
     <p>Welcome back <?php echo $_SESSION["username"]; ?></p>
 <div class= "homebutton">
    <a href="myprofile.php"><button>Update Profile</button></a>
     <a href="reservationpagetwo.php"><button>Reservation</button></a>
     <a href="takeawaypagethree.php"><button>Takeaway</button></a>
 </div>
</div>
 </div>
</div>
</body>
</html>