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


<?php include "sidebar.php" ?>

<div class="content">

    <form action="" method="POST" novalidate>
        name: <input type="text" name="name" value=""><br>
        <br>

        <input type="submit" value="SAVE" name="SAVE">
    </form>

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>class name</th>
            <th>acitons</th>
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

