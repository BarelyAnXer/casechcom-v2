<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "casechcom");
$test = "connection failed";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
mysqli_report(MYSQLI_REPORT_STRICT);
//echo "</br>";
?>

<!--select all classes that teacher teaches using user_id-->
