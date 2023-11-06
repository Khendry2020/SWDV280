<?php
session_start();
include "../../models/database.php";
$_SESSION['LoggedIn'] = false;
//Variable to be used later to check if a user is an admin if needed
$_SESSION['isAdmin'] = false;

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['adminUsername']) && isset($_POST['adminPassword'])) {
    $username = validate($_POST['adminUsername']);
    $password = validate($_POST['adminPassword']);

    if (empty($username)) {
        header("Location: ../../index.php?errorAdmin=A Username is required");
        exit();
    } elseif (empty($password)) {
        header("Location: ../../index.php?errorAdmin=A Password is required");
        exit();
    }


    $stmt = $db->prepare("SELECT * FROM admin WHERE UserName = :adminUsername AND Password = :adminPassword");
    $stmt->bindParam(':adminUsername', $username);
    $stmt->bindParam(':adminPassword', $password);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['LoggedIn'] = true;
        $_SESSION['isAdmin'] = true;
        $_SESSION['UserName'] = $row['UserName'];
        $_SESSION['AdminId'] = $row['AdminId'];
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../../index.php?errorAdmin=User Name or Password is incorrect");
        echo $_SESSION['LoggedIn'];
        exit();
    }
} else {
    header("Location: ../../index.php?errorAdmin=Login Failed. Please Try again");
}
