<?php
function display_admins() {
    global $dba;
    $query = 'SELECT * FROM admin
              ORDER BY AdminId';
    try {
        $statement = $dba->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_admin($admin_id) {
    global $dba;
    $query = 'SELECT * FROM admin
              WHERE AdminId = :admin_id';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':admin_id', $admin_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}


function add_admin($username, $roles, $password) {
    global $dba;
    $query = 'INSERT INTO admin (UserName, Roles, Password)
              VALUES (:username, :roles, :password)';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':roles', $roles);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_admin($admin_id, $admin_name, $role) {
    global $dba;
    $query = '
        UPDATE admin
        SET UserName = :admin_name, Roles = :role
        WHERE CategoryId = :admin_id';
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

function delete_admin($admin_id) {
    global $dba;
    $query = 'DELETE FROM admin WHERE AdminId = :admin_id';
    try {
        $statement = $dba->prepare($query);
        $statement->bindValue(':admin_id', $admin_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>