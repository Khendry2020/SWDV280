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

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: ../index.php?error=A Username is required");
        exit();
    } elseif (empty($password)) {
        header("Location: ../index.php?error=A Password is required");
        exit();
    }


    $stmt = $db->prepare("SELECT * FROM admin WHERE UserName = :username AND Password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['LoggedIn'] = true;
        $_SESSION['isAdmin'] = true;
        $_SESSION['UserName'] = $row['UserName'];
        $_SESSION['UserId'] = $row['UserId'];
        header("Location: ./products.php");
        exit();
    } else {
        header("Location: ./index.php?errorAdmin=User Name or Password is incorrect");
        echo $_SESSION['LoggedIn'];
        exit();
    }
} else {
    header("Location: ../index.php?errorAdmin=ULogin Failed. Please Try again");
}
