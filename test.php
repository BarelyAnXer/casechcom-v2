<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function getSubjects(classId) {
            $.ajax({
                type: "POST",
                url: "getSubjects.php",
                data: {classId: classId},
                success: function (data) {
                    $("#subject").html(data);
                }
            });
        }
    </script>
</head>
<body>
<form>
    <label>Select Class:</label>
    <select id="class" onchange="getSubjects(this.value)">
        <option value="">Select Class</option>
        <?php
        // Fetch classes from the database and populate the first dropdown
        $classes = array("Class 1", "Class 2", "Class 3");
        foreach ($classes as $class) {
            echo "<option value='" . $class . "'>" . $class . "</option>";
        }
        ?>
    </select>
    <br><br>
    <label>Select Subject:</label>
    <select id="subject">
        <option value="">Select Subject</option>
    </select>
</form>
</body>
</html>