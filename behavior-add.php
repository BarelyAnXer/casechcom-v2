<?php include "admin-navbar.php" ?>

<!-- Fields for The PHP layout of the inputing the grades-->
<?php
include("./config/connection.php");

if (isset($_POST['save'])) {
    $teacher_id = $_POST['teacher_id'];
    $classes_id = $_POST['classes_id'];
    $subject_id = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $behavior1 = $_POST['behavior1'];
    $behavior2 = $_POST['behavior2'];
    $behavior3 = $_POST['behavior3'];
    $behavior4 = $_POST['behavior4'];

    $behavior_sql = "insert into behavior (student_id, subject_id, teacher_id, behavior1, behavior2, behavior3, behavior4)
values ('$student_id', '$subject_id', '$teacher_id', '$behavior1', '$behavior2', '$behavior3', '$behavior4')";
    if (mysqli_query($conn, $behavior_sql)) {
        echo "New grade record created successfully";
    } else {
        echo "Error: " . $behavior_sql . "<br>" . $conn->error;
    }
}
?>
<!-- Area for The HTML layout of the inputing the grades-->
<html>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

<form class="form-horizontal well span4" action="" method="POST">

    <fieldset>
        <div class="form-group">
            <div class="col-md-8">

                <label class="col-md-4 control-label" for="subjdesc">Name</label>

                <div class="col-md-8">
                    <select name="teacher_id" onchange="getClasses(this.value)" id="teacher">
                        <option value="">---Select Teacher---</option>
                        <?php
                        $behavior_sql = "SELECT * FROM user JOIN teacher t on user.user_id = t.user_id";
                        $res = mysqli_query($conn, $behavior_sql);
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
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">Subject class</label>

                <div class="col-md-8">
                    <select name="classes_id" id="classes" onchange="getSubjects(this.value)">
                        <option value="">---Select Class---</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">select subject</label>

                <div class="col-md-8">
                    <select name="subject_id" id="subject">
                        <option value="">---Select Subject---</option>
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
                <label class="col-md-4 control-label" for="first">MakaDiyos</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="first" name="behavior1" type="text" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="second">Makatao</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="second" name="behavior2" type="text" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="third">Maka-kalikasan</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="third" name="behavior3" type="text" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="fourth">Makabansa</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="fourth" name="behavior4" type="text" value="">
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


