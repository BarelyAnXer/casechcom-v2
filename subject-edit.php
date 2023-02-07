<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from subject");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from subject where subject_id='$id'";
    $result = mysqli_query($conn, $sql);
    $rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $subject = $rows2[0];
}

if (isset($_POST['UPDATE'])) {
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $sql = "update subject set name='$name' where subject_id='$id'";
    if ($result = mysqli_query($conn, $sql)) {

    } else {
        echo "display error here";
    }

    header("Location: subject-crd.php");
}

?>

<?php include "sidebar.php" ?>

<div class="content">
    <form action="" method="POST" novalidate>
        name: <input type="text" name="name" value="<?php echo $subject['name'] ?>"><br>
        descrpition: <input type="text" name="description" value=""><br>
        <br>

        <input type="submit" value="UPDATE" name="UPDATE">
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

