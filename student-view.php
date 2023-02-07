<?php
include "./config/connection.php";
session_start();
$result = mysqli_query($conn, "select * from user join student s on user.user_id = s.user_id join classes c on s.classes_id = c.classes_id");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include "sidebar.php" ?>

<div class="content">
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>firstname</th>
            <th>middlename</th>
            <th>lastname</th>
            <th></th>
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
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['middlename']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <!--                    <td>--><?php //echo $row['']; ?><!--</td>-->
                    <td>
                        <a href="./student-view-one.php?id=<?php echo $row['user_id']; ?>">VIEW</a>
                        <a href="./student-edit.php?id=<?php echo $row['user_id']; ?>">EDIT</a>
                        <a href="./student-delete.php?id=<?php echo $row['user_id']; ?>">DELETE</a>
                        <a href=""></a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

