<?php
include "config/connection.php";
session_start();

if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
} else {
    header('Location: login.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Casechcom School
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
          rel="stylesheet">
</head>
<body>

<?php include "registrar-navbar.php" ?>
<?php include "config/connection.php" ?>

<div class="main-content">

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-warning">
                        <span class="material-icons">equalizer</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Attendance</strong></p>
                    <h3 class="card-title">
                        <?php
                        $sql = "select COUNT(attendance_id) as count from attendance";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['count'];
                        ?>
                    </h3>
                </div>
                <!--                <div class="card-footer">-->
                <!--                    <div class="stats">-->
                <!--                        <i class="material-icons text-info">info</i>-->
                <!--                        <a href="#pablo">See detailed report</a>-->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-rose">
                        <span class="material-icons">school</span>

                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Students</strong></p>
                    <h3 class="card-title">
                        <?php
                        $sql = "select COUNT(student_id) as count from user join student s on user.user_id = s.user_id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['count'];
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-success">
                        <span class="material-icons">subject</span>

                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Subjects</strong></p>
                    <h3 class="card-title">
                        <?php
                        $sql = "select COUNT(subject.subject_id) as count from subject";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['count'];
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-info">
                        <span class="material-icons">follow_the_signs</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Teachers</strong></p>
                    <h3 class="card-title">
                        <?php
                        $sql = "select COUNT(user.user_id) as count from user join teacher t on user.user_id = t.user_id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['count'];
                        ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-success">
                        <span class="material-icons">history_edu</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Teaches</strong></p>
                    <h3 class="card-title">
                        <?php
                        $sql = "select COUNT(attendance_id) as count from attendance";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['count'];
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-warning">
                        <span class="material-icons">grade</span>

                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Grades</strong></p>
                    <h3 class="card-title">
                        <?php
                        $sql = "select COUNT(student_id) as count from grade";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['count'];
                        ?>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-rose">
                        <span class="material-icons">psychology</span>

                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>Behavior</strong></p>
                    <h3 class="card-title">
                        <?php
                        $sql = "select COUNT(student_id) as count from behavior";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['count'];
                        ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include "footer.php" ?>
					
						
		







