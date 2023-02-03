<?php
include "config/connection.php";
session_start();
$result = mysqli_query($conn, "select * from user");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<head>
    <link rel="stylesheet" href="styles/admin-dashboard.css">
</head>

<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="">Students</a>
    <a href="">Add</a>
    <a href="">View</a>
    <a class="active" href="">Teachers</a>
    <a href="">Add</a>
    <a href="">View</a>
</div>

<!-- Page content -->
<div class="content">
    <table>
        <thead>

        </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td>
                        <a href="test.php?id=<?php echo $row['user_id']; ?>">icon here</a>
                        <a href="test.php?id=<?php echo $row['user_id']; ?>">icon here</a>
                        <a href="test.php?id=<?php echo $row['user_id']; ?>">icon here</a>
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





