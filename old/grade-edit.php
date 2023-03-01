<!-- Fields for The PHP layout of the inputing the grades-->
<?php
include("./config/connection.php");

$id = $_GET['id'];

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
         JOIN casechcom.user user2 ON teacher.user_id = user2.user_id where grade_id ='$id';");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$row = $rows[0];


if (isset($_POST['Update'])) {

    $grade1 = mysqli_real_escape_string($conn, $_POST['grade1']);
    $grade2 = mysqli_real_escape_string($conn, $_POST['grade2']);
    $grade3 = mysqli_real_escape_string($conn, $_POST['grade3']);
    $grade4 = mysqli_real_escape_string($conn, $_POST['grade4']);

    $sql = "update grade set gradeq1 = '$grade1', gradeq2 = '$grade2', gradeq3 = '$grade3',gradeq4 = '$grade4' where grade_id = '$id' ";
    mysqli_query($conn, $sql);
    header("Location: admin-view-grades.php");
}

?>

<!-- Area for The HTML layout of the inputing the grades-->

<?php include "registrar-navbar.php" ?>


<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

<form class="form-horizontal well span4" action="" method="POST">

    <fieldset>
        <legend>Add Grades</legend>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="subjdesc">Teacher Name</label>
                <div class="col-md-8">
                    <input type="text" value="<?php echo $row['teacher_firstname'] . " " . $row['teacher_lastname'] ?>"
                           disabled>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">Subject Name</label>
                <div class="col-md-8">
                    <input type="text" value="<?php echo $row['subject_name'] ?>"
                           disabled>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">Student Name</label>
                <div class="col-md-8">
                    <input type="text" value="<?php echo $row['student_firstname'] . " " . $row['student_lastname'] ?>"
                           disabled>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="first">First Grading</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="first" name="grade1" type="text"
                           value="<?php echo $row['gradeq1'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="second">Second Grading</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="second" name="grade2" type="text"
                           value="<?php echo $row['gradeq2'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="third">Third Grading</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="third" name="grade3" type="text"
                           value="<?php echo $row['gradeq3'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="fourth">Fourth Grading</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="fourth" name="grade4" type="text"
                           value="<?php echo $row['gradeq4'] ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="idno"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="Update" type="submit">Update</button>
                </div>
            </div>
        </div>
    </fieldset>

</form>
</div>


</body>
</html>


