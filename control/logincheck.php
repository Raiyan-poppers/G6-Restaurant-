<?php

include('db.php');
session_start();

$error = ""; // store session data

if (isset($_POST['submit']))
{
  if (empty($_POST['username']) || empty($_POST['password']))
  {
    $error = "Please fill up all information correctly";
  }
  else
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new db();
    $connobj = $conn->OpenCon();
    $userQuery = $conn->CheckUser($connobj, "raiyan", $username, $password);

    if ($userQuery->num_rows > 0) {
      $_SESSION["username"] = $username;
      $_SESSION["password"] = $password;
    } else {
      $error = "Username or Password is invalid";
    }
  }
}

?>