<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
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
        echo "New grade record created successfully";
    } else {
        echo "Error: " . $grade_sql . "<br>" . $conn->error;
    }
}
?>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function getClasses(teacher_id) {
            $.ajax({
                type: "POST",
                url: "getClasses.php",
                data: {'teacher_id': teacher_id},
                success: function (data) {
                    $("#classes").html(data);
                }
            });

        }

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
</head>

<?php include "sidebar.php" ?>


<div class="content">
    <h1>Grades add</h1>
    <form action="" method="POST">
        <span>teacher</span>
        <select name="teacher_id" onchange="getClasses(this.value)" id="teacher">
            <option value="">---Select Teacher---</option>
            <?php
            $grade_sql = "SELECT * FROM user JOIN teacher t on user.user_id = t.user_id";
            $res = mysqli_query($conn, $grade_sql);
            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row['teacher_id'] ?>"><?php echo $row['firstname'] . " " . $row['lastname'] ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <br>


        <span>classes</span>
        <select name="classes_id" id="classes" onchange="getSubjects(this.value)">
            <option value="">---Select Class---</option>
        </select>
        <br>

        <span>subject</span>
        <select name="subject_id" id="subject">
            <option value="">---Select Subject---</option>
        </select>
        <br>

        <span>student</span>
        <select name="student_id" id="student">
            <option value="">---Select Student---</option>
        </select>
        <br>

        <br>
        <br>
        <br>

        <label for="">Q1</label> <input type="text" name="grade1"><br>
        <label for="">Q2</label> <input type="text" name="grade2"><br>
        <label for="">Q3</label> <input type="text" name="grade3"><br>
        <label for="">Q4</label> <input type="text" name="grade4"><br>

        <br>
        <br>

        <input type="submit" value="register" name="register">
    </form>
</div>

