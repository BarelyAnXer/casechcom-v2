<?php include "admin-navbar.php" ?>

<?php
include "./config/connection.php";
$result = mysqli_query($conn, "select  * from user join student s on user.user_id = s.user_id join classes c on s.classes_id = c.classes_id");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

    <html>

    <head>
        <link rel="stylesheeet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    </head>


    <body>

    <div class="col-lg-12">
        <div class="card card-outline card-primary">
            <!--            <div class="card-header">-->
            <!--                <div class="card-tools">-->
            <!--                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary "-->
            <!--                       href="./index.php?page=new_student"><i class="fa fa-plus"></i> Add New</a>-->
            <!--                </div>-->
            <!--            </div>-->
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
                        <th>Class</th>
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
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="student-edit.php?id=<?php echo $row['user_id']; ?>"
                                           class="btn btn-primary btn-flat">
                                            <i class="material-icons">edit_note</i>
                                        </a>
                                        <a href="student-delete.php?id=<?php echo $row['user_id']; ?>"
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

    <script>
        $(document).ready(function () {
            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }


            });
        });
    </script>

    </body>
    </html>

<?php include "footer.php" ?>