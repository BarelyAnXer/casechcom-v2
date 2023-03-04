<?php
include "config/connection.php";

$schoolyearid = $_POST["schoolyearid"];

$result = mysqli_query($conn, "select *
from school_month
         join school_year sy on sy.school_year_id = school_month.school_month_school_year_id
where sy.school_year_id = '$schoolyearid';");

$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($students as $student) {
    echo "<tr>
<td class='text-center'>" . $student['school_month_name'] . "</td>
<td class='text-center'>" . $student['school_month_school_days'] . "</td>
</tr>";
}
?>