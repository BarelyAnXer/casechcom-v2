<?php
require("connection.php");

session_start();
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['register'])) {

//    $email = htmlspecialchars($_POST['email']);
    $email = filter_input(INPUT_POST, $_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, $_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    if (true) {
        $_SESSION['user'] = 'logged in user';
        header('Location: student-dashboard.php');
    } else {

    }

}

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $password = mysqli_real_escape_string($conn, $_POST['password']);
//
//    $sql = "SELECT * FROM user WHERE email = '$email'";
//
//    $result = mysqli_query($conn, $sql);
//
//    echo print_r($result, true);

//    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//    $active = $row['active'];

//    $count = mysqli_num_rows($result);

//    if ($count == 1) {
////        session_register("myusername");
//        $_SESSION['login_user'] = $email;
//
//        header("location: welcome.php");
//    } else {
//        $error = "Your Login Name or Password is invalid";
//    }
//}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<h1>register</h1>
<form action="" method="post">
    email: <input type="email" name="email"><br>
    <p>error</p>
    password: <input type="password" name="password"><br>
    <p>error</p>
    <input type="submit" value="register" name="register">
</form>

<login>login</login>
<form action="" method="post">
    email: <input type="email" name="email"><br>
    password: <input type="password" name="password"><br>
    <input type="submit" value="login">
</form>

</body>
</html>
