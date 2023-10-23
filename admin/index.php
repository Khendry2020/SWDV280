<?php
session_start();
/*
require_once('util/main.php');
require_once('util/tags.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_all_options';
    }
}



// var_dump($_SESSION);
?>
*/
require_once('util/main.php');
require_once('util/tags.php');
require_once('model/database.php');
require_once('model/products.php');
require_once('model/categories.php');
require_once('model/users.php');
require_once('model/reports.php');

include('controller/option_list.php');
