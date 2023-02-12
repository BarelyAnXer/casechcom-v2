<?php
session_start();

//$user = unserialize($_SESSION['user']);

// if (isset($_SESSION['user'])) {
//     echo '<h6> Welcome ' . $user['firstName'] . '</h6>';
//     echo '<a href="logout.php">logout</a>';
// } else {
//     echo '<h6> oops looks like you are trying to access unrestricted page</h6>';
// }

?>
<!DOCTYPE html>
<head>
 
    <title>Student Profile</title>
 
     <link rel="stylesheet" href="css/Styletwo.css">

</head>
<body>

<?php include "student-navbar.php" ?>

       <div class="stylediv">
    
            <a href="myprofile.php"> <img src="images/StudentProf.png" width="400" height="300"></a>
        
    
            <a href="#"> <img src="images/Schoolfees.png" width="400" height="300" ></a>
    

            <a href="#"> <img src="images/Attendance.png" width="400" height="300" ></a>

            <a href="#"> <img src="images/Behavior.png" width="400" height="300" ></a>


            <a href="#"> <img src="images/Gradesview.png" width="400" height="300" ></a>


            <a href="digital-libraries.php"> <img src="images/DigitalLibrary.png" width="400" height="300" ></a>

       </div>

</body>
</html>