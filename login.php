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
            $result = mysqli_query($conn, "select * from user where user_email='$email'");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
//            echo '<pre>' . var_export($rows, true) . '</pre>';
            if (count($rows)) {
                $user = $rows[0];
                if (password_verify($password, $user['user_password'])) {
                    $_SESSION['user'] = serialize($user);
                    if ($user['user_level'] == "registrar") {
                        header('Location: registrar-dashboard.php');
                    } else if ($user['user_level'] == "teacher") {
                        header('Location: teacher-dashboard.php');
                    } else if ($user['user_level'] == "student") {
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
    <link rel="icon" href="old/images/logonew.png" type="image/x-icon">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="old/css/style.css"

</head>

<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="old/images/logologin.png"
                                         style="width: 100px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Casechcom School</h4>
                                </div>

                                <form class="login_form" action="login.php" method="POST" novalidate>
                                    <p>Please login to your account</p>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Username</label>
                                        <input type="email" name="email" value="" id="form2Example11"
                                               class="form-control"
                                               placeholder="Email address"/>

                                    </div>
                                    <?php echo $emailError ?>
                                    <label class="form-label" for="form2Example22">Password</label>
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" value="" id="form2Example22"
                                               class="form-control"
                                               placeholder="Password"/>

                                    </div>
                                    <?php echo $passwordError ?>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button stye="width: 80"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                value="login" name="login" type="submit">Log
                                            in
                                        </button>
                                        <br>
                                        <a class="text-muted" href="#!">Forgot password?</a>
                                    </div>
                                    <input type="checkbox" class="checkbox1"><label class="checkbox">Remember Me</label>


                                    <div class="d-flex align-items-center justify-content-center pb-4">

                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4" >We are educating <br> the mind and the heart</h4>
                                <p class="small mb-0"style="text-align: justify;">a piece of software called the Student Monitoring System (SMS) which is utilized to organize and run educational institutions more effectively. It offers a consolidated platform for the storage and access of information about students, professors, staff, and other stakeholders. The Student Monitoring System (SMS), which can be accessed by authorized individuals from any place with an internet connection, is intended to increase efficiency, communication, and data accuracy inside the institution. In that case, the developers initiated a casual interview with school administrators to gather data in improving their educational institution. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>




