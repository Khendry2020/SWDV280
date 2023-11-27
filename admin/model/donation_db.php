<?php
function donationFuniture(){
    global $dba;
   
    $query = 'SELECT Name, Email, Phone, Date From DonatedFurniture';

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

function add_donation($item,$name,$itemName,$phone,$email) {
    global $dba;
    $query = 'INSERT INTO category (CategoryType)
              VALUES (:name)';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':itemName', $itemName);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
       
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>