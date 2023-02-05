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
    $classes = $_POST['classes'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $user_sql = "INSERT INTO user (email, password, firstname, middlename, lastname, address, gender, level) VALUES ('$email', '$password', '$firstname', '$middlename', '$lastname', '$address', '$gender', 'student')";

    if (mysqli_query($conn, $user_sql)) {
        $student_id = $conn->insert_id;
        $student_sql = "INSERT INTO student (user_id, classes_id) VALUES ('$student_id', '$classes')";
        if ($conn->query($student_sql) === TRUE) {
            echo "New student record created successfully";
        } else {
            echo "Error: " . $student_sql . "<br>" . $conn->error;
        }

    } else {
        echo "Error: " . $person_sql . "<br>" . $conn->error;
    }


}

?>

<?php include "sidebar.php" ?>

<div class="content">
    <h1>register student</h1>
    <form action="" method="post">
        email: <input type="email" name="email"><br>
        password: <input type="password" name="password"><br>
        firstname: <input type="text" name="firstname"><br>
        lastname: <input type="text" name="lastname"><br>
        middlename: <input type="text" name="middlename"><br>
        gender: <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        address: <textarea name="address" rows="4" cols="50"></textarea><br>
        <span>classes:</span>
        <select name="classes">
            <?php
            $user_sql = "SELECT * FROM classes";
            $res = mysqli_query($conn, $user_sql);
            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <br>

        <input type="submit" value="register" name="register">
    </form>
</div>

