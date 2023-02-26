<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from attendance join student s on s.student_id = attendance.student_id join user u on s.user_id = u.user_id");
$rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM attendance WHERE attendance_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: teacher-attendance-read.php");
    }
}

if (isset($_POST['SAVE'])) {
    $student_id = $_POST['student_id'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $date = $_POST['date'];
    $attendance_sql = "insert into attendance ( student_id, date, timein, timeout)  values ('$student_id','$date','$timein','$timeout')";

    if (mysqli_query($conn, $attendance_sql)) {
        header("Location: teacher-attendance-read.php");
    } else {
        echo "Error: " . $attendance_sql . "<br>" . $conn->error;
    }
}
?>


<?php include "teacher-navbar.php" ?>

<div class="content">
    <div class="card card-outline card-primary">
        <table border="2px" bgcolor="black" align="center" class="table table-hover table-striped table-bordered"
               border="2px">
            <thead>
            <tr align="center">
                <th width="100">attendance id</th>
                <th width="100">name</th>
                <th width="100">timein</th>
                <th width="100">timeout</th>
                <th width="100">date</th>
                <th width="100">actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($rows2 > 0) {
                foreach ($rows2 as $row) {
                    ?>
                    <tr align="center">
                        <td><?php echo $row['attendance_id']; ?></td>
                        <td><?php echo $row['firstname'] . " " . $row['lastname'] ?></td>
                        <td><?php echo $row['timein']; ?></td>
                        <td><?php echo $row['timeout']; ?></td>
                        <td><?php echo $row['date']; ?></td>

                        <td>
                            <a href="teacher-attendance-edit.php?id=<?php echo $row['attendance_id']; ?>"
                               class="btn btn-primary btn-flat ">
                                <i class="material-icons">edit_note</i>
                            </a>
                            <a href="teacher-attendance-read.php?id=<?php echo $row['attendance_id']; ?>"
                               class="btn btn-danger btn-flat">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>

                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "footer.php" ?>

