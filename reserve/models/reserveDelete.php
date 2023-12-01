<?php
session_start();
include "../../models/database.php";

$reserveId = $_GET['ReservedId'];
$stmt = $db->prepare("DELETE FROM reserved WHERE ReservedId = :reserveId");
$stmt->bindParam(':reserveId', $reserveId);
$stmt->execute();
$_SESSION['cartCount'] -= 1;
header("Location: /swdv280/reserve.php");
exit;
