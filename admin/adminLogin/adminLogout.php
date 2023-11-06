<?php
session_start();
session_unset();
session_destroy();
$_SESSION['loggedIn'] = false;
$_SESSION['isAdmin'] = false;
header("Location: ./../../index.php");
echo 'logged in: ' . $_SESSION['loggedIn'];
var_dump($_SESSION);
error_reporting(E_ALL);
ini_set('display_errors', 1);
