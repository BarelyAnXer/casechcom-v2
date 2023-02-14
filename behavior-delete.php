<?php
include "./config/connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM behavior WHERE behavior_id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: behaviour-view.php");
}