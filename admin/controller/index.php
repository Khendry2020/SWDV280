<?php
session_start();
require_once('../util/main.php');
require_once('../util/tags.php');
require_once('../models/database.php');
require_once('../models/products_db.php');
require_once('../models/categories_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

switch ($action) {

    case 'list_products':
        // get current category
        $cat_id = filter_input(INPUT_GET, 'cat_id', 
                FILTER_VALIDATE_INT);
        if ($cat_id == NULL || $cat_id === FALSE) {
            $cat_id = 1;
        }                

        // get categories and products
        $current_category = get_category($cat_id);
        $categories = get_categories();
        $products = get_items_by_category($cat_id);

        // display view
        include('product_list.php');
        break;

    case 'view_product':
        $categories = get_categories();

        // get product data
        $product_id = filter_input(INPUT_GET, 'product_id', 
                FILTER_VALIDATE_INT);
        $product = get_item($product_id);
        
        // display product
        include('product_view.php');
        break;
}

// var_dump($_SESSION);
?>