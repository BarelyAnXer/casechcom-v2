<?php
include "config/connection.php";

?>


<?php include "sidebar.php" ?>

<div class="content">
    <h1>grades</h1>
    <form action="" method="post">
        <span>subject</span>
        <select name="subject_id">
            <?php
            $classes_sql = "SELECT DISTINCT t.teacher_id, s.name, s.subject_id FROM teaches t JOIN subject s ON t.subject_id = s.subject_id WHERE t.teacher_id = 37";
            $res = mysqli_query($conn, $classes_sql);
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
        <br>

        <span>classes</span>
        <select name="classes_id">
            <?php
            $classes_sql = "SELECT DISTINCT t.teacher_id, c.name, c.classes_id
FROM teaches t
JOIN classes c ON t.classes_id = c.classes_id
WHERE t.teacher_id = 37;";
            $res = mysqli_query($conn, $classes_sql);
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
        <br>
        <br>
        <br>

        <input type="submit" value="View Grades" name="register">
    </form>
</div>

