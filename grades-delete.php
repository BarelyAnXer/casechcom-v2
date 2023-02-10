<?php
include "./config/connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM grade WHERE grade_id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
    $parent = dirname($_SERVER['REQUEST_URI']);
    header("Location: grades-view.php");
}
