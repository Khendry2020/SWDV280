<?php
session_start();
require_once('util/main.php');
require_once('util/tags.php');
require_once('models/database.php');
require_once('models/products_db.php');
require_once('models/categories_db.php');

// Get all the categories from categories_db useful for Navigation 
$categories = get_categories();
// Display the home page
include('views/home.php');

// Dump the session with var_dump($_SESSION);

?>