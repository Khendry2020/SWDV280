<?php
try {
  include "models/database.php";

  $user = $_SESSION['UserId'];
  $stmt = $db->prepare("SELECT items.ItemId AS `ProductId`, Name, items.Img, Description, ReservedId, `condition`, Price, ReservedDate, PickupDate, Tax, Total
  FROM reserved
  JOIN items ON reserved.ItemId = items.ItemId
  WHERE UserId = :user_id");
  $stmt->bindParam(':user_id', $user);
  $stmt->execute();
  $reservedRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  error_log('Error getting reserved items: ' . $e->getMessage());
  echo 'Failed to retrieve reserved items.';
}
