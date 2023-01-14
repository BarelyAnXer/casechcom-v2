<?php
session_start();

if (isset($_SESSION['user'])) {
    echo '<h1> Welcome ' . $_SESSION['user'] . '</h1>';

    echo '<a href="logout.php">logout</a>';
} else {
    echo '<h1> oops looks like you are trying to access unrestricted page</h1>';
}