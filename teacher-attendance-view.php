<?php include "./config/connection.php"; ?>


<?php include "teacher-navbar.php" ?>

<html>

<head>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</head>

<body>

<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;">
            <form align="center" action="" method="POST" novalidate>

            </form>
        </div>

<!--        <select name="" id="">-->
        <!--            --><?php
        //            $behavior_sql = "select * from student join user u on u.user_id = student.student_user_id;";
        //            $res = mysqli_query($conn, $behavior_sql);
        //            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        //            if ($rows > 0) {
        //                foreach ($rows as $row) {
        //                    ?>
        <!--                    <option value="--><?php //echo $row['student_id'] ?><!--">-->
        <?php //echo $row['user_firstname'] . " " . $row['user_lastname'] ?><!--</option>-->
        <!--                    --><?php
        //                }
        //            }
        //            ?>
        <!--        </select>-->

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




                $total_absent = 0;
                $months_absents = array();
                foreach ($months as $month) {
                    $grade_sql = "SELECT COUNT(*) AS absent_count
                    FROM casechcom.attendance
                    where attendance_status = 'absent'
                    AND MONTHNAME(attendance_date) = '$month' and attendance_school_year_id = $schoolyear;";
                    $res = mysqli_query($conn, $grade_sql);
                    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
                    $total_absent = $total_absent + $rows[0]['absent_count'];
                    $months_absents[$month] = $rows[0]['absent_count'];
                    echo "<th>" . $rows[0]['absent_count'] . "</th>";
                }
                ?>

                <th><?php echo $total_absent ?></th>
            </tr>
<!--            <tr align="center">-->
            <!--                <th scope="row">No. of Days Present</th>-->
            <!--                --><?php
            //                $data = array_combine($months, array_map(null, $months_days, $months_absents));
            //                $total_present = 0;
            //                foreach ($data as $month => $values) {
            //                    $days_present = $values[0] - $values[1];
            //                    $total_present = $total_present + $days_present;
            //                    echo "<th>" . $days_present . "</th>";
            //                }
            //                ?>
            <!--                <th>--><?php //echo $total_present ?><!--</th>-->
            <!--            </tr>-->

            </tbody>
        </table>

    </div>
</div>

<?php include "footer.php" ?>

</body>
</html>