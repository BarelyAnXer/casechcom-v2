<!DOCTYPE html>
<html>
<head>
    <title>Attendance System</title>
</head>
<body>
<h1>Attendance System</h1>

<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "database");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through each student and update the attendance record
    foreach ($_POST["attendance"] as $id => $attendance) {
        $status = $attendance["status"];
        $remarks = mysqli_real_escape_string($conn, $attendance["remarks"]);
        $sql = "INSERT INTO attendance (student_id, date, status, remarks) VALUES ('$id', NOW(), '$status', '$remarks')";
        mysqli_query($conn, $sql);
    }
    echo "<p>Attendance records saved successfully!</p>";
}

// Display the form
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<form method='post'>";
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Attendance</th><th>Remarks</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>";
        echo "<input type='radio' name='attendance[" . $row["id"] . "][status]' value='present' required> Present";
        echo "<input type='radio' name='attendance[" . $row["id"] . "][status]' value='late'> Late";
        echo "<input type='radio' name='attendance[" . $row["id"] . "][status]' value='absent'> Absent";
        echo "</td>";
        echo "<td><input type='text' name='attendance[" . $row["id"] . "][remarks]' placeholder='Remarks'></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<input type='submit' value='Save Attendance'>";
    echo "</form>";
} else {
    echo "<p>No students found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>