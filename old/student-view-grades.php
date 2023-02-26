<?php include "student-navbar.php" ?>
<?php
include "./config/connection.php";
$result = mysqli_query($conn, "SELECT grade.grade_id,
       student.student_id,
       user1.firstname AS student_firstname,
       user1.lastname AS student_lastname,
       user2.firstname AS teacher_firstname,
       user2.lastname AS teacher_lastname,
       subject.name AS subject_name,
       grade.gradeq1,
       grade.gradeq2,
       grade.gradeq3,
       grade.gradeq4,
       isDeleted
FROM casechcom.grade
         JOIN casechcom.student ON grade.student_id = student.student_id
         JOIN casechcom.subject ON grade.subject_id = subject.subject_id
         JOIN casechcom.teacher ON grade.teacher_id = teacher.teacher_id
         JOIN casechcom.user user1 ON student.user_id = user1.user_id 
         JOIN casechcom.user user2 ON teacher.user_id = user2.user_id;");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



    <html>

    <head>
        <link rel="stylesheet" href="css/Styletwo.css">
    </head>

    <body>

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                    </div> <!-- .card -->
                </div><!--/.col-->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title"><h2 align="center"> Grades Result</h2></strong>
                        </div>
                        <div class="card-body">
                            <div class="" role="alert"></div>
                            <table  class="table table-hover table-striped table-bordered" border="2px" bgcolor="black" align="center" >
                                <thead 	align="center" bgcolor="lightblue";  width="800">
                                <tr>
                                    <th width="100">#</th>
                                    <th width="100">Subject Name</th>
                                    <th width="100">1st Quarter</th>
                                    <th width="100">2nd Quarter</th>
                                    <th width="100">3rd Quarter</th>
                                    <th width="100">4th Quarter</th>
                                    <th width="100">Final Grade</th>
                                    <th width="100">Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr align="center">
                                    <td bgcolor="white">001</td>
                                    <td bgcolor="white">Basic Math</td>
                                    <td bgcolor="white">97</td>
                                    <td bgcolor="white">95</td>
                                    <td bgcolor="white">96</td>
                                    <td bgcolor=" white">98</td>
                                    <td bgcolor="white ">97</td>
                                    <td bgcolor="white">PASSED</td>
                                </tr>
                                <tr align="center">
                                    <td bgcolor=" white">002</td>
                                    <td bgcolor="white ">Basic English</td>
                                    <td bgcolor="white ">97</td>
                                    <td bgcolor="white ">95</td>
                                    <td bgcolor="white">96</td>
                                    <td bgcolor="white">98</td>
                                    <td bgcolor="white ">97</td>
                                    <td bgcolor=" white">PASSED</td>
                                </tr>
                                <tr align="center">
                                    <td bgcolor="white ">003</td>
                                    <td bgcolor="white ">Basic Filipino</td>
                                    <td bgcolor="white ">97</td>
                                    <td bgcolor="white ">95</td>
                                    <td bgcolor="white ">96</td>
                                    <td bgcolor="white ">98</td>
                                    <td bgcolor="white ">97</td>
                                    <td bgcolor=" white">PASSED</td>
                                </tr>
                                <tr align="center">
                                    <td bgcolor="white ">004</td>
                                    <td bgcolor=" white">Basic Music</td>
                                    <td bgcolor="white ">97</td>
                                    <td bgcolor="white ">95</td>
                                    <td bgcolor="white">96</td>
                                    <td bgcolor="white">98</td>
                                    <td bgcolor="white">97</td>
                                    <td bgcolor=" white">PASSED</td>
                                </tr>
                                <tr align="center">
                                    <td colspan="6" bgcolor="white"> General Weighted Average: </td>


                                    <td bgcolor="white"> 97</td>
                                    <td bgcolor="lightgreen">PASSED</td>
                                </tr>
                                </tbody>
                            </table>

    </body>
    </html>

<?php include "footer.php" ?>