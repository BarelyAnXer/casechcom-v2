<?php
include "config/connection.php";
if (isset($_POST['update'])) {
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
    $id = $_GET['id'];

    $sql = "update casechcom.user
set user_email         = '$email',
    user_firstname     = '$firstname',
    user_lastname      = '$lastname',
    user_middlename    = '$middlename',
    user_password      = '$password',
    user_gender        = '$gender',
    user_province      = '$province',
    user_city          = '$city',
    user_barangay      = '$barangay',
    user_street        = '$street',
    user_zip_code      = '$zip',
    user_phone_number  = '$phonenumber',
    user_date_admitted = '$dateadmitted',
    user_school_id     = '$schoolid',
    user_suffix        = '$suffix',
    user_birth_date    = '$birthdate',
    user_house_number  = '$house_number',
    user_religion      = '$religion'
where user_id = '$id';";
    if ($result = mysqli_query($conn, $sql)) {
        header("Location: registrar-teacher-view.php");
    } else {
        echo "display error here";
    }
}


?>

<?php
include "./config/connection.php";
$id = $_GET['id'];
$sql = "select * from user where user_id='$id';";
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
                <form action="" id="manage-student">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="msg" class=""></div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">School ID</label>
                                    <input type="text" class="form-control form-control-sm" name="schoolid"
                                           pattern="[0-9]{12}" value="<?php echo $teacher['user_school_id'] ?>"
                                           required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Email </label>
                                    <input type="email" class="form-control form-control-sm" name="email"
                                           value="<?php echo $teacher['user_email'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" class="form-control form-control-sm" name="password"
                                           value="<?php echo $teacher['user_password'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">First Name</label>
                                    <input type="text" class="form-control form-control-sm" name="firstname"
                                           value="<?php echo $teacher['user_firstname'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Middle Name</label>
                                    <input type="text" class="form-control form-control-sm" name="middlename"
                                           value="<?php echo $teacher['user_middlename'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" name="lastname"
                                           value="<?php echo $teacher['user_lastname'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Suffix</label>
                                    <input type="text" class="form-control form-control-sm" name="suffix"
                                           value="<?php echo $teacher['user_suffix'] ?>">
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Phone Number</label>
                                    <input type="text" class="form-control form-control-sm" pattern="\d{11}"
                                           name="phonenumber" value="<?php echo $teacher['user_phone_number'] ?>">
                                </div>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Birth Date</label>
                                    <input type="date" class="form-control form-control-sm" name="birthdate"
                                           value="<?php echo $teacher['user_birth_date'] ?>">
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Gender</label>
                                <select name="gender" id="" class="custom-select custom-select-sm" required>
                                    <option value="Male" <?php echo $teacher['user_gender'] == "Male" ? 'selected="selected"' : '' ?>>
                                        Male
                                    </option>
                                    <option value="Female" <?php echo $teacher['user_gender'] == "Female" ? 'selected="selected"' : '' ?>>
                                        Female
                                    </option>
                                </select>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Religion</label>
                                    <input type="text" class="form-control form-control-sm" name="religion"
                                           value="<?php echo $teacher['user_religion'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">House Number</label>
                                    <input type="text" class="form-control form-control-sm" name="housenumber"
                                           value="<?php echo $teacher['user_house_number'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Province</label>
                                    <input type="text" class="form-control form-control-sm" name="province"
                                           value="<?php echo $teacher['user_province'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">City</label>
                                    <input type="text" class="form-control form-control-sm" name="city"
                                           value="<?php echo $teacher['user_city'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Barangay</label>
                                    <input type="text" class="form-control form-control-sm" name="barangay"
                                           value="<?php echo $teacher['user_barangay'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Street</label>
                                    <input type="text" class="form-control form-control-sm" name="street"
                                           value="<?php echo $teacher['user_street'] ?>" required>
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
                                    <label for="" class="control-label">Date Admitted</label>
                                    <input type="date" class="form-control form-control-sm" name="dateadmitted"
                                           value="<?php echo $teacher['user_date_admitted'] ?>" required>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
            <div class="card-footer border-top border-info">
                <input style="height: 40px; width:150px; float: right; border-radius : 22px; border-color:blueviolet;"
                       type="submit" value="update" name="update">
                <div class="d-flex w-100 justify-content-center align-items-center">
                </div>
            </div>
        </div>

    </form>
</div>

</body>
</html>

<?php include "footer.php" ?>




