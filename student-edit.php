<?php
include "config/connection.php";
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $classes_id = mysqli_real_escape_string($conn, $_POST['classes_id']);

//    if (empty($name) || empty($age) || empty($email)) {
//        if (empty($name)) {
//            echo "<font color='red'>Name field is empty.</font><br/>";
//        }
//        if (empty($age)) {
//            echo "<font color='red'>Age field is empty.</font><br/>";
//        }
//    } else {
    $sql = "UPDATE user SET firstname='$firstname', middlename='$middlename', lastname='$lastname', address='$address', gender='$gender'  WHERE user_id = $id";
    if ($result = mysqli_query($conn, $sql)) {

    } else {
        echo "display error here";
    }

    $sql = "UPDATE student SET classes_id = $classes_id WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    header("Location: student-view.php");
//    }
}


?>

<?php
include "./config/connection.php";
$id = $_GET['id'];
$sql = "SELECT * FROM user JOIN student on user.user_id = student.user_id where user.user_id = $id";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$student = $rows[0];
?>

<?php include "sidebar.php" ?>
<div class="content">
    <h1>EDIT STUDENT</h1>
    <form action="" method="post">
        <label for="">Student ID</label>
        <input type="email" name="email" disabled value="<?php echo $student['id'] ?>"><br>
        <label for="">email</label>
        <input type="email" name="email" value="<?php echo $student['email'] ?>"><br>
        <label for="">firstname</label>
        <input type="text" name="firstname" value="<?php echo $student['firstname'] ?>"><br>
        <label for="">middlename</label>
        <input type="text" name="middlename" value="<?php echo $student['middlename'] ?>"><br>
        <label for="">lastname</label>
        <input type="text" name="lastname" value="<?php echo $student['lastname'] ?>"><br>
        <label for="">gender</label>
        <select name="gender">
            <option value="Male" <?php echo $student['gender'] == "Male" ? 'selected="selected"' : '' ?>>Male</option>
            <option value="Female" <?php echo $student['gender'] == "Female" ? 'selected="selected"' : '' ?>>Female
            </option>
        </select><br>
        <label for="">address</label>
        <textarea name="address" rows="4" cols="50"><?php echo $student['address'] ?></textarea><br>
        <label for="">classes</label>
        <select name="classes_id">
            <?php
            $user_sql = "SELECT * FROM classes";
            $res = mysqli_query($conn, $user_sql);
            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row['id'] ?>" <?php echo $student['classes_id'] == $row['id'] ? 'selected="selected"' : '' ?>><?php echo $row['name'] ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <br>
        <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
        <td><input type="submit" name="update" value="Update"></td>
        <a href="">cancel</a>
    </form>


</div>