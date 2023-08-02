<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "onlinetutor";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);
if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
} else {
    echo "<script>alert('DB CONNECTED!')</script>";
}
?>
