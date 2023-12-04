<?php
 
function donationFuniture(){
    global $dba;
   
    $query = 'SELECT Name, itemname, Email, Phone, Date From donatedfurniture';

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




function add_donation($name,$itemName,$phone,$email, $date) {
    global $dba;
    $query = 'INSERT INTO donatedfurniture (Name, itemname, Email, Phone, Date)
              VALUES (:userName, :itemName, :email, :phone,  :datepicker)';
    //try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':userName', $name);
        $statement->bindValue(':itemName', $itemName);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':datepicker', $date);
        $statement->execute();
         $statement->closeCursor();
      
         
       
 //   } catch (PDOException $e) {
     //   $error_message = $e->getMessage();
      //  display_db_error($error_message);
   // }

}

?>
