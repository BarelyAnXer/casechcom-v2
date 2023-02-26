<?php
include "./config/connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM teaches WHERE teaches_id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: teaches-add.php");
}