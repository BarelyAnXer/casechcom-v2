<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
    $student_id = $_POST['student_id'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $date = $_POST['date'];


    $attendance_sql = "insert into attendance (student_id, date, timein, timeout)  values ('$student_id', '$date','$timein','$timeout' )";

    if (mysqli_query($conn, $attendance_sql)) {
        echo "New student record created successfully";
    } else {
        echo "Error: " . $person_sql . "<br>" . $conn->error;
    }


}

?>

<?php include "admin-navbar.php" ?>

<div class="content">
    <h1>register student</h1>
    <form action="" method="post">
        <label for="">Time in:</label>
        <input type="time" name="timein"><br>
        <label for="">Time out</label>
        <input type="time" name="timeout"><br>
        <label for="">date</label>
        <input type="date" name="date"><br>
        <span>student:</span>
        <select name="student_id">
            <?php
            $attendance_sql = "select * from user join student s on user.user_id = s.user_id";
            $res = mysqli_query($conn, $attendance_sql);
            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row['student_id'] ?>"><?php echo $row['firstname'] . " " . $row['lastname'] ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <br>
        <input type="submit" value="register" name="register">
    </form>
</div>

