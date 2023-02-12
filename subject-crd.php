<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from subject");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM subject WHERE subject_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $parent = dirname($_SERVER['REQUEST_URI']);
        header("Location: subject-crd.php");
    }
}

if (isset($_POST['SAVE'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $subject_sql = "insert into subject (name, description) values ('$name', '$description')";

    if (mysqli_query($conn, $subject_sql)) {
        header("Location: subject-crd.php");
    } else {
        echo "Error: " . $subject_sql . "<br>" . $conn->error;
    }
}
?>


<?php include "admin-navbar.php" ?>

<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;" >
    <form align="center" action="" method="POST" novalidate>
        name: <input  align="center" type="text" name="name" value=""><br><br>
        descrpition: <input align="center" type="text" name="description" value="">

        <br><br>
        <input style="height: 40px; width:150px; float: bottom; border-radius : 22px; border-color:blueviolet; align: center;"

               type="submit" value="SAVE" name="SAVE">
    </form>
        </div>
        <table border="2px" bgcolor="black" align="center"  class="table table-hover table-striped table-bordered"border="2px">
        <thead>
        <tr align="center">
            <th width="100">id</th>
            <th width="100">subject name</th>
            <th width="100">Descirption</th>
            <th width="100">acitons</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr align="center">
                    <td><?php echo $row['subject_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['description']; ?></td>

                    <td>
                        <a href="subject-edit.php?id=<?php echo $row['subject_id']; ?>" class="btn btn-primary btn-flat ">
                            <i class="material-icons">edit_note</i>
                        </a>
                        <a href="subject-crd.php?id=<?php echo $row['subject_id']; ?>" class="btn btn-danger btn-flat">
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

