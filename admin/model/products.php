<?php
function get_items_by_category($cat_id) {
    global $dba;
    $query = 'SELECT * FROM items
              WHERE CategoryId = :cat_id
              ORDER BY ItemId';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':cat_id', $cat_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_items() {
    global $dba;
    $query = 'SELECT * FROM items ORDER BY ItemId';
    try {
        $statement = $dba->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_items_paginated($sort_by_type, $sort_arrangement, $start, $end) {
    global $dba;
    $query = 'SELECT * FROM items ORDER BY ? ? LIMIT ?, ?';
    try {
        $statement = $dba->prepare($query);
        $statement->bindParam(1, $sort_by_type, PDO::PARAM_STR);
        $statement->bindParam(2, $sort_arrangement, PDO::PARAM_STR);
        $statement->bindParam(3, $start, PDO::PARAM_INT);
        $statement->bindParam(4, $end, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_item($product_id) {
    global $dba;
    $query = 'SELECT *
              FROM items
              WHERE ItemId = :product_id';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
// TODO Add Image - Maybe Timestamp for date added
function add_item($cat_id, $name, $description,
        $price, $imagename) {
    global $dba;
    $query = 'INSERT INTO items
                 (CategoryId, `Name`, `Description`, Price, ImageName)
              VALUES
                 (:cat_id, :name, :description, :price, :imagename)';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':cat_id', $cat_id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':imagename', $imagename);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $product_id = $dba->lastInsertId();
        return $product_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_item($name, $description, $price, $cat_id, $item_id) {
    global $dba;
    $query = 'UPDATE items
              SET `Name` = :name,
                 `description` = :description,
                  Price = :price,
                  CategoryId = :cat_id
              WHERE ItemId = :item_id';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':cat_id', $cat_id);
        $statement->bindValue(':item_id', $item_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_item($item_id) {
    global $dba;
    $query = 'DELETE FROM items WHERE ItemId = :item_id';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':item_id', $item_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product_count() {
    global $dba;
    $query = 'SELECT COUNT(*) AS count
              FROM items';
    $statement = $dba->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    $product_count = $result[0]['count'];
    return $product_count;
}
?>