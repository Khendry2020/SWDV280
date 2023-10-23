<?php
session_start();
require_once('../util/main.php');
require_once('../util/tags.php');
require_once('../model/database.php');
require_once('../model/products.php');
require_once('../model/categories.php');
require_once('../model/users.php');
require_once('../model/reports.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_all_options';
    }
}

switch ($action) {

    case 'list_all_options':
        // display view
        include('option_list.php');
        break;

    case 'add_category':

        // Display view
        require('category_add.php');
        break;

    case 'add_product':
        // Get Category data for dropdown list
        $categories = get_categories();
        // Display view
        include('product_add.php');
        break;

    case 'delete_category':
        // delete product from database

        $cat_id = filter_input(INPUT_POST, 'cat_id', 
        FILTER_VALIDATE_INT);

        delete_category($cat_id);
        $message = 'Category deleted successfully.';
        header("Refresh: 0");
        header("Location: ./?action=view_categories");

        break;

    case 'delete_product':
        // delete product from database

        $product_id = filter_input(INPUT_POST, 'product_id', 
        FILTER_VALIDATE_INT);

        delete_item($product_id);
        $message = 'Item deleted successfully.';
        header("Refresh: 0");
        header("Location: ./?action=view_products");

        break;
    

    case 'edit_category':

        $cat_id = filter_input(INPUT_GET, 'cat_id', 
        FILTER_VALIDATE_INT);

        $category = get_category($cat_id);
        include('category_edit.php');
        break;

    case 'edit_product':
        $categories = get_categories();
        $product_id = filter_input(INPUT_GET, 'product_id', 
        FILTER_VALIDATE_INT);

        $product = get_item($product_id);

        include('product_edit.php');
        break;

    case 'insert_category':
        // Get Category data for dropdown list
        if (isset($_POST)) {
            // Trim inputs
            $_POST['categorytype'] = trim($_POST['categorytype']);

            $categorytype = filter_input(INPUT_POST, 'categorytype');

            if ($categorytype == NULL) {            
                $error = 'Category requires a name. Please try again.';
                include('../../errors/error.php');
            } else {

                // Add category to database
                add_category($categorytype);

                $_SESSION['Status Message'] = 'Category added successfully.';
                header("Refresh: 0");
                header("Location: ./?action=view_categories");  
            }
        }

        break;  

    case 'insert_product':
        // Get Category data for dropdown list
        if (isset($_POST)) {
            // Trim inputs
            $_POST['name'] = trim($_POST['name']);
            $_POST['description'] = trim($_POST['description']);
            $_POST['price'] = trim($_POST['price']);
            $_POST['category'] = trim($_POST['category']);

            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $category_id = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);

            $image_file = $_FILES["image"];

            // Exit if no file uploaded
            if (!isset($image_file)) {
                $error = 'An image is required for the product.';
                include('../../errors/error.php');
            }
            
            // Exit if image file is zero bytes
            if (filesize($image_file["tmp_name"]) <= 0) {
                $error = 'Uploaded image has no contents.';
                include('../../errors/error.php');
            }
            
            // Exit if is not a valid image file
            $image_type = exif_imagetype($image_file["tmp_name"]);
            if (!$image_type) {
                $error = 'The file uploaded was not an image.';
                include('../../errors/error.php');
            }
            
            if ($name == NULL || $description == NULL ||
                    $price == FALSE || $category_id == NULL) {            
                $error = 'Invalid product data. Check all fields and try again.';
                include('../../errors/error.php');
            } else if ($price <= 0) {
                $error = 'Price of item cannot be 0 or less than 0.';
                include('../../errors/error.php');
            } else {
                // Get file extension based on file type, to prepend a dot we pass true as the second parameter
                $image_extension = image_type_to_extension($image_type, true);
                
                // Create a unique image name
                $image_name = bin2hex(random_bytes(16)) . $image_extension;

                // Add item to database
                add_item($category_id, $name, $description, $price, $image_name);

                // Move the temp image file to the images directory
                move_uploaded_file(
                    // Temp image location
                    $image_file["tmp_name"],
                
                    // New image location
                    "../../images/products/" . $image_name
                );


                $_SESSION['Status Message'] = 'Item added successfully.';
                header("Location: ./?action=view_products");
            }
        }

        break;   

    case 'update_category':
        
        if (isset($_POST)) {
            // Trim inputs
            $_POST['categorytype'] = trim($_POST['categorytype']);
            $_POST['cat_id'] = trim($_POST['cat_id']);

            $name = filter_input(INPUT_POST, 'categorytype');
            $cat_id = filter_input(INPUT_POST, 'cat_id', FILTER_VALIDATE_INT);
            
            if ($name == NULL) {            
                $error = 'Category requires a name, please try again.';
                include('../../errors/error.php');
            } else {
                // Update category in database
                update_category($name, $cat_id);

                $_SESSION['Status Message'] = 'Category updated successfully.';
                header("Location: ./?action=view_categories");
            }
        }

        break;

    case 'update_item':
        if (isset($_POST)) {
            // Trim inputs


            $_POST['name'] = trim($_POST['name']);
            $_POST['description'] = trim($_POST['description']);
            $_POST['price'] = trim($_POST['price']);
            $_POST['category'] = trim($_POST['category']);
            $_POST['item_id'] = trim($_POST['item_id']);

            $name = filter_input(INPUT_POST, 'name');
            $description = filter_input(INPUT_POST, 'description');
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $cat_id = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);
            $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);

            if ($name == NULL || $description == NULL ||
                    $price == FALSE || $cat_id == NULL) {            
                $error = 'Invalid product data. Check all fields and try again.';
                include('../../errors/error.php');
            } else if ($price <= 0) {
                $error = 'Price of item cannot be 0 or less than 0.';
                include('../../errors/error.php');
            } else if ($item_id <= 0) {
                $error = 'ID of item cannot be 0 or less than 0.';
                include('../../errors/error.php');
            } else {

                // Update item to database
                update_item($name, $description, $price, $cat_id, $item_id);

                $_SESSION['Status Message'] = 'Item updated successfully.';
                header("Location: ./?action=view_products");
            }
        }
        break;

    case 'view_categories':
        $categories = get_categories();

        include('category_list.php');
        break;

    case 'view_products':
        $products = get_items();

        include('product_list.php');
        break;

    case 'view_users':
        //$products = get_items();

        include('user_list.php');
        break;

    case 'view_reports':
        //$products = get_items();

        include('view_reports.php');
        break;
}

// var_dump($_SESSION);
?>