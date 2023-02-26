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
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;" >
    <form  align="center" action="" method="POST" novalidate>
        name: <input type="text" name="name" value="<?php echo $classes['name'] ?>">
        <br>
        <br>

        <input style="height: 40px; width:150px; float: bottom; border-radius : 22px; border-color:blueviolet; align: center;"
                type="submit" value="UPDATE" name="UPDATE">
    </form>
        </div>

            <table border="2px" bgcolor="black" align="center"  class="table table-hover table-striped table-bordered"border="2px">
                <thead>
                <tr align="center">
                    <th width="100">ID</th>
                    <th width="100">class name</th>
                    <th width="100">actions</th>
                </tr>
                </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr align="center">
                    <td><?php echo $row['classes_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <a href="classes-edit.php?id=<?php echo $row['classes_id']; ?>" class="btn btn-primary btn-flat ">
                            <i class="material-icons">edit_note</i>
                        </a>
                        <a href="classes-crd.php?id=<?php echo $row['classes_id']; ?>" class="btn btn-danger btn-flat">
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
    <?php include "footer.php" ?>

