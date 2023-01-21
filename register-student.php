<?php
include("config/connection.php");

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (email, password, lastName, middleName, firstName, address, gender, profile_url, level) VALUES ('$email','$password', 'test', 'admin','admin','admin','admin','admin','admin')";
    if (mysqli_query($conn, $sql)) {
        echo "success;";

//            $_SESSION['user'] = 'logged in user';
//            header('Location: student-dashboard.php');
    }


}

?>


<h1>register student</h1>
<form action="" method="post">
    email: <input type="email" name="email"><br>
    password: <input type="password" name="password"><br>
    <input type="submit" value="register" name="register">
</form>

