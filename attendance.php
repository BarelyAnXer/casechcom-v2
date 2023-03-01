<?php include "registrar-navbar.php" ?>
<?php
include "./config/connection.php";
$result = mysqli_query($conn, "select * from attendance");
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <html>


    <head>
        <link rel="stylesheet" href="css/Styletwo.css">
    </head>

    <body>
    <div class="content">

    </div>
    </body>
    </html>

<?php include "footer.php" ?>