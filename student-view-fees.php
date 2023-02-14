<?php
include "./config/connection.php";

// Retrieve the user ID from the session variable
//$user_id = $_SESSION['user_id'];

// Query the database to retrieve data for the specific user
//$result = mysqli_query($conn, "SELECT * FROM user JOIN student s ON user.user_id = s.user_id WHERE user.user_id = $user_id");
//$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$result = mysqli_query($conn, "select * from user join student s on user.user_id = s.user_id");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php include "student-navbar.php" ?>

    <div class="content">
        <div class="card card-outline card-primary">
            <div style="padding-top: 50px; padding-bottom: 50px;">
                <form align="center" action="" method="POST" novalidate>

            </div>


            <table border="2px" bgcolor="black" align="center" class="table table-hover table-striped table-bordered" border="2px">
                <thead>
                <tr align="center">
                    <th width="100">ID</th>
                    <th width="100">Student Name</th>
                    <th width="100">Balance</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if ($rows > 0) {
                    foreach ($rows as $row) {
                        ?>
                        <tr align="center">
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td>
                            <td><?php echo $row['balance']; ?></td>

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