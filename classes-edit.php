<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from classes");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from classes where classes_id='$id'";
    $result = mysqli_query($conn, $sql);
    $rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $classes = $rows2[0];
}

if (isset($_POST['UPDATE'])) {
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $sql = "update classes set name='$name' where classes_id='$id'";
    if ($result = mysqli_query($conn, $sql)) {

    } else {
        echo "display error here";
    }

    header("Location: classes-crd.php");
}

?>


<?php include "admin-navbar.php" ?>


<div class="content">
    <form action="" method="POST" novalidate>
        name: <input type="text" name="name" value="<?php echo $classes['name'] ?>"><br>
        <br>

        <input type="submit" value="UPDATE" name="UPDATE">
    </form>

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>classes name</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row['classes_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <a href="classes-edit.php?id=<?php echo $row['classes_id']; ?>">EDIT</a>
                        <a href="classes-crd.php?id=<?php echo $row['classes_id']; ?>">DELETE</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

