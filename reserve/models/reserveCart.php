<?php
session_start();
include "../../models/database.php";

$user = $_SESSION['UserId'];

$stmt = $db->prepare("SELECT * FROM reserve WHERE UserID = :user");
$stmt->bindParam(':username', $username);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $_SESSION['itemName'] = $row['itemName'];
    $_SESSION['itemDescription'] = $row['itemDescription'];
    $_SESSION['itemPrice'] = $row['itemPrice'];
    // Needs to take to reserve page - header("Location: ./products.php");
    exit();
} else {
    header("Location: ./index.php?errorAdmin=User Name or Password is incorrect");
    exit();
}
