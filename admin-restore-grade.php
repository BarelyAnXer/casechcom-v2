<?php include "admin-navbar.php" ?>

<!--Fields for restoring the information of the grades in the database-->
    <!--This is intended for the PHP flow-->
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
    <!--Layout for HTML restoring the information of the grades in the database-->
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <strong class="card-title"><h2 align="center"> Grades Result</h2></strong>
                        </div>
                        <div class="card-body">
                            <div class="" role="alert"></div>
                            <table id="datatableid" width="150" class="table tabe-hover table-bordered" id="list">
                                <colgroup align="center">
                                    <col width="30%">
                                    <col width="30%">
                                    <col width="30%">
                                    <col width="30%">
                                    <col width="30%">
                                </colgroup>
                                <thead>
                                <tr align="center">
                                    <th>Grade ID</th>
                                    <th>Student Name</th>
                                    <th>Subject Name</th>
                                    <th>Teacher Name</th>
                                    <th>1st Quarter</th>
                                    <th>2nd Quarter</th>
                                    <th>3rd Quarter</th>
                                    <th>4th Quarter</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($rows > 0) {
                                    foreach ($rows as $row) {
                                        if ($row['isDeleted'] == 1) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $row['grade_id']; ?></td>
                                                <td class="text-center"><?php echo $row['student_firstname'] . " " . $row['student_lastname']; ?></td>
                                                <td class="text-center"><?php echo $row['subject_name']; ?></td>
                                                <td class="text-center"><?php echo $row['teacher_firstname'] . " " . $row['teacher_lastname']; ?></td>
                                                <td class="text-center"><?php echo $row['gradeq1']; ?></td>
                                                <td class="text-center"><?php echo $row['gradeq2']; ?></td>
                                                <td class="text-center"><?php echo $row['gradeq3']; ?></td>
                                                <td class="text-center"><?php echo $row['gradeq4']; ?></td>

                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="grade-restore.phpd=<?php echo $row['grade_id']; ?>"
                                                           class="btn btn-danger btn-flat delete_student">
                                                            <i class="material-icons">Restore</i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    </html>

<?php include "footer.php" ?>