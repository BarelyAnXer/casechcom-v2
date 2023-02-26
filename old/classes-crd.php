<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from classes");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM classes WHERE classes_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $parent = dirname($_SERVER['REQUEST_URI']);
        header("Location: classes-crd.php");
    }
}

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
    <div style="padding-top: 50px; padding-bottom: 50px;" >
        <form align="center" action="" method="POST" novalidate>
            name: <input type="text" name="name" value="">
            <br>
            <br>
            <input style="height: 40px; width:150px; float: bottom; border-radius : 22px; border-color:blueviolet; align: center;"

                    type="submit" value="SAVE" name="SAVE">
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
                    <td ><?php echo $row['classes_id']; ?></td>
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

