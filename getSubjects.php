<?php
include "config/connection.php";
//if (isset($_POST["teacher_id"])) {
$classes_id = $_POST["classes_id"];
$teacher_id = $_POST["teacher_id"];
$result = mysqli_query($conn, "SELECT subject.name, subject.subject_id FROM subject JOIN teaches ON subject.subject_id = teaches.subject_id WHERE teaches.classes_id = '$classes_id' AND teaches.teacher_id = '$teacher_id'");
$subjects = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($subjects as $subject) {
    echo "<option value='" . $subject['subject_id'] . "'>" . $subject['name'] . "</option>";
}
//}
?>