<?php

$error = "";
$stat = "";

if (isset($_POST['update'])) {
    if (empty($_POST['fname']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['dateofbirth'])) {
        $error = "input given is invalid";
    } else {
        $connection = new db();
        $conobj = $connection->OpenCon();

        $userQuery = $connection->UpdateUser($conobj, "raiyan", $_SESSION["username"], $_POST['fname'], $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['dateofbirth']);

        $connection->CloseCon($conobj);

        $stat = $userQuery;
    }
}
