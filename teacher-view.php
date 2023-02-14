<?php include "admin-navbar.php" ?>


<?php
include "./config/connection.php";
$result = mysqli_query($conn, "select * from user join teacher t on user.user_id = t.user_id");
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
                        <!--                        <th>Classes</th>-->
                        <th>Hire Date</th>
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
                                <td class="text-center"><?php echo $row['email']; ?></td>
                                <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?></td>
                                <!--                                <td>--><?php
                                ////                                    $result = mysqli_query($conn, "SELECT DISTINCT t.teacher_id, c.name, c.classes_id FROM teaches t JOIN classes c ON t.classes_id = c.classes_id WHERE t.teacher_id = '$teacher_id'");
                                ////                                    $rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                ////
                                ////                                    echo $rows2['name']
                                //                                    ?><!--</td>-->
                                <td><?php echo $row['hire_date']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="teacher-edit.php?id=<?php echo $row['user_id']; ?>"
                                           class="btn btn-primary btn-flat ">
                                            <i class="material-icons">edit_note</i>
                                        </a>
                                        <a href="teacher-delete.php?id=<?php echo $row['user_id']; ?>"
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