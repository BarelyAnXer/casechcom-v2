<!DOCTYPE html>
<html>
<head>
    <title>Attendance System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Attendance System</h2>
    <form method="post" action="save_attendance.php">
        <div class="form-group">
            <label for="school_year">School Year:</label>
            <select class="form-control" id="school_year" name="school_year">
                <option value="">Select School Year</option>
                <option value="2022-2023">2022-2023</option>
                <option value="2023-2024">2023-2024</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="form-group">
            <label for="school_month">School Month:</label>
            <select class="form-control" id="school_month" name="school_month">
                <option value="">Select School Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="form-group">
            <label for="total_days">Total Days:</label>
            <input type="number" class="form-control" id="total_days" name="total_days" required>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Student Name</th>
                <th>Attendance Status</th>
                <th>Remarks</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John Doe</td>
                <td>
                    <label class="radio-inline"><input type="radio" name="attendance_status_1" value="present" required>Present</label>
                    <label class="radio-inline"><input type="radio" name="attendance_status_1" value="late">Late</label>
                    <label class="radio-inline"><input type="radio" name="attendance_status_1"
                                                       value="absent">Absent</label>
                </td>
                <td><input type="text" class="form-control" name="remarks_1"></td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>
                    <label class="radio-inline"><input type="radio" name="attendance_status_2" value="present" required>Present</label>
                    <label class="radio-inline"><input type="radio" name="attendance_status_2" value="late">Late</label>
                    <label class="radio-inline"><input type="radio" name="attendance_status_2"
                                                       value="absent">Absent</label>
                </td>
                <td><input type="text" class="form-control" name="remarks_2"></td>
            </tr>
            <!-- Add more rows for additional students -->
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Save Attendance</button>
    </form>
</div>

</body>
</html>
