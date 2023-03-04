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

        $(document).ready(function() {
            // Set the initial date picker value
            $('#datepicker').datepicker();

            // Limit the date picker by the year and month selected in the drop-downs
            $('#year, #month').change(function() {
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
    <div class="col-lg-12">
        <div class="card card-outline card-primary">
            <div class="card-body">

                <select id="year">
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
                <select id="month">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <input type="text" id="datepicker">

                <select name="classes_id" id="classes" onchange="getMonths(this.value)">
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
                    <tbody id="data">
                    <!--                                        --><?php
                    //                                        if ($rows > 0) {
                    //                                            foreach ($rows as $row) {
                    //                                                ?>
                    <!--                                                <tr>-->
                    <!--                                                    <td class="text-center"> -->
                    <?php //echo $row['school_month_name']; ?><!--</td>-->
                    <!--                                                    <td class="text-center"> -->
                    <?php //echo $row['school_month_school_days']; ?><!--</td>-->

                    <!--                                <td class="text-center">-->
                    <!--                                    <div class="btn-group">-->
                    <!--                                        <a href="registrar-teacher-update.php?id=-->
                    <!--                                --><?php //echo $row['s']; ?><!--"-->
                    <!--                                           class="btn btn-primary btn-flat ">-->
                    <!--                                            <i class="material-icons">edit_note</i>-->
                    <!--                                        </a>-->
                    <!--                                        <a href="registrar-teacher-delete.php?id=-->
                    <!--                                --><?php //echo $row['user_id']; ?><!--"-->
                    <!--                                           class="btn btn-danger btn-flat delete_student">-->
                    <!--                                            <i class="material-icons">delete</i>-->
                    <!--                                        </a>-->
                    <!--                                    </div>-->
                    <!--                                </td>-->

                    <!--                            </tr>-->
                    <!--                            --><?php
                    //                        }
                    //                    }
                    //                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <style>
        table td {
            vertical-align: middle !important;
        }
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

    </body>
    </html>

<?php include "footer.php" ?>