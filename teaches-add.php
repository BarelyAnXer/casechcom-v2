<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
    $teacher_id = $_POST['teacher_id'];
    $classes_id = $_POST['classes_id'];
    $subject_id = $_POST['subject_id'];


    $teaches_sql = "INSERT INTO teaches (teacher_id, subject_id, classes_id) VALUES ('$teacher_id', '$subject_id', '$classes_id')";

    if (mysqli_query($conn, $teaches_sql)) {
        echo "New student record created successfully";
    } else {
        echo "Error: " . $person_sql . "<br>" . $conn->error;
    }


}

?>

<?php include "admin-navbar.php" ?>

<div class="content">
    <h1>teahces</h1>
    <form action="" method="post">
        <span>teacher</span>
        <select name="teacher_id">
            <?php
            $teaches_sql = "SELECT * FROM user JOIN teacher t on user.user_id = t.user_id";
            $res = mysqli_query($conn, $teaches_sql);
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

        <span>class</span>
        <select name="classes_id">
            <?php
            $teaches_sql = "SELECT * FROM classes";
            $res = mysqli_query($conn, $teaches_sql);
            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row['classes_id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <br>

        <span>subject</span>
        <select name="subject_id">
            <?php
            $teaches_sql = "SELECT * FROM subject";
            $res = mysqli_query($conn, $teaches_sql);
            $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <br>

        <input type="submit" value="register" name="register">
    </form>
</div>

