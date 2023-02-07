<?php
include "./config/connection.php";
session_start();
$result = mysqli_query($conn, "select * from user join teacher t on user.user_id = t.user_id");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include "sidebar.php" ?>

<div class="content">
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>Full Name</th>
            <th>hiredate</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td>
                    <td><?php echo $row['hire_date']; ?></td>
                    <td>
                        <a href="./teacher-view-one.php?id=<?php echo $row['user_id']; ?>">VIEW</a>
                        <a href="./teacher-edit.php?id=<?php echo $row['user_id']; ?>">EDIT</a>
                        <a href="./teacher-delete.php?id=<?php echo $row['user_id']; ?>">DELETE</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

