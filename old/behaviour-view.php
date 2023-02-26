<?php include "admin-navbar.php" ?>

<?php
include "./config/connection.php";
$result = mysqli_query($conn, "SELECT behavior.behavior_id,
       student.student_id,
       user1.firstname AS student_firstname,
       user1.lastname  AS student_lastname,
       user2.firstname AS teacher_firstname,
       user2.lastname  AS teacher_lastname,
       subject.name    AS subject_name,
       behavior.behavior1,
       behavior.behavior2,
       behavior.behavior3,
       behavior.behavior4
FROM casechcom.behavior
         JOIN casechcom.student ON behavior.student_id = student.student_id
         JOIN casechcom.subject ON behavior.subject_id = subject.subject_id
         JOIN casechcom.teacher ON behavior.teacher_id = teacher.teacher_id
         JOIN casechcom.user user1 ON student.user_id = user1.user_id
         JOIN casechcom.user user2 ON teacher.user_id = user2.user_id");
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <strong class="card-title"><h2 align="center">Behaviour</h2></strong>
                        </div>
                        <div class="card-body">
                            <div class="" role="alert"></div>
                            <table id="datatableid" width="150" class="table table-hover table-bordered" id="list">
                                <colgroup align="center">
                                    <col width="30%">
                                    <col width="30%">
                                    <col width="30%">
                                    <col width="30%">
                                    <col width="30%">
                                </colgroup>
                                <thead>
                                <tr align="center">
                                    <th>Behaviour ID</th>
                                    <th>Student Name</th>
                                    <th>Subject Name</th>
                                    <th>Teacher Name</th>
                                    <th>Maka Diyos</th>
                                    <th>Makatao</th>
                                    <th>Maka-Kalikasan</th>
                                    <th>Makabansa</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($rows > 0) {
                                    foreach ($rows as $row) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['behavior_id']; ?></td>
                                            <td class="text-center"><?php echo $row['student_firstname'] . " " . $row['student_lastname']; ?></td>
                                            <td class="text-center"><?php echo $row['subject_name']; ?></td>
                                            <td class="text-center"><?php echo $row['teacher_firstname'] . " " . $row['teacher_lastname']; ?></td>
                                            <td class="text-center"><?php echo $row['behavior1']; ?></td>
                                            <td class="text-center"><?php echo $row['behavior2']; ?></td>
                                            <td class="text-center"><?php echo $row['behavior3']; ?></td>
                                            <td class="text-center"><?php echo $row['behavior4']; ?></td>

                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="behavior-edit.php?id=<?php echo $row['behavior_id']; ?>"
                                                       class="btn btn-primary btn-flat delete_student">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="behavior-delete.php?id=<?php echo $row['behavior_id']; ?>"
                                                       class="btn btn-danger btn-flat delete_student">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php

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