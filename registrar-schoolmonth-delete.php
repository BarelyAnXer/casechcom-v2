<?php
include("./config/connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_sql = "DELETE FROM school_month WHERE school_month_id = '$id'";

    if (mysqli_query($conn, $delete_sql)) {
        header("Location: registrar-schoolmonth-list.php");
    } else {
        echo "Error: " . $delete_sql . "<br>" . $conn->error;
    }
}
?>
