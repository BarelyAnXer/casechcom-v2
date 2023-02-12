<?php
include("config/connection.php");
session_start();

// could make this as an array and loop through it
$emailError = "";
$passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "invalid email";
        }
        if ($_POST['email'] == "") {
            $emailError = "email cannot be empty";
        }

        if ($_POST['password'] == "") {
            $passwordError = "password cannot be empty";
        }

        if (empty($emailError) && empty($passwordError)) {
            $result = mysqli_query($conn, "select * from user where email='$email'");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo '<pre>' . var_export($rows, true) . '</pre>';
            if (count($rows)) {
                $user = $rows[0];
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = serialize($user);
                    if ($user['level'] == "admin") {
                        header('Location: admin-dashboard.php');
                    } else if ($user['level'] == "teacher") {
                        header('Location: teacher-dashboard.php');
                    } else if ($user['level'] == "student") {
                        header('Location: student-dashboard.php');
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CASECHOM LOGIN</title>
    <link rel="stylesheet" href="css/style-login.css">
    <link rel="icon" href="imagesogonew.png" type="image/x-icon">
</head>

<body>

    <div>
        <div class="logo"></div>
        <div class="footer"></div>
        <div class="background">

        </div>
    </div>
    <div id="casechomtxt">Catholic Servants of Christ <br>Community School</div>
    <div id="infosystxt">INFORMATION SYSTEM</div>
    <div id="copyrighttxt">Copyright ©2002 All Rights Reserved. CASECHOM</div>
    <div id="invalidtxt"> Invalid password or email!</div>

    <div class="container">
    <form class="login_form" action="login.php" method="POST" novalidate>
            <div class="email font">Email</div>
            <input class="emailfield" type="email" name="email" value="">
            <br><?php echo $emailError ?><br>
            <div class="pass font2">Password</div>
            <input class="passwordfield" type="password" name="password" value="">
            <br> <?php echo $passwordError ?><br>
            <input type="checkbox" class="checkbox1"><label class="checkbox">Remember Me</label>

            <a href="#">Forgot Password?</a>
        <div >
            <br>
        <input class="loginbtn" type="submit" value="login" name="login">
        </div>
           
        </form>
    </div>

</body>

</html>