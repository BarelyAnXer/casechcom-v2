<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from attendance join student s on s.student_id = attendance.student_id join user u on s.user_id = u.user_id");
$rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM attendance WHERE attendance_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: attendance-crd.php");
    }
}

if (isset($_POST['SAVE'])) {
    $student_id = $_POST['student_id'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $date = $_POST['date'];
    $attendance_sql = "insert into attendance ( student_id, date, timein, timeout)  values ('$student_id','$date','$timein','$timeout')";

    if (mysqli_query($conn, $attendance_sql)) {
        header("Location: attendance-crd.php");
    } else {
        echo "Error: " . $attendance_sql . "<br>" . $conn->error;
    }
}
?>


<?php include "admin-navbar.php" ?>

<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;">
            <form align="center" action="" method="POST" novalidate>

                student : <select name="student_id" id="student">

                    <?php
                    $grade_sql = "select * from user join student s on user.user_id = s.user_id";
                    $res = mysqli_query($conn, $grade_sql);
                    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
                    if ($rows > 0) {
                        foreach ($rows as $row) {
                            ?>
                            <option value="<?php echo $row['student_id'] ?>"><?php echo $row['firstname'] . " " . $row['lastname'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select><br>
                time in : <input align="center" type="time" name="timein" value=""><br>
                time out: <input align="center" type="time" name="timeout" value=""><br>
                date <input align="center" type="date" name="date" value="">


                <input align="center" type="submit" value="SAVE" name="SAVE">
            </form>
        </div>
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
                            <a href="attendance-edit.php?id=<?php echo $row['attendance_id']; ?>"
                               class="btn btn-primary btn-flat ">
                                <i class="material-icons">edit_note</i>
                            </a>
                            <a href="attendance-crd.php?id=<?php echo $row['attendance_id']; ?>"
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

