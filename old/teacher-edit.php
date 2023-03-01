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

<?php include "registrar-navbar.php" ?>

<html>
<head>
    <link rel="stylesheet" href="css/Styletwo.css">
</head>
<body>


<div class="col-lg-12">
    <form action="" method="post">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $teacher['user_id'] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div id="msg" class=""></div>
                        <div class="form-group text-dark">
                            <div class="form-group">
                                <label for="" class="control-label">Email </label>
                                <input type="email" class="form-control form-control-sm" name="email"
                                       value="<?php echo $teacher['email'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group text-dark">
                            <div class="form-group">
                                <label for="" class="control-label">Passsword</label>
                                <input type="password" class="form-control form-control-sm"
                                       value="<?php echo $teacher['email'] ?>" name="password"
                                       required>
                            </div>
                        </div>
                        <div class="form-group text-dark">
                            <div class="form-group">
                                <label for="" class="control-label">First Name</label>
                                <input type="text" class="form-control form-control-sm"
                                       value="<?php echo $teacher['firstname'] ?>" name="firstname" required>
                            </div>
                        </div>
                        <div class="form-group text-dark">
                            <div class="form-group">
                                <label for="" class="control-label">Middle Name</label>
                                <input type="text" class="form-control form-control-sm"
                                       value="<?php echo $teacher['middlename'] ?>" name="middlename" required>
                            </div>
                        </div>
                        <div class="form-group text-dark">
                            <div class="form-group">
                                <label for="" class="control-label">Last Name</label>
                                <input type="text" class="form-control form-control-sm"
                                       value="<?php echo $teacher['lastname'] ?>" name="lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Gender</label>
                            <select name="gender" id="" class="custom-select custom-select-sm" required>
                                <option value="Male" <?php echo $teacher['gender'] == "Male" ? 'selected="selected"' : '' ?>>
                                    Male
                                </option>
                                <option value="Female" <?php echo $teacher['gender'] == "Female" ? 'selected="selected"' : '' ?>>
                                    Female
                                </option>
                            </select>
                        </div>
                        <div class="form-group text-dark">
                            <div class="form-group">
                                <label for="" class="control-label">Address</label>
                                <textarea name="address" id="address" cols="30" rows="4"
                                          class="form-control">
                                        <?php echo $teacher['address'] ?>
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group text-dark">
                            <div class="form-group">
                                <label for="" class="control-label">Class</label>
                                <input type="date" class="form-control form-control-sm" name="hiredate"
                                       value="<?php echo $teacher['hire_date'] ?>" required>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer border-top border-info">
                    <input style="height: 40px; width:150px; float: right; border-radius : 22px; border-color:blueviolet;"
                           type="submit" value="update" name="update" required>
                    <div class="d-flex w-100 justify-content-center align-items-center">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>

<?php include "footer.php" ?>




