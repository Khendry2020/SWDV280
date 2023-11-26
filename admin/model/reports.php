<?php

function availableFuniture(){
    global $dba;
    try{
    $query = 'SELECT  Items.Name,  Items.Price, Items.Description  From items  WHERE NOT EXISTS
      (SELECT * FROM  reserved WHERE Items.ItemId = reserved.ItemId)'; 
         
         $statement = $dba->prepare($query);
         $statement->execute();
         $result = $statement->fetchAll();
         $statement->closeCursor();
         return $result;
    }
    
     catch(PDOException $e){
         $error_message = $e->getMessage();
        display_db_error($error_message);
     }         
}

function reservedFuniture(){
     global $dba;
     try{
          $query = 'SELECT CONCAT_WS(" ", FirstName, LastName) AS Name,Items.Name AS ItemName,  Phone, ReservedDate, PickupDate, Tax, Total FROM  	
               reserved JOIN users ON Users.UserId = Reserved.UserId JOIN Items ON Items.ItemId = Reserved.ItemId'; 
         
          $statement = $dba->prepare($query);
          $statement->execute();
          $result = $statement->fetchAll();
          $statement->closeCursor();
          return $result;
     }
     
      catch(PDOException $e){
          $error_message = $e->getMessage();
         display_db_error($error_message);
      }         
 }
?>