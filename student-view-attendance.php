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

<?php include "student-navbar.php" ?>

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




</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include "footer.php" ?>




