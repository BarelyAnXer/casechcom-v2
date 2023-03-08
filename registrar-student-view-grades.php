<?php include "registrar-navbar.php" ?>
<?php
include "./config/connection.php";
$result = mysqli_query($conn, "select * from student join user u on u.user_id = student.student_user_id;");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


$student_id = $_GET['id'];

?>

<html>

<head>
    <title>Report Card</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <!-- Add Bootstrap CSS -->
</head>

<body>

<?php

// get school year

$schoolyear_sql = "select * from school_year where school_year_is_active = '1'";
$result = mysqli_query($conn, $schoolyear_sql);
$rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$schoolyear = $rows2[0]['school_year_id'];

//$student_id = 11; // Replace with actual student ID
$student_query = "select *
from student
         join user u on u.user_id = student.student_user_id
         join classes c on student.student_classes_id = c.classes_id
where student_id = $student_id;";
$student_result = mysqli_query($conn, $student_query);
$student_data = mysqli_fetch_assoc($student_result);

// Get grade information
$grade_query = "SELECT s.student_id, s.student_guardian_firstname, s.student_guardian_middlename, s.student_guardian_lastname,
       c.classes_name, sub.subject_name, sq.grade, sq.grade, sq.grade_quarter
FROM casechcom.student s
INNER JOIN casechcom.classes c ON s.student_classes_id = c.classes_id
INNER JOIN casechcom.grade sq ON s.student_id = sq.grade_student_id
INNER JOIN casechcom.subject sub ON sq.grade_subject_id = sub.subject_id
WHERE s.student_id = $student_id AND sq.grade_school_year_id = $schoolyear";
$grade_result = mysqli_query($conn, $grade_query);


// Output report card
echo "<br>";
echo "<h2 class='mb-3 text-center'>Student Grades Information</h2>";
echo "<div class='card mb-3'>";
echo "<div class='card-body'>";
echo "<h3 class='card-title'>" . $student_data['user_firstname'] . " " . $student_data['user_lastname'] . "</h3>";
echo "<p class='card-text'><strong>Class:</strong> " . $student_data['classes_name'] . "</p>";
echo "</div>";
echo "</div>";


echo "<div class='card'>";
echo "<div class='card-body'>";
echo "<div class='table-responsive'>";

echo "<table class='table table-striped' id='gradesTable'>";
echo "<thead><tr><th>Subject</th><th>1st Quarter</th><th>2nd Quarter</th><th>3rd Quarter</th><th>4th Quarter</th><th>Final Grade</th></tr></thead>";
echo "<tbody>";

$subjects = array();

$grades = array();
while ($row = mysqli_fetch_assoc($grade_result)) {
    $grades[$row['subject_name']][$row['grade_quarter']] = $row['grade'];
}


foreach ($grades as $subject_name => $subject_grades) {
    echo "<tr>";
    echo "<td>$subject_name</td>";
    foreach (range(1, 4) as $quarter) {
        echo "<td>" . ($subject_grades["Q$quarter"] ?? '') . "</td>";
    }
    $average = array_sum($subject_grades) / count($subject_grades);
    echo "<td>" . round($average, 2) . "</td>";
    echo "</tr>";
}

while ($grade_data = mysqli_fetch_assoc($grade_result)) {
    $subject = $grade_data['subject_name'];
    if (!array_key_exists($subject, $subjects)) {
        $subjects[$subject] = array(
            '1st Quarter' => '-',
            '2nd Quarter' => '-',
            '3rd Quarter' => '-',
            '4th Quarter' => '-',
            'Final Grade' => '-'
        );
    }
    $quarter = $grade_data['grade'];
    $subjects[$subject][$quarter] = $grade_data['grade'];
}
foreach ($subjects as $subject => $grades) {
    echo "<tr><td>$subject</td><td>" . $grades['1st Quarter'] . "</td><td>" . $grades['2nd Quarter'] . "</td><td>" . $grades['3rd Quarter'] . "</td><td>" . $grades['4th Quarter'] . "</td><td>" . $grades['Final Grade'] . "</td></tr>";
}

echo "</tbody>";
echo "</table>";

echo "</div>";
echo "</div>";
echo "</div>";

?>

</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>



