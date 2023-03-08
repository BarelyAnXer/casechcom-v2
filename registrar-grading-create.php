<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $quarter = $_POST['quarter'];
    $grade = $_POST['grade'];


    $user_sql = "insert into grade (grade_student_id, grade_school_year_id, grade_subject_id, grade_quarter, grade)
values ('$student_id', 1, '$subject_id', '$quarter', '$grade');";

    if (mysqli_query($conn, $user_sql)) {
//        $teacher_id = $conn->insert_id;
//        if ($conn->query($teacher_sql) === TRUE) {
        echo "New teacher record created successfully";
        header("Location: registrar-teacher-add.php");
//        } else {
////            echo "Error: " . $teacher_sql . "<br>" . $conn->error;
//        }

    } else {
//        echo "Error: " . $person_sql . "<br>" . $conn->error;
    }


}

?>

<?php include "registrar-navbar.php" ?>

<html>
<head>

    <link rel="stylesheet" href="css/Styletwo.css">

</head>
<body>


<div class="col-lg-12">
    <form action="" method="post">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <form action="" id="manage-student">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="msg" class=""></div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Student</label>
                                    <select name="student_id" class="custom-select custom-select-sm" required>
                                        <?php
                                        $user_sql = "select * from user join student s on user.user_id = s.student_user_id";
                                        $res = mysqli_query($conn, $user_sql);
                                        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
                                        if ($rows > 0) {
                                            foreach ($rows as $row) {
                                                ?>
                                                <option value="<?php echo $row['student_id'] ?>"><?php echo $row['user_firstname'] . " " . $row['user_lastname'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Quarter</label>
                                    <select name="quarter" id="" class="custom-select custom-select-sm" required>
                                        <option value="Q1">1st Quarter</option>
                                        <option value="Q2">2nd Quarter</option>
                                        <option value="Q3">3rd Quarter</option>
                                        <option value="Q4">4th Quarter</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--// student , quarter , subject-->
                        <!--                        // school year automatic from active-->


                        <div class="col-md-6">
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Learning Area</label>
                                    <select name="subject_id" class="custom-select custom-select-sm" required>
                                        <?php
                                        $user_sql = "select * from subject";
                                        $res = mysqli_query($conn, $user_sql);
                                        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
                                        if ($rows > 0) {
                                            foreach ($rows as $row) {
                                                ?>
                                                <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['subject_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group text-dark">
                                    <div class="form-group">
                                        <label for="" class="control-label">Grade</label>
                                        <input type="number" class="form-control form-control-sm" name="grade" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>

            </div>
            <div class="card-footer border-top border-info">
                <input style="height: 40px; width:150px; float: right; border-radius : 22px; border-color:blueviolet;"
                       type="submit" value="Save" name="register">
                <div class="d-flex w-100 justify-content-center align-items-center">
                </div>
            </div>
        </div>

    </form>
</div>

</body>
</html>

<?php include "footer.php" ?>




