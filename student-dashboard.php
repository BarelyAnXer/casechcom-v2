<?php
include "config/connection.php";
session_start();
//$user;

if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    echo '<h1> Welcome ' . $user['firstName'] . '</h1>';
    echo '<a href="logout.php">logout</a>';
} else {
    echo '<h1> oops looks like you are trying to access unrestricted page</h1>';
}

?>