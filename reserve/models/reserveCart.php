<?php
include "././models/database.php";
$user = $_SESSION['UserId'];

$stmt = $db->prepare("SELECT * FROM reserved WHERE UserID = :user");
$stmt->bindParam(':user', $user);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
//needs seperate query
//$_SESSION['itemName'] = $row['itemName'];
// $_SESSION['itemDescription'] = $row['Description'];
// $_SESSION['itemPrice'] = $row['Total'];

if ($row) {
    $_SESSION['itemID'] = $row['ItemId'];
    $_SESSION['itemTax'] = $row['Tax'];

    // Needs to take to reserve page - header("Location: ./products.php");
    exit();
} else {
    header("Location: ./index.php?errorAdmin=User Name or Password is incorrect");
    exit();
}
