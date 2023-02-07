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
    $subject_sql = "insert into subject (name) values ('$name')";

    if (mysqli_query($conn, $subject_sql)) {
//        if ($conn->query($subject_sql) === TRUE) {
        header("Location: subject-crd.php");
//        } else {
//            echo "Error: " . $subject_sql . "<br>" . $conn->error;
//        }
    } else {
        echo "Error: " . $subject_sql . "<br>" . $conn->error;
    }
}

?>


<?php include "sidebar.php" ?>

<div class="content">

    <form action="" method="POST" novalidate>
        name: <input type="text" name="name" value=""><br>
        descrpition: <input type="text" name="description" value=""><br>
        <br>

        <input type="submit" value="SAVE" name="SAVE">
    </form>

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>subject name</th>
            <th>Descirption</th>
            <th>acitons</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php echo $row['subject_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>description</td>
                    <td>
                        <a href="subject-edit.php?id=<?php echo $row['subject_id']; ?>">EDIT</a>
                        <a href="subject-crd.php?id=<?php echo $row['subject_id']; ?>">DELETE</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

