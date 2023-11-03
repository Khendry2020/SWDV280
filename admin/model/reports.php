<?php
// 
function availableFuniture(){
    global $dba;
    try{
    $query = 'SELECT Name, Img, Price, Description From items Join  	
              reserved where Items.ItemID !=  reserved.ItemId'; 
         
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
          $query = 'SELECT CONCAT_WS(" ", FirstName, LastName) AS Name, Phone, ReservedDate, PickupDate, Tax, Total FROM  	
               reserved JOIN users WHERE Users.UserId = Reserved.UserId'; 
         
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