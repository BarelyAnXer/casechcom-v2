<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from user join student s on user.user_id = s.user_id");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['SAVE'])) {
    $name = $_POST['name'];
    $classes_sql = "INSERT INTO classes (name) values ('$name')";

    if (mysqli_query($conn, $classes_sql)) {
//        if ($conn->query($subject_sql) === TRUE) {
        header("Location: classes-crd.php");
//        } else {
//            echo "Error: " . $subject_sql . "<br>" . $conn->error;
//        }
    } else {
        echo "Error: " . $classes_sql . "<br>" . $conn->error;
    }
}

?>

<?php include "admin-navbar.php" ?>

<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;">
            <form align="center" action="" method="POST" novalidate>

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
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td>
                        <td><?php echo $row['balance']; ?></td>
                        <td>
                            <a href="finance-edit.php?id=<?php echo $row['user_id']; ?>"
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

