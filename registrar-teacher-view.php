<?php include "registrar-navbar.php" ?>


<?php
include "./config/connection.php";
$result = mysqli_query($conn, "select *from user where user_level = 'teacher';");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
    <html>

    <head>
        <link rel="stylesheeet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    </head>

    <body>

    <div class="col-lg-12">
        <div class="card card-outline card-primary">

            <div class="card-body">
                <?php if (isset($error_msg)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_msg; ?>
                    </div>
                <?php endif; ?>

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
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($rows > 0) {
                        foreach ($rows as $row) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $row['user_id']; ?></td>
                                <td class="text-center"><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['user_firstname'] . " " . $row['user_middlename'] . " " . $row['user_lastname'] . " " . $row['user_suffix']; ?></td>
                                <td><?php echo $row['user_house_number'] . " " . $row['user_province'] . " " . $row['user_city'] . " " . $row['user_barangay'] . " " . $row['user_street'] . " " . $row['user_zip_code']; ?></td>
                                <td><?php echo $row['user_gender']; ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="registrar-teacher-update.php?id=<?php echo $row['user_id']; ?>"
                                           class="btn btn-primary btn-flat ">
                                            <i class="material-icons">edit_note</i>
                                        </a>
                                        <a href="registrar-teacher-delete.php?id=<?php echo $row['user_id']; ?>"
                                           class="btn btn-danger btn-flat delete_student">
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