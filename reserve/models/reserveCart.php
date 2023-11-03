<?php
session_start();
include "../../models/database.php";

$user = $_SESSION['UserId'];

$stmt = $db->prepare("SELECT * FROM reserved WHERE UserID = :user");
$stmt->bindParam(':user', $user);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
//needs seperate query
//$_SESSION['itemName'] = $row['itemName'];

if ($row) {
    $_SESSION['itemID'] = $row['ItemID'];
    $_SESSION['itemDescription'] = $row['Description'];
    $_SESSION['itemTax'] = $row['Tax'];
    $_SESSION['itemPrice'] = $row['Total'];
    // Needs to take to reserve page - header("Location: ./products.php");
    exit();
} else {
    header("Location: ./index.php?errorAdmin=User Name or Password is incorrect");
    exit();
}
