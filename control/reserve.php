<?php
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $table = "reservations";

        $name = $_SESSION['username'];
        $nog = $_POST['number_of_guest'];
        $time = $_POST['time'];
        $note = $_POST['note'];

        $db = new db();
        $conn = $db->OpenCon();
        $query = $conn->query("INSERT INTO $table (name, number_of_guest, time, note) VALUES ('$name', '$nog', '$time', '$note')");
        
        if($query)
        {
            echo "Success";
        }
        else
        {
            echo "Failed";
        }
    }
?>