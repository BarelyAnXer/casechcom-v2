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

</head>
<body>

<div class="wrapper">

    <div class="body-overlay"></div>

    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><img src="old/images/logonew.png" class="images-fluid"/><span>Casechcom</span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="student-dashboard.php" class="dashboard"><i
                            class="material-icons">dashboard</i><span>Dashboard</span></a>
            </li>

            <li class="active">
                <a href="student-grades-view.php" class="dashboard"><i
                            class="material-icons">dashboard</i><span>View Grades</span></a>
            </li>

            <li class="active">
                <a href="student-attendance-view.php" class="dashboard"><i
                            class="material-icons">dashboard</i><span>View Attendance</span></a>
            </li>


        </ul>


    </nav>

    <!-- Page Content  -->
    <div id="content">

        <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>

                    <a class="navbar-brand" href="#"> Student Dashboard </a>

                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>

                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                         id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="material-icons">apps</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="material-icons">person</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="material-icons">logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="old/js/jquery-3.3.1.slim.min.js"></script>
        <script src="old/js/popper.min.js"></script>
        <script src="old/js/bootstrap.min.js"></script>
        <script src="old/js/jquery-3.3.1.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('active');
                });

                $('.more-button,.body-overlay').on('click', function () {
                    $('#sidebar,.body-overlay').toggleClass('show-nav');
                });

            });


        </script>


</body>

</html>
