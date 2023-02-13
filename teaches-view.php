<?php
include "./config/connection.php";
session_start();
$result = mysqli_query($conn, "select teaches.teaches_id, c.name as classes_name, s.name as subject_name, u.firstname, u.middlename, u.lastname
from teaches
         join teacher t on t.teacher_id = teaches.teacher_id
         join user u on t.user_id = u.user_id
         join subject s on s.subject_id = teaches.subject_id
         join classes c on c.classes_id = teaches.classes_id;");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include "admin-navbar.php" ?>

<div class="content">
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>teacher</th>
            <th>class name</th>
            <th>subject name</th>
            <th>action</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row['teaches_id']; ?></td>
                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                    <td><?php echo $row['classes_name']; ?></td>
                    <td><?php echo $row['subject_name']; ?></td>
                    <td>
                        <a href="./teaches-delete.php?id=<?php echo $row['teaches_id']; ?>">DELETE</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

