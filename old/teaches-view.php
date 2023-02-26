<?php
//include "./config/connection.php";
//session_start();
$result = mysqli_query($conn, "select teaches.teaches_id, c.name as classes_name, s.name as subject_name, u.firstname, u.middlename, u.lastname
from teaches
         join teacher t on t.teacher_id = teaches.teacher_id
         join user u on t.user_id = u.user_id
         join subject s on s.subject_id = teaches.subject_id
         join classes c on c.classes_id = teaches.classes_id;");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<div class="content">
    <div class="card card-outline card-primary">
        <div style="padding-top: 50px; padding-bottom: 50px;" >

    <table border="2px" bgcolor="black" align="center"  class="table table-hover table-striped table-bordered"border="2px">
        <thead>
        <tr align="center">
            <th width="100">ID</th>
            <th width="100">teacher</th>
            <th width="100">class name</th>
            <th width="100">subject name</th>
            <th width="100">action</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if ($rows > 0) {
            foreach ($rows as $row) {
                ?>
                <tr align="center">
                    <td><?php echo $row['teaches_id']; ?></td>
                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                    <td><?php echo $row['classes_name']; ?></td>
                    <td><?php echo $row['subject_name']; ?></td>
                    <td>


                        <a href="teaches-delete.phpd=<?php echo $row['teaches_id']; ?>" class="btn btn-danger btn-flat">
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

