<?php
include("./config/connection.php");

if (isset($_POST['register'])) {
    $schoolyearid = $_POST['schoolyearid'];
    $totaldays = $_POST['totaldays'];
    $monthname = $_POST['monthname'];

    $user_sql = "insert into school_month (school_month_school_year_id, school_month_name, school_month_school_days) values ('$schoolyearid', '$monthname', '$totaldays');";

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
    <form action="" method="post">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <form action="" id="manage-student">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="msg" class=""></div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">School Year</label>
                                    <select name="schoolyearid" class="custom-select custom-select-sm" required>
                                        <?php
                                        $user_sql = "SELECT * FROM school_year";
                                        $res = mysqli_query($conn, $user_sql);
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
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Total Days</label>
                                <input type="text" class="form-control form-control-sm" name="totaldays" required>
                            </div>
                            <div class="form-group text-dark">
                                <div class="form-group">
                                    <label for="" class="control-label">Month</label>
                                    <select name="monthname" class="custom-select custom-select-sm" required>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="card-footer border-top border-info">
                <input style="height: 40px; width:150px; float: right; border-radius : 22px; border-color:blueviolet;"
                       type="submit" value="register" name="register">
                <div class="d-flex w-100 justify-content-center align-items-center">
                </div>
            </div>
        </div>

    </form>
</div>

</body>
</html>

<?php include "footer.php" ?>




