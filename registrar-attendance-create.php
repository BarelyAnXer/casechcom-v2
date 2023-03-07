<?php
include("./config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attendance_date = $_POST['attendance_date'];
    foreach ($_POST["attendance"] as $id => $attendance) {
        if (!empty($attendance["status"])) {
            $status = $attendance["status"];
            $remarks = mysqli_real_escape_string($conn, $attendance["remarks"]);
            $sql = "INSERT INTO attendance (attendance_student_id, attendance_school_year_id, attendance_date, attendance_remarks, attendance_status) VALUES ('$id', '1', '$attendance_date', '$remarks', '$status');";
            mysqli_query($conn, $sql);
        }
    }
    echo "<p>Attendance records saved successfully!</p>";
}
?>



<?php include "registrar-navbar.php" ?>

<html>
<head>

    <link rel="stylesheet" href="css/Styletwo.css">

</head>
<body>

<div class="col-lg-12">


    <?php
    $sql = "select * from user join student s on user.user_id = s.student_user_id join classes c on c.classes_id = s.student_classes_id where user_level = 'student' and classes_id = '3';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<form method='post'>";

        echo '<label for="date">Select a date:</label>';
        echo '<input type="date" name="attendance_date" id="date" min="2022-01-01" max="2023-12-31">';


        echo "<table>";
        echo "<tr><th>Student Name</th><th>Attendance</th><th>Remarks</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["user_firstname"] . " " . $row["user_lastname"] . "</td>";
            echo "<td>";
            echo "<input type='radio' name='attendance[" . $row["student_id"] . "][status]' value='late'> Late";
            echo "<input type='radio' name='attendance[" . $row["student_id"] . "][status]' value='absent'> Absent";
            echo "</td>";
            echo "<td><input type='text' name='attendance[" . $row["student_id"] . "][remarks]' placeholder='Remarks'></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<input type='submit' value='Save Attendance'>";
        echo "</form>";
    }

    ?>
</div>

</body>
</html>

<?php include "footer.php" ?>




