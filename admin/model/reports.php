<?php

/*function availableFuniture(){
    global $dba;
    try{
    $query = 'SELECT  items.Name,  items.Price, items.Description  From items  WHERE NOT EXISTS
    (SELECT * FROM  reserved WHERE items.ItemId = reserved.ItemId)'; 
         
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
*/
function availableFunitureLivingRoom(){
    global $dba;
    try{
    $query = 'SELECT  items.Name,  items.Price, items.Description  From items  WHERE NOT EXISTS
    (SELECT * FROM  reserved WHERE items.ItemId = reserved.ItemId) AND CategoryId = (SELECT CategoryId From category WHERE CategoryType = "Living Room") '; 
         
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
function availableFunitureKitchen(){
    global $dba;
    try{
    $query = 'SELECT  items.Name,  items.Price, items.Description  From items  WHERE NOT EXISTS
    (SELECT * FROM  reserved WHERE items.ItemId = reserved.ItemId) AND CategoryId = (SELECT CategoryId From category WHERE CategoryType = "Kitchen") '; 
         
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
function availableFunitureDiningRoom(){
    global $dba;
    try{
    $query = 'SELECT  items.Name,  items.Price, items.Description  From items  WHERE NOT EXISTS
    (SELECT * FROM  reserved WHERE items.ItemId = reserved.ItemId) AND CategoryId = (SELECT CategoryId From category WHERE CategoryType = "Dining Room") '; 
         
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

    function availableFunitureOutdoor(){
        global $dba;
        try{
        $query = 'SELECT  items.Name,  items.Price, items.Description  From items  WHERE NOT EXISTS
        (SELECT * FROM  reserved WHERE items.ItemId = reserved.ItemId) AND CategoryId = (SELECT CategoryId From category WHERE CategoryType = "Outdoor") '; 
             
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

        function availableFunitureOffice(){
            global $dba;
            try{
            $query = 'SELECT  items.Name,  items.Price, items.Description  From items  WHERE NOT EXISTS
            (SELECT * FROM  reserved WHERE items.ItemId = reserved.ItemId) AND CategoryId = (SELECT CategoryId From category WHERE CategoryType = "Office") '; 
                 
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

            function availableFunitureBedroom(){
                global $dba;
                try{
                $query = 'SELECT  items.Name,  items.Price, items.Description  From items  WHERE NOT EXISTS
                (SELECT * FROM  reserved WHERE items.ItemId = reserved.ItemId) AND CategoryId = (SELECT CategoryId From category WHERE CategoryType = "Bedroom") '; 
                     
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
                
            function availableFunitureKids(){
                global $dba;
                try{
                $query = 'SELECT  items.Name,  items.Price, items.Description  From items  WHERE NOT EXISTS
                (SELECT * FROM  reserved WHERE items.ItemId = reserved.ItemId) AND CategoryId = (SELECT CategoryId From category WHERE CategoryType = "Kids & Babies") '; 
                     
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
          $query = 'SELECT CONCAT_WS(" ", FirstName, LastName) AS Name,items.Name AS ItemName,  Phone, ReservedDate, PickupDate, Tax, Total FROM  	
               reserved JOIN users ON Users.UserId = Reserved.UserId JOIN items ON items.ItemId = Reserved.ItemId'; 
         
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