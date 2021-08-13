<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: login.php");
}

include "../control/db.php";

$status = "";

if (isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $password = $_POST['password'];
    $new_password = $_POST['current_password'];
    $table = "raiyan";

    $query = "SELECT password FROM $table WHERE username = '$username'";

    $db = new db();
    $conn = $db->OpenCon();

    $res = $conn->query($query)->fetch_array();

    if ($res['password'] == $password) {
        $query = "UPDATE $table SET password = '$new_password' WHERE username = '$username'";

        if ($conn->query($query)) {
            $status = "Successfully Updated";
        } else {
            $status = "Failed";
        }
    } else {
        $status = "Wrong Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Change Password</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">
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
     <p><?php if ($status) echo $status; ?></p>
     <form method="post">
     <p>Current Password</p>
    <div><input type="password" placeholder="password" name="password"></div>

     <p>New Password</p>
    <div><input onkeyup="validatePassword()" type="password" placeholder="password" name="current_password"> <span id="password_stat"></span></div>
     <div><button type="submit" name="update">Update Password</button></div>
 </form>
 </div>
 </div>
 </div>

<script src="../js/myJS.js"></script>
</body>

</html>