<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
    $schoolyearid = $_POST['schoolyearid'];
    $totaldays = $_POST['totaldays'];
    $monthname = $_POST['monthname'];

    $user_sql = "";

    if (mysqli_query($conn, $user_sql)) {
        header("Location: registrar-schoolmonth-create.php");
    } else {
        echo "Error: " . $person_sql . "<br>" . $conn->error;
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
    <label for="">school year</label>
    <select name="teacher_id">
        <?php
        $teaches_sql = "select * from school_year";
        $res = mysqli_query($conn, $teaches_sql);
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <option value="<?php echo $row['school_year_id'] ?>"><?php echo $row['school_year_session'] ?></option>
                <?php
            }
        }
        ?>
    </select>
    <br>
    <label for="">date</label>
    <input type="date"><br>
    <br>
    <br>
    <br>
    <label for="date">Select a date:</label>
    <input type="date" name="date" id="date" min="2022-01-01" max="2023-12-31">

    <?php
    $sql = "select *
from user
         join student s on user.user_id = s.student_user_id
         join classes c on c.classes_id = s.student_classes_id
where user_level = 'student'
  and classes_id = '3';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<form method='post'>";
        echo "<table>";
        echo "<tr><th>Student Name</th><th>Attendance</th><th>Remarks</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["user_firstname"] . " " . $row["user_lastname"] . "</td>";
            echo "<td>";
            echo "<input type='radio' name='attendance[" . $row["user_id"] . "][status]' value='late'> Late";
            echo "<input type='radio' name='attendance[" . $row["user_id"] . "][status]' value='absent'> Absent";
            echo "</td>";
            echo "<td><input type='text' name='attendance[" . $row["user_id"] . "][remarks]' placeholder='Remarks'></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<input type='submit' value='Save Attendance'>";
        echo "</form>";
    }

    ?>
</div>

</body>
</html>

<?php include "footer.php" ?>




