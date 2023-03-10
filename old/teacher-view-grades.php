<?php include "teacher-navbar.php" ?>

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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
        <link rel="stylesheet" href="css/Styletwo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
                            <table id="studentsgradedata" width="150" class="table table-hover table-bordered" id="list">
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
                                        if ($row['isDeleted'] != 1) {
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
                                                        <a href="grade-edit.php?id=<?php echo $row['grade_id']; ?>"
                                                           class="btn btn-primary btn-flat delete_student">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        <a href="grade-delete.php?id=<?php echo $row['grade_id']; ?>"
                                                           class="btn btn-danger btn-flat delete_student">
                                                            <i class="material-icons">delete</i>
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

    <script type="text/javascript" language="javascript" >
        $(document).ready(function(){

            $('#studentsgradedata').DataTable({
                "processing" : true,
                "serverSide" : true,
                "ajax" : {
                    url:"fetch.php",
                    type:"POST"
                },
                dom: 'lBfrtip',
                buttons: [
                    'excel', 'csv', 'pdf', 'copy'
                ],
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
            });

        });

    </script>



<?php include "footer.php" ?>