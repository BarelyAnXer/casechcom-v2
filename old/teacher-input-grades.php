<?php include "teacher-navbar.php" ?>

<!-- Fields for The PHP layout of the inputing the grades-->
<?php
include("./config/connection.php");

if (isset($_POST['save'])) {
    $teacher_id = $_POST['teacher_id'];
    $classes_id = $_POST['classes_id'];
    $subject_id = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $grade1 = $_POST['grade1'];
    $grade2 = $_POST['grade2'];
    $grade3 = $_POST['grade3'];
    $grade4 = $_POST['grade4'];

    $grade_sql = "insert into grade (student_id, subject_id, classes_id, teacher_id, gradeq2, gradeq3, gradeq4, gradeq1)
values ('$student_id', '$subject_id', '$classes_id', '$teacher_id', '$grade1', '$grade2', '$grade3', '$grade4')";
    if (mysqli_query($conn, $grade_sql)) {
//        echo "New grade record created successfully";
    } else {
        echo "Error: " . $grade_sql . "<br>" . $conn->error;
    }
}
?>
<!-- Area for The HTML layout of the inputing the grades-->
<html>

<body>

<script>
    function getSubjects(classes_id) {
        let teacher_selected = document.getElementById("teacher");
        let teacher_id = teacher_selected.value;
        console.log(teacher_id, classes_id, "asdasa")
        $.ajax({
            type: "POST",
            url: "getSubjects.php",
            data: {
                teacher_id: teacher_id,
                classes_id: classes_id,
            },
            success: function (data) {
                $("#subject").html(data);
            }
        });

        $.ajax({
            type: "POST",
            url: "getStudents.php",
            data: {
                classes_id: classes_id,
            },
            success: function (data) {
                $("#student").html(data);
            }
        });
    }
</script>


<?php
$user = unserialize($_SESSION['user']);
$id = $user['user_id'];
$sql = "select user.user_id as user_user_id, t.teacher_id as teacher_id from user join teacher t on user.user_id = t.user_id where t.user_id ='$id'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($res);
$teacher_id = $row[0];
$user_id = $row[1];


$result = mysqli_query($conn, "SELECT DISTINCT t.teacher_id, c.name, c.classes_id FROM teaches t JOIN classes c ON t.classes_id = c.classes_id WHERE t.teacher_id = '$user_id'");
$classes = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<form class="form-horizontal well span4" action="" method="POST">

    <fieldset>
        <legend>Add Grades</legend>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">Subject class</label>

                <input type="text" hidden="" id="teacher" value="<?php echo $user_id ?>">
                <input type="text" hidden="" name="teacher_id" id="teacher" value="<?php echo $user_id ?>">

                <div class="col-md-8">
                    <select name="classes_id" id="classes" onchange="getSubjects(this.value)">
                        <?php
                        echo "<option value=''>---Select classes---</option>";
                        foreach ($classes as $classe) {
                            echo "<option value='" . $classe['classes_id'] . "'>" . $classe['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">select subject</label>

                <div class="col-md-8">
                    <select name="subject_id" id="subject">
                        <option value=''>---Select Subject---</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">select student</label>

                <div class="col-md-8">
                    <select name="student_id" id="student">
                        <option value="">---Select Student---</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="first">First Grading</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="first" name="grade1" type="text" value="" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="second">Second Grading</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="second" name="grade2" type="text" value="" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="third">Third Grading</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="third" name="grade3" type="text" value="" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="fourth">Fourth Grading</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="fourth" name="grade4" type="text" value="" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="idno"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="save" type="submit">Save</button>
                </div>
            </div>
        </div>
    </fieldset>

</form>
</div>


</body>
</html>


