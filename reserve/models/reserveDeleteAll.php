<?php
session_start();
include "../../models/database.php";

$user = $_SESSION['UserId'];
$stmt = $db->prepare("DELETE FROM reserved WHERE UserId = :user");
$stmt->bindParam(':user', $user);
$stmt->execute();
$_SESSION['cartCount'] = 0;
header("Location: /swdv280/reserve.php");
exit;
