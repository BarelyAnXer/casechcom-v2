<?php
include "./config/connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
    $parent = dirname($_SERVER['REQUEST_URI']);
    header("Location: student-view.php");
}
