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
    <?php
    $sql = "";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<form method='post'>";
        echo "<table>";
        echo "<tr><th>Student Name</th><th>Attendance</th><th>Remarks</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>";
            echo "<input type='radio' name='attendance[" . $row["id"] . "][status]' value='late'> Late";
            echo "<input type='radio' name='attendance[" . $row["id"] . "][status]' value='absent'> Absent";
            echo "</td>";
            echo "<td><input type='text' name='attendance[" . $row["id"] . "][remarks]' placeholder='Remarks'></td>";
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




