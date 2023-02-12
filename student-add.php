<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $hiredate = $_POST['hiredate'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $user_sql = "INSERT INTO user (email, password, firstname, middlename, lastname, address, gender, level) VALUES ('$email', '$password', '$firstname', '$middlename', '$lastname', '$address', '$gender', 'teacher')";

    if (mysqli_query($conn, $user_sql)) {
        $teacher_id = $conn->insert_id;
        $teacher_sql = "INSERT INTO teacher (user_id, hire_date) VALUES ('$teacher_id', '$hiredate')";
        if ($conn->query($teacher_sql) === TRUE) {
            echo "New teacher record created successfully";
        } else {
            echo "Error: " . $teacher_sql . "<br>" . $conn->error;
        }

    } else {
        echo "Error: " . $person_sql . "<br>" . $conn->error;
    }


}

?>

<?php include "admin-navbar.php" ?>

<html>
<head>

    <link rel="stylesheet" href="css/Styletwo.css">

</head>
<body>


<div class="col-lg-12">
    <form action="" method="post">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <form action="" id="manage-student">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="msg" class=""></div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Email </label>
                                    <input type="email" class="form-control form-control-sm" name="email" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Passsword</label>
                                    <input type="password" class="form-control form-control-sm" name="password"
                                           required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">First Name</label>
                                    <input type="text" class="form-control form-control-sm" name="firstname" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Middle Name</label>
                                    <input type="text" class="form-control form-control-sm" name="middlename" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" name="lastname" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Gender</label>
                                <select name="gender" id="" class="custom-select custom-select-sm" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="4"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Class</label>
                                    <select name="classes" class="custom-select custom-select-sm" required>

                                        <?php
                                        $user_sql = "SELECT * FROM classes";
                                        $res = mysqli_query($conn, $user_sql);
                                        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
                                        if ($rows > 0) {
                                            foreach ($rows as $row) {
                                                ?>
                                                <option value="<?php echo $row['classes_id'] ?>"><?php echo $row['name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>

                            </div>
                        </div>

                    </div>

                </form>

            </div>
            <div class="card-footer border-top border-info">
                <input style="height: 40px; width:150px; float: right; border-radius : 22px; border-color:blueviolet;"
                       type="submit" value="register" name="register">
                <div class="d-flex w-100 justify-content-center align-items-center">
                </div>
            </div>
        </div>

    </form>
</div>

</body>
</html>

<?php include "footer.php" ?>




