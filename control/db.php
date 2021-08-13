<?php
class db
{
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "project";
        // Create connection
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db); //MySQLi connection object
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function Query($sql)
    {
        $conn = $this->OpenCon();
        $res = $conn->query($sql);
        return $res;
    }

    function CheckUser($conn, $table, $username, $password)
    {
        $result = $conn->query("SELECT * FROM " . $table . " WHERE username='" . $username . "' AND password='" . $password . "'");
        return $result;
    }

    function ShowAll($conn, $table)
    {
        $result = $conn->query("SELECT * FROM  $table");
        return $result;
    }

    function UpdateUser($conn, $table, $username, $name, $email, $address, $phone, $dateofbirth)
    {
        $sql = "UPDATE $table SET name='$name', email='$email',address='$address',phone='$phone',dateofbirth='$dateofbirth' WHERE username='$username'";

        if ($conn->query($sql) === TRUE) {
            $result = "Record updated successfully";
        } else {
            $result = "Error updating record: ";
        }
        return $result;
    }

    function CloseCon($conn)
    {
        $conn->close();
    }
}
?>