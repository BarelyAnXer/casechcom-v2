<?php
$servername = "db-mysql-nyc1-87489-do-user-11001674-0.b.db.ondigitalocean.com";
$username = "doadmin";
$password = "AVNS_huhBVbCSNYmR1L";

// Create connection
$conn = new mysqli($servername, $username, $password, "casechcom");
$test = "connection failed";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//mysqli_report(MYSQLI_REPORT_STRICT);
?>
