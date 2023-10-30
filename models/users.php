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

function add_user($name) {
    global $db;
    $query = 'INSERT INTO users (CategoryType)
              VALUES (:name)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $category_id = $db->lastInsertId();
        return $category_id;
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
// Add Address to database
// will need get last ID
function add_address() {
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

?>