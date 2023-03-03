<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
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

    $password = password_hash($password, PASSWORD_DEFAULT);

    $user_sql = "insert into user (user_email, user_firstname, user_lastname, user_middlename, user_password,
                            user_level, user_gender, user_province, user_city, user_barangay,
                            user_street, user_zip_code, user_phone_number, user_date_admitted, user_school_id,
                            user_suffix, user_birth_date, user_house_number)
values ('$email', '$firstname', '$lastname', '$middlename', '$password', 'teacher', '$gender', '$province', '$city',
        '$barangay', '$street', '$zip', '$phonenumber', '$dateadmitted', '$schoolid', '$suffix', '$birthdate', '$house_number');";

    if (mysqli_query($conn, $user_sql)) {
//        $teacher_id = $conn->insert_id;
//        if ($conn->query($teacher_sql) === TRUE) {
        echo "New teacher record created successfully";
        header("Location: registrar-teacher-add.php");
//        } else {
////            echo "Error: " . $teacher_sql . "<br>" . $conn->error;
//        }

    } else {
//        echo "Error: " . $person_sql . "<br>" . $conn->error;
    }


}

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
                                           pattern="[0-9]{12}" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Email </label>
                                    <input type="email" class="form-control form-control-sm" name="email" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
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
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Suffix</label>
                                    <input type="text" class="form-control form-control-sm" name="suffix">
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Phone Number</label>
                                    <input type="text" class="form-control form-control-sm" pattern="\d{11}"
                                           name="phonenumber">
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Birth Date</label>
                                    <input type="date" class="form-control form-control-sm" name="birthdate">
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
                                    <label for="" class="control-label">Religion</label>
                                    <input type="text" class="form-control form-control-sm" name="religion" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">House Number</label>
                                    <input type="text" class="form-control form-control-sm" name="housenumber" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Province</label>
                                    <input type="text" class="form-control form-control-sm" name="province" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">City</label>
                                    <input type="text" class="form-control form-control-sm" name="city" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Barangay</label>
                                    <input type="text" class="form-control form-control-sm" name="barangay" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Street</label>
                                    <input type="text" class="form-control form-control-sm" name="street" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Zip</label>
                                    <input type="text" class="form-control form-control-sm" name="zip" required
                                           pattern="\d{4}">
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Date Admitted</label>
                                    <input type="date" class="form-control form-control-sm" name="dateadmitted"
                                           required>
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




