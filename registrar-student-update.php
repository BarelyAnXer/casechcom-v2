<?php
include "config/connection.php";

if (isset($_POST['update'])) {
    $student_id = $_POST['id'];
    $schoolid = $_POST['schoolid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $phonenumber = $_POST['phonenumber'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $house_number = $_POST['housenumber'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];
    $zip = $_POST['zip'];
    $dateadmitted = $_POST['dateadmitted'];
    $classes_id = $_POST['classes_id'];
    $student_guardian_firstname = $_POST['studentguardianfirstname'];
    $student_guardian_middlename = $_POST['studentguardianmiddlename'];
    $student_guardian_lastname = $_POST['studentguardianlastname'];
    $student_guardian_relation = $_POST['studentguardianrelation'];
    $student_guardian_email = $_POST['studentguardianemail'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $update_user_sql = "UPDATE casechcom.user SET user_email='$email', user_firstname='$firstname', user_lastname='$lastname', user_middlename='$middlename', user_password='$password', user_gender='$gender', user_province='$province', user_city='$city', user_barangay='$barangay', user_street='$street', user_zip_code='$zip', user_phone_number='$phonenumber', user_date_admitted='$dateadmitted', user_school_id='$schoolid', user_suffix='$suffix', user_birth_date='$birthdate', user_house_number='$house_number', user_religion='$religion' WHERE user_id='$student_id'";

    if (mysqli_query($conn, $update_user_sql)) {
        $update_student_sql = "UPDATE student SET student_classes_id='$classes_id', student_guardian_firstname='$student_guardian_firstname', student_guardian_middlename='$student_guardian_middlename', student_guardian_lastname='$student_guardian_lastname', student_guardian_relation='$student_guardian_relation', student_guardian_email='$student_guardian_email' WHERE student_user_id='$student_id'";
        if ($conn->query($update_student_sql) === TRUE) {
            header("Location: registrar-student-view.php?id=".$student_id."&msg=update-success");
        } else {
            echo "Error: " . $update_student_sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $update_user_sql . "<br>" . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM casechcom.user WHERE user_id='$id';";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$student = $rows[0];
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
                <form action="" id="manage-student">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="msg" class=""></div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">School ID</label>
                                    <input type="text" class="form-control form-control-sm" name="schoolid"
                                           pattern="[0-9]{12}" value="<?php echo $student['user_school_id'] ?>"
                                           required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Email </label>
                                    <input type="email" class="form-control form-control-sm" name="email"
                                           value="<?php echo $student['user_email'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" class="form-control form-control-sm" name="password"
                                           value="<?php echo $student['user_password'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">First Name</label>
                                    <input type="text" class="form-control form-control-sm" name="firstname"
                                           value="<?php echo $student['user_firstname'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Middle Name</label>
                                    <input type="text" class="form-control form-control-sm" name="middlename"
                                           value="<?php echo $student['user_middlename'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" name="lastname"
                                           value="<?php echo $student['user_lastname'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Suffix</label>
                                    <input type="text" class="form-control form-control-sm" name="suffix"
                                           value="<?php echo $student['user_suffix'] ?>">
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Birth Date</label>
                                    <input type="date" class="form-control form-control-sm" name="birthdate"
                                           value="<?php echo $student['user_birth_date'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Gender</label>
                                <select name="gender" id="" class="custom-select custom-select-sm" required>
                                    <option value="Male" <?php echo $student['user_gender'] == "Male" ? 'selected="selected"' : '' ?>>
                                        Male
                                    </option>
                                    <option value="Female" <?php echo $student['user_gender'] == "Female" ? 'selected="selected"' : '' ?>>
                                        Female
                                    </option>
                                </select>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Religion</label>
                                    <input type="text" class="form-control form-control-sm" name="religion"
                                           value="<?php echo $student['user_religion'] ?>" required>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">


                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">House Number</label>
                                    <input type="text" class="form-control form-control-sm" name="housenumber"
                                           value="<?php echo $student['user_house_number'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Street</label>
                                    <input type="text" class="form-control form-control-sm" name="street"
                                           value="<?php echo $student['user_street'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Barangay</label>
                                    <input type="text" class="form-control form-control-sm" name="barangay"
                                           value="<?php echo $student['user_barangay'] ?>" required>
                                </div>
                            </div>



                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Province</label>
                                    <input type="text" class="form-control form-control-sm" name="province"
                                           value="<?php echo $student['user_province'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">City</label>
                                    <input type="text" class="form-control form-control-sm" name="city"
                                           value="<?php echo $student['user_city'] ?>" required>
                                </div>
                            </div>



                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Zip</label>
                                    <input type="text" class="form-control form-control-sm" name="zip"
                                           value="<?php echo $teacher['user_zip_code'] ?>" required
                                           pattern="\d{4}">
                                </div>
                            </div>



                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Guardian Firstname</label>
                                    <input type="text" class="form-control form-control-sm"
                                           name="studentguardianfirstname"
                                           value="<?php echo $student['student_guardian_firstname'] ?>"required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Guardian Middlename</label>
                                    <input type="text" class="form-control form-control-sm"
                                           value="<?php echo $student['student_guardian_middlename'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Guardian Lastname</label>
                                    <input type="text" class="form-control form-control-sm"
                                           name="studentguardianlastname"
                                           value="<?php echo $student['student_guardian_lastname'] ?>"required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Guardian Relation</label>
                                    <input type="text" class="form-control form-control-sm"
                                           name="studentguardianrelation"
                                           value="<?php echo $student['student_guardian_relation'] ?>"required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Phone Number</label>
                                    <input type="text" class="form-control form-control-sm" pattern="\d{11}"
                                           name="phonenumber" value="<?php echo $student['user_phone_number'] ?>">
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Guardian Email</label>
                                    <input type="text" class="form-control form-control-sm"
                                           name="studentguardianemail" pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$"
                                           value="<?php echo $student['student_guardian_email'] ?>"required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Date Admitted</label>
                                    <input type="date" class="form-control form-control-sm" name="dateadmitted"
                                           value="<?php echo $student['user_date_admitted'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Classes</label>
                                    <select name="classes_id" class="custom-select custom-select-sm"
                                            value="<?php echo $student['student_classes_id'] ?>"required>

                                        <?php
                                        $user_sql = "SELECT * FROM classes";
                                        $res = mysqli_query($conn, $user_sql);
                                        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
                                        if ($rows > 0) {
                                            foreach ($rows as $row) {
                                                ?>
                                                <option value="<?php echo $row['classes_id'] ?>"><?php echo $row['classes_name'] ?></option>
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




