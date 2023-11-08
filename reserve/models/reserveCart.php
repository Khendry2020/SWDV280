<?php
//needs seperate query
//$_SESSION['itemName'] = $row['itemName'];
// $_SESSION['itemDescription'] = $row['Description'];
// $_SESSION['itemPrice'] = $row['Total'];
try {
    include "././models/database.php";
    $user = $_SESSION['UserId'];
    $stmt = $db->prepare("SELECT * FROM reserved WHERE UserID = :user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $_SESSION['itemID'] = $row['ItemId'];
        exit();
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
    echo "<br>Failed on get reserved items: ";
    echo "User ID: ";
    echo $user;
    echo " Item ID: ";
    echo $_SESSION['itemID'];
    echo $row;
}

try {
    $itemId = $_SESSION['itemID'];
    $stmt = $db->prepare("SELECT * FROM items WHERE itemId = :itemId");
    $stmt->bindParam(':itemId', $itemId);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $_SESSION['itemName'] = $row['Name'];
        $_SESSION['itemPrice'] = $row['Price'];
        exit();
    }
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
    echo "<br>Failed on get items from DB";
}
