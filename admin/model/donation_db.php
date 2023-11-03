<?php
function donationFuniture(){
    global $dba;
   
    $query = 'SELECT CONCAT_WS(" ", FirstName, LastName) AS Name, Phone, Img, Description From Users Join  	
              DonatedFurniture where Users.UserId =  DonatedFurniture.UserId';

try{
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