<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from attendance join student s on s.student_id = attendance.student_id join user u on s.user_id = u.user_id");
$rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['Update'])) {
    $attendance_id = $_POST['attendance_id'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $date = $_POST['date'];
    $attendance_sql = "update attendance set timein = '$timein', timeout = '$timeout', date = '$date' where attendance_id = '$attendance_id'";

    if (mysqli_query($conn, $attendance_sql)) {
        header("Location: attendance-crd.php");
    } else {
        echo "Error: " . $attendance_sql . "<br>" . $conn->error;
    }
}
?>


<?php
include "./config/connection.php";
$id = $_GET['id'];
$sql = "select attendance_id, 
    u.firstname as student_firstname,
       u.lastname  as student_lastname,
       timein,
       timeout,
       date
from attendance
         join student s on s.student_id = attendance.student_id
         join user u on u.user_id = s.user_id where attendance_id = '$id';
";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$attendance = $rows[0];
?>

<?php include "admin-navbar.php" ?>

<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;">
            <form align="center" action="" method="POST" novalidate>
                <input type="text" hidden="" name="attendance_id" value="<?php echo $attendance['attendance_id'] ?>">
                student : <input type="text" disabled
                                 value="<?php echo $attendance['student_firstname'] . " " . $attendance['student_lastname'] ?>"><br>
                time in : <input align="center" type="time" name="timein"
                                 value="<?php echo $attendance['timein'] ?>"><br>
                time out: <input align="center" type="time" name="timeout"
                                 value="<?php echo $attendance['timeout'] ?>"><br>
                date <input align="center" type="date" name="date" value="<?php echo $attendance['date'] ?>">


                <input align="center" type="submit" value="Update" name="Update">
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

