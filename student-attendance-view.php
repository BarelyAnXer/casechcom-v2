<?php
include("./config/connection.php");

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
    <table class="table table-bordered">
        <colgroup align="center">


        </colgroup>

        <thead class="text-align: center">
        <tr align="center">
            <th></th>
            <?php

            $schoolyear_sql = "select * from school_year where school_year_is_active = '1'";
            $result = mysqli_query($conn, $schoolyear_sql);
            $rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $schoolyear = $rows2[0]['school_year_id'];

            $grade_sql = "select * from school_month join school_year sy on sy.school_year_id = school_month.school_month_school_year_id where sy.school_year_id = '$schoolyear' ;";
            $months = array();
            $months_days = array();
            $res = mysqli_query($conn, $grade_sql);
            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if ($rows > 0) {
                foreach ($rows as $row) {
                    $months[$row['school_month_id']] = $row['school_month_name'];
                    $months_days[$row['school_month_id']] = $row['school_month_school_days'];
                    ?>
                    <th><?php echo $row['school_month_name'] ?></th>
                    <?php
                }
            }
            ?>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr align="center">
            <th scope="row">No. of School Days</th>
            <?php
            $total = 0;
            $grade_sql = "select *
                from school_month
                join school_year sy on sy.school_year_id = school_month.school_month_school_year_id
                where sy.school_year_id = '$schoolyear';";
            $res = mysqli_query($conn, $grade_sql);
            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if ($rows > 0) {
                foreach ($rows as $row) {
                    $total = $total + $row['school_month_school_days'];
                    ?>
                    <th><?php echo $row['school_month_school_days'] ?></th>
                    <?php
                }
            }
            ?>
            <th><?php echo $total ?></th>
        </tr>
        <tr align="center">
            <th scope="row">No. of Times Absent</th>
            <?php

            $user_id = $user['user_id'];

            $sql = "select * from student where student_user_id = $user_id";
            $result = mysqli_query($conn, $sql);
            $rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $student_id = $rows2[0]['student_id'];


            $total_absent = 0;
            $months_absents = array();
            foreach ($months as $month) {
                $grade_sql = "SELECT COUNT(*) AS absent_count
                    FROM casechcom.attendance
                    where attendance_status = 'absent'
                    AND MONTHNAME(attendance_date) = '$month' and attendance_school_year_id = $schoolyear and attendance_student_id = '$student_id';";
                $res = mysqli_query($conn, $grade_sql);
                $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
                $total_absent = $total_absent + $rows[0]['absent_count'];
                $months_absents[$month] = $rows[0]['absent_count'];
                echo "<th>" . $rows[0]['absent_count'] . "</th>";
            }
            ?>

            <th><?php echo $total_absent ?></th>
        </tr>
        <tr align="center">
            <th scope="row">No. of Days Present</th>
            <?php
            $data = array_combine($months, array_map(null, $months_days, $months_absents));
            $total_present = 0;
            foreach ($data as $month => $values) {
                $days_present = $values[0] - $values[1];
                $total_present = $total_present + $days_present;
                echo "<th>" . $days_present . "</th>";
            }
            ?>
            <th><?php echo $total_present ?></th>
        </tr>

        </tbody>
    </table>


</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include "footer.php" ?>




