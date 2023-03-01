<?php include "registrar-navbar.php" ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->

    <title>Student CRUD</title>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Details

                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> 0001 </td>
                            <td> hanzzzz@gmail.com</td>
                            <td>Hanz </td>
                            <td> Ronda </td>
                            <td> Villafuerte</td>
                            <td>

                                <a href="index.php?page=edit_student&id=" class="btn btn-success btn-flat ">
                                    <i class="material-icons">visibility</i>
                                </a>

                                <a href="index.php?page=edit_student&id=" class="btn btn-primary btn-flat ">
                                    <i class="material-icons">edit_note</i>
                                </a>
                                <a href="index.php?page=delite_student&id=" class="btn btn-danger btn-flat">
                                    <i class="material-icons">delete</i>
                                </a>






<!--                                <a href="#">-->
<!--                                    <span class="material-icons">visibility</span></a>-->
<!---->
<!--                                <a href="#">-->
<!--                                    <span class="material-icons">edit</span></a>-->
<!--                                </a>-->
<!--                                <a href="#">-->
<!--                                    <span class="material-icons">delete</span></a>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->

</body>
</html>






