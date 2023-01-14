<?php
include("connection.php");
session_start();

// could make this as an array and loop through it
$emailError = "";
$passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {

        if (!filter_var($emailError, FILTER_VALIDATE_EMAIL)) {
            $emailError = "invalid email";
        }
        if ($_POST['email'] == "") {
            $emailError = "email cannot be empty";
        }

        if ($_POST['password'] == "") {
            $passwordError = "password cannot be empty";
        }

        if (empty($emailError) && empty($passwordError)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

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

<h1>login</h1>
<form action="login.php" method="POST" novalidate>
    email: <input type="email" name="email" value=""><br>
    <?php echo $emailError ?>
    <br>
    password: <input type="password" name="password" value=""><br>
    <?php echo $passwordError ?>
    <br>
    <input type="submit" value="login" name="login">
</form>