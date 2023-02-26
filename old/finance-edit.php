<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from user join student s on user.user_id = s.user_id");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from student join user u on student.user_id = u.user_id where student_id = '$id';";
    $result = mysqli_query($conn, $sql);
    $rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $finance = $rows2[0];
}


if (isset($_POST['SAVE'])) {
    $balance = $_POST['balance'];
    $balance_sql = "update student set balance = '$balance' where student_id = '$id'";

    if (mysqli_query($conn, $balance_sql)) {
        header("Location: finance-crd.php");
    } else {
        echo "Error: " . $balance_sql . "<br>" . $conn->error;
    }
}

?>

<?php include "admin-navbar.php" ?>

<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;">
            <form align="center" action="" method="POST" novalidate>
                balance: <input type="text" name="balance" value="<?php echo $finance['balance'] ?>">
                <input type="submit" name="SAVE" value="SAVE" required>
        </div>


        <table border="2px" bgcolor="black" align="center" class="table table-hover table-striped table-bordered"
               border="2px">
            <thead>
            <tr align="center">
                <th width="100">ID</th>
                <th width="100">Student Name</th>
                <th width="100">Balance</th>
                <th width="100">actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <tr align="center">
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['balance']; ?></td>
                        <td>
                            <a href="finance-edit.php?id=<?php echo $row['student_id']; ?>"
                               class="btn btn-primary btn-flat ">
                                <i class="material-icons">edit_note</i>
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

