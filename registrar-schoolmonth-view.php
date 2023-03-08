<?php include "registrar-navbar.php" ?>

<?php
include "./config/connection.php";
$result = mysqli_query($conn, "select * from school_month;");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<html>

<head>
    <link rel="stylesheeet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <!-- Latest version of jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Latest version of jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">

</head>

<script>
    function getMonths(schoolyearid) {
        $.ajax({
            type: "POST",
            url: "getMonths.php",
            data: {'schoolyearid': schoolyearid},
            success: function (data) {
                $("#data").html(data);
            }
        });
    }

    $(document).ready(function () {
        // Set the initial date picker value
        $('#datepicker').datepicker();

        // Limit the date picker by the year and month selected in the drop-downs
        $('#year, #month').change(function () {
            var year = $('#year').val();
            var month = $('#month').val();
            var startDate = new Date(year, month - 1, 1);
            var endDate = new Date(year, month, 0);
            $('#datepicker').datepicker('destroy');
            $('#datepicker').datepicker({
                minDate: startDate,
                maxDate: endDate
            });
        });
    });

</script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<body>

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-outline card-primary">
                <div class="card-body">

                    <select name="classes_id" id="classes" onchange="getMonths(this.value)" class="form-control mb-3">
                        <option value="item0">--Select an Item--</option>
                        <?php
                        $grade_sql = "select * from school_year";
                        $res = mysqli_query($conn, $grade_sql);
                        $school_years = mysqli_fetch_all($res, MYSQLI_ASSOC);
                        if ($school_years > 0) {
                            foreach ($school_years as $row) {
                                ?>
                                <option value="<?php echo $row['school_year_id'] ?>">
                                    <?php echo $row['school_year_session'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                    <div class="table-responsive">
                        <table id="datatableid" class="table table-hover table-bordered" id="list">
                            <colgroup>
                                <col width="5%">
                                <col width="15%">
                                <col width="25%">
                                <col width="25%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>Month</th>
                                <th>Total Days</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Add your dynamic content here -->

                            <tbody id="data">
                            <?php
                            if ($rows > 0) {
                                foreach ($rows as $row) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['school_month_name']; ?></td>
                                        <td class="text-center"><?php echo $row['school_month_school_days']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="registrar-schoolmonth-delete.php" class="btn btn-danger btn-flat delete_student">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                            </tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>













    </body>
    </html>

<?php include "footer.php" ?>
