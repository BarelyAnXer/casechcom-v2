<?php
include "./config/connection.php";

$result = mysqli_query($conn, "select * from school_year");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM school_year WHERE school_year_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $parent = dirname($_SERVER['REQUEST_URI']);
        header("Location: registrar-schoolyear-crd.php");
    }
}

if (isset($_POST['SAVE'])) {
    $schoolyearsession = $_POST['schoolyearsession'];
    $classes_sql = "insert into school_year (school_year_session) values ('$schoolyearsession');";
    if (mysqli_query($conn, $classes_sql)) {
        header("Location: registrar-schoolyear-crd.php");
    } else {
        echo "Error: " . $classes_sql . "<br>" . $conn->error;
    }
}

?>


<?php include "registrar-navbar.php" ?>

<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;">
            <form align="center" action="" method="POST" novalidate>
                <br>
                <label for="">School Year</label>
                <input type="text" name="schoolyearsession"/>
                <br>
                <br>
                <input style="height: 40px; width:150px; float: bottom; border-radius : 22px; border-color:blueviolet; align: center;"

                       type="submit" value="SAVE" name="SAVE">
            </form>
        </div>


        <table border="2px" bgcolor="black" align="center" class="table table-hover table-striped table-bordered"
               border="2px">
            <thead>
            <tr align="center">
                <th width="100">ID</th>
                <th width="100">Classes Name</th>
                <th width="100">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($rows > 0) {
                foreach ($rows as $row) {
                    ?>
                    <tr align="center">
                        <td><?php echo $row['school_year_id']; ?></td>
                        <td><?php echo $row['school_year_session']; ?></td>
                        <td>
                            <a href="registrar-schoolyear-update.php?id=<?php echo $row['school_year_id']; ?>"
                               class="btn btn-primary btn-flat ">
                                <i class="material-icons">edit_note</i>
                            </a>
                            <a href="registrar-schoolyear-crd.php?id=<?php echo $row['school_year_id']; ?>"
                               class="btn btn-danger btn-flat">
                                <i class="material-icons">delete</i>
                            </a>
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

<?php include "footer.php" ?>

