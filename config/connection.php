<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "casechcom");
$test = "connection failed";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
mysqli_report(MYSQLI_REPORT_STRICT);
?>
