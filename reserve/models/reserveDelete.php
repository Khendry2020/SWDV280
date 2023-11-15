<?php
session_start();
// try {
include "../../models/database.php";

$user = $_SESSION['UserId'];
$stmt = $db->prepare("DELETE FROM reserved WHERE UserId = :user");
$stmt->bindParam(':user', $user);
$stmt->execute();
header("../view/reserveView.php");
// } catch (Exception $e) {
//     error_log('Error getting Deleting items: ' . $e->getMessage());
//     echo 'Failed to Delete reserved items.';
// }
