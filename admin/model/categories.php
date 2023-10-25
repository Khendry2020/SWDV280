<?php
function get_categories() {
    global $dba;
    $query = 'SELECT * FROM category
              ORDER BY categoryID';
    try {
        $statement = $dba->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($e->getMessage());
    }
}
function get_category($cat_id) {
    global $dba;
    $query = 'SELECT *
              FROM category
              WHERE CategoryId = :cat_id';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':cat_id', $cat_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
function add_category($name) {
    global $dba;
    $query = 'INSERT INTO category (CategoryType)
              VALUES (:name)';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
        // Get the last product ID that was automatically generated
        //$category_id = $dba->lastInsertId();
        //return $category_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_category($name, $cat_id) {
    global $dba;
    $query = '
        UPDATE category
        SET CategoryType = :name
        WHERE CategoryId = :cat_id';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':cat_id', $cat_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_category($cat_id) {
    global $dba;
    $query = 'DELETE FROM category WHERE CategoryId = :cat_id';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':cat_id', $cat_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>