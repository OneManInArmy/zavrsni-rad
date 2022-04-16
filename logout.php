<?php
session_start();
if ($_SESSION["loggedin"] != TRUE) {
    header("location: index.php");
    exit;
}
unset($_SESSION['loggedin']);
unset($_SESSION['name']);
unset($_SESSION['id']);
header("location: index.php");