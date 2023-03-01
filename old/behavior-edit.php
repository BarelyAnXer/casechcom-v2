<!-- Fields for The PHP layout of the inputing the grades-->
<?php
include("./config/connection.php");

$id = $_GET['id'];

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
         JOIN casechcom.user user2 ON teacher.user_id = user2.user_id where behavior_id = '$id'");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$row = $rows[0];


if (isset($_POST['Update'])) {

    $behavior1 = mysqli_real_escape_string($conn, $_POST['behavior1']);
    $behavior2 = mysqli_real_escape_string($conn, $_POST['behavior2']);
    $behavior3 = mysqli_real_escape_string($conn, $_POST['behavior3']);
    $behavior4 = mysqli_real_escape_string($conn, $_POST['behavior4']);

    $sql = "update behavior set behavior1 = '$behavior1',behavior2 = '$behavior2',behavior3 = '$behavior3',behavior4 = '$behavior4' where behavior_id = '$id' ";
    mysqli_query($conn, $sql);
    header("Location: behaviour-view.php");
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
        <div class="form-group">
            <div class="col-md-8">

                <label class="col-md-4 control-label" for="subjdesc">Teacher Name</label>

                <div class="col-md-8">
                    <input type="text" name=""
                           value="<?php echo $row['teacher_firstname'] . " " . $row['teacher_lastname'] ?>" disabled>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">Subject Name</label>

                <div class="col-md-8">
                    <input type="text" name="" value="<?php echo $row['subject_name'] ?>" disabled>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="">Student Name</label>

                <div class="col-md-8">
                    <input type="text" name=""
                           value="<?php echo $row['student_firstname'] . " " . $row['student_lastname'] ?>" disabled>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="first">MakaDiyos</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="first" name="behavior1" type="text"
                           value="<?php echo $row['behavior1'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="second">Makatao</label>

                <div class="col-md-8">
                    <input class="form-control input-sm" id="second" name="behavior2" type="text"
                           value="<?php echo $row['behavior2'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="third">Maka-kalikasan</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="third" name="behavior3" type="text"
                           value="<?php echo $row['behavior3'] ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="fourth">Makabansa</label>
                <div class="col-md-8">
                    <input class="form-control input-sm" id="fourth" name="behavior4" type="text"
                           value="<?php echo $row['behavior4'] ?>">
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


