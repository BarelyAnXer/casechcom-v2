<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
    $grade_id = $_GET['id'];
    $grade1 = $_POST['grade1'];
    $grade2 = $_POST['grade2'];
    $grade3 = $_POST['grade3'];
    $grade4 = $_POST['grade4'];

    $grade_sql = "update grade
set gradeq1 = '$grade1',
    gradeq2 = '$grade2',  
    gradeq3 = '$grade3',
    gradeq4 = '$grade4'
where grade_id = '$grade_id'";
    if (mysqli_query($conn, $grade_sql)) {
        header("Location: grades-view.php");
    } else {
        echo "Error: " . $grade_sql . "<br>" . $conn->error;

    }
}
?>

<?php include "sidebar.php" ?>


<?php
include "./config/connection.php";
$id = $_GET['id'];
$sql = "select * from grade where grade_id='$id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$grade = $rows[0];
?>

<div class="content">
    <h1>grades edit</h1>
    <form action="" method="POST">
        <label for="">Q1</label> <input type="text" name="grade1" value="<?php echo $grade['gradeq1'] ?>"><br>
        <label for="">Q2</label> <input type="text" name="grade2" value="<?php echo $grade['gradeq2'] ?>"><br>
        <label for="">Q3</label> <input type="text" name="grade3" value="<?php echo $grade['gradeq3'] ?>"><br>
        <label for="">Q4</label> <input type="text" name="grade4" value="<?php echo $grade['gradeq4'] ?>"><br>
        <br>
        <br>

        <input type="submit" value="update" name="register">
    </form>
</div>

