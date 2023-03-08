<?php
include("./config/connection.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attendance_date = $_POST['attendance_date'];
    foreach ($_POST["attendance"] as $id => $attendance) {
        if (!empty($attendance["status"])) {
            $status = $attendance["status"];
            $remarks = mysqli_real_escape_string($conn, $attendance["remarks"]);

            $res = mysqli_query($conn, "select * from school_year where school_year_is_active = '1';");
            $attendance_school_year_id = mysqli_fetch_all($res, MYSQLI_ASSOC);
            $active_school_year_id = $attendance_school_year_id[0]['school_year_id'];
            $sql = "INSERT INTO attendance (attendance_student_id, attendance_school_year_id, attendance_date, attendance_remarks, attendance_status) VALUES ('$id', '$active_school_year_id', '$attendance_date', '$remarks', '$status');";
            mysqli_query($conn, $sql);
        }
    }
}
?>



<?php include "teacher-navbar.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attendance</title>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="univdesign.css">

</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <?php
                    $user = unserialize($_SESSION['user']);

                    $user_id = $user['user_id'];
                    //                    var_dump($user_id);
                    $res = mysqli_query($conn, "SELECT classes_id FROM casechcom.classes WHERE classes_teacher_id = '$user_id';");
                    $teacher_classes_id = mysqli_fetch_all($res, MYSQLI_ASSOC);
                    $classes_id = null;
                    if (count($teacher_classes_id) > 0) {
                        $classes_id = $teacher_classes_id[0]['classes_id'];
                    }

                    $sql = "select * from user join student s on user.user_id = s.student_user_id join classes c on c.classes_id = s.student_classes_id where user_level = 'student' and classes_id = '$classes_id';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<form method='post'>";
                        echo '<div class="form-group">';
                        echo '<label for="date">Select a date:</label>';
                        echo '<input type="date" name="attendance_date" id="date" min="2022-01-01" max="2023-12-31" class="form-control" required>';
                        echo '</div>';
                        echo "<div class='table-responsive'>";
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr><th>Student Name</th><th>Attendance</th><th>Remarks</th></tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["user_firstname"] . " " . $row["user_lastname"] . "</td>";
                            echo "<td>";
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' name='attendance[" . $row["student_id"] . "][status]' value='late' id='status-late-" . $row["student_id"] . "'>";
                            echo "<label class='form-check-label' for='status-late-" . $row["student_id"] . "'>Late</label>";
                            echo "</div>";
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' name='attendance[" . $row["student_id"] . "][status]' value='absent' id='status-absent-" . $row["student_id"] . "'>";
                            echo "<label class='form-check-label' for='status-absent-" . $row["student_id"] . "'>Absent</label>";
                            echo "</div>";
                            echo "</td>";
                            echo "<td><input type='text' name='attendance[" . $row["student_id"] . "][remarks]' placeholder='Remarks' class='form-control'></td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                        echo "<input type='submit' value='Save Attendance' class='btn btn-primary'>";
                        echo "</form>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include "footer.php" ?>




