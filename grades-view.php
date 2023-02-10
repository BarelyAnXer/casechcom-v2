<?php include "./config/connection.php"; ?>


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

        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>subject name</th>
                <th>grade 1</th>
                <th>grade 2</th>
                <th>grade 3</th>
                <th>grade 4</th>
                <th>average</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $result = mysqli_query($conn, "select *
from grade
         join student s on grade.student_id = s.student_id
         join user u on s.user_id = u.user_id
        join subject s2 on s2.subject_id = grade.subject_id");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['grade_id']; ?></td>
                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                        <!--                        <td>--><?php //echo $row['classes_name']; ?><!--</td>-->
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['gradeq1']; ?></td>
                        <td><?php echo $row['gradeq2']; ?></td>
                        <td><?php echo $row['gradeq3']; ?></td>
                        <td><?php echo $row['gradeq4']; ?></td>
                        <td>average</td>
                        <td>
                            <a href="./grades-edit.php?id=<?php echo $row['grade_id']; ?>">EDIT</a>
                            <a href="./grades-delete.php?id=<?php echo $row['grade_id']; ?>">DELETE</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>

        <input type="submit" value="View Grades" name="register">
    </form>
</div>

