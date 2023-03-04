<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
</head>
<body>
<h1>Attendance Report</h1>

<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "database");

// Retrieve the attendance data
$sql = "SELECT students.name, attendance.date, attendance.status, attendance.remarks FROM students INNER JOIN attendance ON students.id = attendance.student_id ORDER BY attendance.date DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Student Name</th><th>Date</th><th>Status</th><th>Remarks</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . ucfirst($row["status"]) . "</td>";
        echo "<td>" . $row["remarks"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No attendance records found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>
