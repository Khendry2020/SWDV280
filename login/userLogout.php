<?php
$oldFirstName = $_SESSION["FirstName"];
session_unset();
session_destroy();
$_SESSION['loggedIn'] = false;
$_SESSION['isAdmin'] = false;
header("Location: ../index.php");
echo 'logged in: ' . $_SESSION['loggedIn'];
var_dump($_SESSION);
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$_SESSION['userLoginError'] = false;
$_SESSION['adminLoginError'] = false;
$_SESSION['notification'] = $oldFirstName . " has logged out. \n";
$oldFirstName = "";
