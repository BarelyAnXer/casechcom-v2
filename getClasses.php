<?php
include "config/connection.php";
if (isset($_POST["teacher_id"])) {
    $teacher_id = $_POST["teacher_id"];
    $result = mysqli_query($conn, "SELECT DISTINCT t.teacher_id, c.name, c.classes_id FROM teaches t JOIN classes c ON t.classes_id = c.classes_id WHERE t.teacher_id = '$teacher_id'");
    $classes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($classes as $classe) {
        echo "<option value='" . $classe['classes_id'] . "'>" . $classe['name'] . "</option>";
    }
}
?>