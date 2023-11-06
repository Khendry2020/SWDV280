<?php
session_start();
include "../models/database.php";
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
        $_SESSION["notification"] .= "A Username is required. \n";
        header("Location: ../index.php?error=A Username is required");
    } 
    if (empty($password)) {
        $_SESSION["notification"] .= "A Password is required. \n";
        header("Location: ../index.php?error=A Password is required");
    } 
    if (empty($username) || empty($password)) {        
        exit();
    }

    $stmt = $db->prepare("SELECT * FROM users WHERE UserName = :username OR Email = :username AND Password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION['LoggedIn'] = true;
        $_SESSION['UserName'] = $row['UserName'];
        $_SESSION['UserId'] = $row['UserId'];
        $_SESSION['FirstName'] = $row['FirstName'];
        $_SESSION["notification"] .= $_SESSION['FirstName'] . " has logged in! \n";
        header("Location: ../index.php");

        exit();
    } else {        
        $_SESSION["notification"] .= "User Name or Password is incorrect. \n";
        header("Location: ../index.php?error=User Name or Password is incorrect");
        exit();
    }
}
