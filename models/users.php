<?php
function get_user($user_id) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE UserId = :user_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function add_user($name, $email, $phone, $address_id) {
    global $db;
    $query = 'INSERT INTO users (Name, Email, Phone, AddressId)
              VALUES (:name, :email, :phone, :address_id)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':address_id', $address_id);
        $statement->execute();
        $statement->closeCursor();

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_user($cat_id, $name) {
    global $db;
    $query = '
        UPDATE categories
        SET CategoryType = :name
        WHERE CategoryId = :cat_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':cat_id', $cat_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
function check_email($email) {
    global $db;
    $query = 'SELECT Email FROM users
              WHERE Email = :email';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
// Add Address to database
// will need get last ID
function add_address($street, $city, $state, $zip) {
    global $db;
    $query = 'INSERT INTO address
                 (Streetaddress, city, State, Zip)
              VALUES
                 (:street, :city, :state, :zip)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':street', $street);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $statement->execute();
        $last_id = $db->lastInsertId();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>