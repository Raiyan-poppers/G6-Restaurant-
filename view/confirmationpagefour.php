<?php
session_start();
if (empty($_SESSION["username"])) // Destroying All Sessions
{
    header("Location: login.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/confirmation.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
    <div class="header">
        <h1>G6 RESTURENT</h1>
    </div>

    <?php include("navbar.php") ?>

    <div class="container">
        <div class="card">

  <h2 class="card-header">Order Confirmation</h2>
   <div class="card-body">
                Dear <?php echo $_SESSION["username"]; ?>, thank you for your order. Your order placed successfully
     </div>
    </div>
    </div>

</body>

</html>