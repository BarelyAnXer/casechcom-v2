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

<?php include "sidebar.php" ?>

<div class="content">
    <h1>register teacher</h1>
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
        hiredate: <input type="date" id="" name="hiredate">
        <br>

        <input type="submit" value="register" name="register">
    </form>
</div>

