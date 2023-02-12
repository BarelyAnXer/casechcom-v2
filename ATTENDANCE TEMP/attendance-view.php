<?php
include "./config/connection.php";
session_start();
$result = mysqli_query($conn, "select * from attendance");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include "sidebar.php" ?>

<div class="content">
    <table>
        <thead>
        <tr>
            <th>attendance_id</th>
            <!--            <th>student name</th>-->
            <th>date</th>
            <th>time in</th>
            <th>time out</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row['attendance_id']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['timein']; ?></td>
                    <td><?php echo $row['timeout']; ?></td>
                    <td>
                        <a href="./attendance-edit.php?id=<?php echo $row['attendance_id']; ?>">EDIT</a>
                        <a href="./attendance-delete.php?id=<?php echo $row['attendance_id']; ?>">DELETE</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

