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

<div class="wrapper">

    <div class="body-overlay"></div>

    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><img src="images/logonew.png" class="images-fluid"/><span>Casechcom</span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="admin-dashboard.php" class="dashboard"><i
                            class="material-icons">dashboard</i><span>Dashboard</span></a>
            </li>

            <div class="small-screen navbar-display">


                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="material-icons">apps</i><span>apps</span></a>
                </li>

                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="material-icons">persons</i><span>profile</span></a>
                </li>

                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="logout.php"><i class="material-icons">logout</i><span>logout</span></a>
                </li>
            </div>


            <li class="dropdown">
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">group_add</i><span>Students</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                    <li>
                        <a href="student-add.php">Add Student</a>
                    </li>
                    <li>
                        <a href="student-view.php">View Students</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">equalizer</i>


                    <span>Teacher</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                    <li>
                        <a href="teacher-add.php">Add Teacher</a>
                    </li>
                    <li>
                        <a href="teacher-view.php">View Teachers</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">psychology</i><span>Behavior</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                    <li>
                        <a href="">Manage Behavior</a>
                    </li>
                    <li>
                        <a href="#">View Behavior Records</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">border_color</i><span>Grades</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                    <li>
                        <a href="admin-input-grades.php">Manage Grades</a>
                    </li>
                    <li>
                        <a href="admin-view-grades.php">View Grades Records</a>
                    </li>
                    <li>
                        <a href="admin-restore-grade.php">Restore Grades Reports</a>
                    </li>
                </ul>
            </li>


            <li class="">
                <a href="finance-crd.php"><i class="material-icons">photo_library</i><span>Finance</span></a>
            </li>

            <li class="">
                <a href="digital-libraries.php"><i class="material-icons">photo_library</i><span>Libraries</span></a>
            </li>

            <li class="">
                <a href="attendance-crd.php"><i class="material-icons">photo_library</i><span>Attendance</span></a>
            </li>


            <li class="">
                <a href="classes-crd.php"><i class="material-icons">groups</i><span>Classes</span></a>
            </li>

            <li class="">
                <a href="subject-crd.php"><i class="material-icons">badge</i><span>Subjects</span></a>
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

                    <a class="navbar-brand" href="#"> Admin Dashboard </a>

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
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>


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
