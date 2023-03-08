<?php
$servername = "localhost";
$username = "root";
$password = "";

//$conn = new mysqli($servername, $username, $password, "casechcom");
$conn = new mysqli("db-mysql-nyc1-88285-do-user-11001674-0.b.db.ondigitalocean.com", "doadmin", "AVNS_xXhyoXDeR8Pltbg4pYf", "casechcom", 25060);
$test = "connection failed";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//mysqli_report(MYSQLI_REPORT_STRICT);
?>
