<?php
include "config/connection.php";
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $hiredate = mysqli_real_escape_string($conn, $_POST['hiredate']);

    $sql = "UPDATE user SET firstname='$firstname', middlename='$middlename', lastname='$lastname', address='$address', gender='$gender'  WHERE user_id = $id";
    if ($result = mysqli_query($conn, $sql)) {

    } else {
        echo "display error here";
    }

    $sql = "UPDATE teacher SET hire_date = '$hiredate' WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    header("Location: teacher-view.php");
//    }
}


?>

<?php
include "./config/connection.php";
$id = $_GET['id'];
$sql = "select * from user join teacher t on user.user_id = t.user_id where t.user_id = $id";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$teacher = $rows[0];
?>

<?php include "sidebar.php" ?>
<div class="content">
    <h1>EDIT STUDENT</h1>
    <form action="" method="post">
        <label for="">Student ID</label>
        <input type="email" name="email" disabled value="<?php echo $teacher['user_id'] ?>"><br>
        <label for="">email</label>
        <input type="email" name="email" value="<?php echo $teacher['email'] ?>"><br>
        <label for="">firstname</label>
        <input type="text" name="firstname" value="<?php echo $teacher['firstname'] ?>"><br>
        <label for="">middlename</label>
        <input type="text" name="middlename" value="<?php echo $teacher['middlename'] ?>"><br>
        <label for="">lastname</label>
        <input type="text" name="lastname" value="<?php echo $teacher['lastname'] ?>"><br>
        <label for="">gender</label>
        <select name="gender">
            <option value="Male" <?php echo $teacher['gender'] == "Male" ? 'selected="selected"' : '' ?>>Male</option>
            <option value="Female" <?php echo $teacher['gender'] == "Female" ? 'selected="selected"' : '' ?>>Female
            </option>
        </select><br>
        <label for="">address</label>
        <textarea name="address" rows="4" cols="50"><?php echo $teacher['address'] ?></textarea><br>
        <label for="">hiredate</label>
        <input type="date" id="" value="<?php echo $teacher['hire_date'] ?>" name="hiredate">


        <br>
        <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
        <td><input type="submit" name="update" value="Update"></td>
        <a href="">cancel</a>
    </form>


</div>