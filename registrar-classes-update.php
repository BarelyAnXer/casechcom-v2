<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from classes join user u on u.user_id = classes.classes_teacher_id");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from classes join user u on u.user_id = classes.classes_teacher_id where classes_id = '$id';";
    $result = mysqli_query($conn, $sql);
    $rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $classes = $rows2[0];
}

if (isset($_POST['UPDATE'])) {
    $name = $_POST['name'];
    $teacher_id = $_POST['teacher_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $classes_sql = "update classes set classes_name = '$name', classes_teacher_id = '$teacher_id' where classes_id = '$id';";
    if (mysqli_query($conn, $classes_sql)) {
        header("Location: registrar-classes-crd.php");
    } else {
        echo "Error: " . $classes_sql . "<br>" . $conn->error;
    }
}

?>


<?php include "registrar-navbar.php" ?>

<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;">
            <form align="center" action="" method="POST" novalidate>
                <label for="">Class Name</label>
                <input type="text" name="name" value="<?php echo $classes['classes_name'] ?>">
                <br>
                <label for="">Teacher</label>
                <select name="teacher_id" class="custom-select custom-select-sm" required>
                    <?php
                    $user_sql = "SELECT *
FROM casechcom.user
WHERE user_level = 'teacher'
AND user_id NOT IN (
    SELECT classes_teacher_id
    FROM casechcom.classes
    WHERE classes_teacher_id IS NOT NULL
)";
                    $res = mysqli_query($conn, $user_sql);
                    $rows2 = mysqli_fetch_all($res, MYSQLI_ASSOC);

                    if ($rows2 > 0) {
                        foreach ($rows2 as $row) {
                            ?>
                            <option value="<?php echo $row['user_id'] ?>" <?php echo $classes['user_id'] == $row['user_id'] ? 'selected="selected"' : '' ?>>
                                <?php echo $row['user_firstname'] . " " . $row['user_lastname'] ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <br>
                <br>
                <input style="height: 40px; width:150px; float: bottom; border-radius : 22px; border-color:blueviolet; align: center;"

                       type="submit" value="UPDATE" name="UPDATE">
            </form>
        </div>


        <table border="2px" bgcolor="black" align="center" class="table table-hover table-striped table-bordered"
               border="2px">
            <thead>
            <tr align="center">
                <th width="100">ID</th>
                <th width="100">Classes Name</th>
                <th width="100">Teacher</th>
                <th width="100">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <tr align="center">
                        <td><?php echo $row['classes_id']; ?></td>
                        <td><?php echo $row['classes_name']; ?></td>
                        <td><?php echo $row['user_firstname'] . " " . $row['user_lastname'] ?></td>
                        <td>
                            <a href="registrar-classes-update.php?id=<?php echo $row['classes_id']; ?>"
                               class="btn btn-primary btn-flat ">
                                <i class="material-icons">edit_note</i>
                            </a>
                            <a href="registrar-classes-crd.php?id=<?php echo $row['classes_id']; ?>"
                               class="btn btn-danger btn-flat">
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

