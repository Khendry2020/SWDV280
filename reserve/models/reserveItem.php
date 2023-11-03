<?php
session_start();
include "././models/database.php";
$_SESSION['isReserved'] = false;
$Date = date('Y-M-D');

if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {

    $productId = (int)$_POST['product_id'];

    $sql = $db->prepare('SELECT * FROM items WHERE ItemId = ?');
    $sql->execute([$_POST['product_id']]);

    $product = $sql->fetch(PDO::FETCH_ASSOC);




    if ($product > 0) {
        if ($product['ItemId'] == $productId) {
            $_SESSION['isReserved'] = true;
            $sql = $db->prepare('INSERT INTO items (UserId, ItemId, ReservedDate, PickupDate) 
            VALUES (' + $_SESSION["UserId"] + ', ' + $productId + ',' +  $Date + ')');
        }
    }
}
