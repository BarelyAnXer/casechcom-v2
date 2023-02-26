<?php
include "./config/connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: teacher-view.php");
}