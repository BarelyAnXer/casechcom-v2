<?php
session_start();

$user = unserialize($_SESSION['user']);

?>
<!DOCTYPE html>
<head>
 
    <title>Student Profile</title>
 
     <link rel="stylesheet" href="css/Styletwo.css">

</head>
<body>

<?php include "student-navbar.php" ?>
<br>
       <div class="stylediv">
           <?php
           if (isset($_SESSION['user'])) {
               echo '<h6> Welcome ' . $user['firstname'] . '</h6>';
           } else {
               echo '<h6> oops looks like you are trying to access unrestricted page</h6>';
           }
           ?>

           <a href="myprofile.php"> <img src="images/StudentProf.png" width="400" height="300"></a>
        
    
            <a href="student-view-fees.php"> <img src="images/Schoolfees.png" width="400" height="300" ></a>
    

            <a href="student-view-attendance.php"> <img src="images/Attendance.png" width="400" height="300" ></a>

            <a href="student-view-behavior.php"> <img src="images/Behavior.png" width="400" height="300" ></a>


            <a href="student-view-grades.php"> <img src="images/Gradesview.png" width="400" height="300" ></a>

            <a href="digital-libraries.php"> <img src="images/DigitalLibrary.png" width="400" height="300" ></a>

       </div>

</body>
</html>