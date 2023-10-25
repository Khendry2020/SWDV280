<?php
session_start();
include "./models/database.php";

// Checks if information is present in db
if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please fill both the username and password fields!');
}
if ($stmt = $con->prepare('SELECT loginId, password FROM login WHERE username = ?')) {

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {

            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            echo 'Welcome ' . $_SESSION['name'] . '!';
        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }
    $stmt->close();
}
