<?php
include('db.php');

$connection = new db();
$conn = $connection->OpenCon();

$query = "SELECT * FROM menu";
$result = $conn->query($query)->fetch_all();

echo json_encode($result);