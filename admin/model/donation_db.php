<?php
function donationFuniture(){
    global $db;
    try{
    $query = 'SELECT Name, Phone, Img, Description From Users Join  	
              DonatedFurniture where Users.UserId =  DonatedFurniture.UserId'
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