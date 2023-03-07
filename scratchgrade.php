<?php
include "config/connection.php";

// Get student information
$student_id = 2; // Replace with actual student ID
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
WHERE s.student_id = $student_id";
$grade_result = mysqli_query($conn, $grade_query);

// Output report card
echo "<h1>Report Card for " . $student_data['user_firstname'] . " " . $student_data['user_lastname'] . "</h1>";
echo "<h2>Class: " . $student_data['classes_name'] . "</h2>";
echo "<table>";
echo "<tr><th>Subject</th><th>1st Quarter</th><th>2nd Quarter</th><th>3rd Quarter</th><th>4th Quarter</th><th>Final Grade</th></tr>";

$subjects = array();

$grades = array();
while ($row = mysqli_fetch_assoc($grade_result)) {
    $grades[$row['subject_name']][$row['grade_quarter']] = $row['grade'];
}

//echo '<pre>' . var_export($grades, true) . '</pre>';

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
    echo "<tr><td>$subject</td><td>" . $grades['1st Quarter'] . "</td><td>" . $grades['2nd Quarter'] . "</td><td>" . $grades['3rd Quarter'] . "</td><td>" . $grades['4th Quarter'] . "</td><td>" . $grades['Final Grade'];

}