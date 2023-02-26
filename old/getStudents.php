<?php
include "config/connection.php";
//if (isset($_POST["teacher_id"])) {
$classes_id = $_POST["classes_id"];
$result = mysqli_query($conn, "SELECT * FROM user join student s on user.user_id = s.user_id where classes_id = '$classes_id'");
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo "<option value=''>---Select Student---</option>";
foreach ($students as $student) {
    echo "<option value='" . $student['student_id'] . "'>" . $student['firstname'] . "</option>";
}
//}
?>