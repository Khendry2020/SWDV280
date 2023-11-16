<?php
    session_start();
    include('./../model/database.php');
    include('./../model/categories.php');
    include('./../model/products.php');
    if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
        $_SESSION['notification'] = 'Failed to log into. Please try again.';
        header('Location: /swdv280/index.php');
    }
    $product_id = filter_input(INPUT_GET, 'product_id', 
    FILTER_VALIDATE_INT);
    $product = get_item($product_id);
    $categories = get_categories();
    $name = '';
    $description = '';
    $price = 0;
    $cat_id = '';
    $item_id = 0;
    $errors = [];
    if (isset($_POST['edit'])) {
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
        $featured = filter_input(INPUT_POST, 'featured');

        if ($name == NULL || $description == NULL ||
                $price == FALSE || $cat_id == NULL) {            
            $errors[] = 'Invalid product data. Check all fields and try again.';
            include('../../errors/error.php');
        } else if ($price <= 0) {
            $errors[] = 'Price of item cannot be 0 or less than 0.';
            include('../../errors/error.php');
        } else if ($item_id <= 0) {
            $errors[] = 'ID of item cannot be 0 or less than 0.';
            include('../../errors/error.php');
        } else {
            // Update item to database
            update_item($name, $description, $price, $cat_id, $item_id, $featured);
            $_POST = [];
            //header("Refresh: 0");
            $_SESSION['Status Message'] = 'Item updated successfully.';
            header("Location: ../products.php");
        }
    }
?>

<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<body>
    <?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/hero.php'); ?>
    <?php include ( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/admin/modules/admin_bar.php'); ?>

    <main>

        <div class="container pt-5">
            <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
                if ($product == NULL || $product == 0 || $product === false): ?>
                    <div>The product you are looking for does not exist. If you believe this to be an error, please contact our support team.</div>
                <?php else: ?>

                <h3 class="pb-3">Update Product</h3>
                <h5>Updating <?php echo $product['Name']; ?></h5>

                <?php if($errors != []) {
                    foreach ($errors as $error) {
                        echo <<<EOL
                        <span class="d-block error">{$error}</span>
                        EOL;
                    }
                } ?>

                <form action="" method="post" class="row gy-2 gx-3 align-items-center pt-4">
                    <div class="col-auto">
                        <label for="name" class="fw-bold">Name of Product:</label>
                        <input type="text" class="form-control border border-3 rounded" value="<?php echo $product['Name']; ?>" id="name" name="name">
                    </div>

                    <div class="col-auto">
                        <label for="price" class="fw-bold">Price:</label>
                        <input type="text" class="form-control border border-3 rounded" value="<?php echo number_format($product['Price'], 2); ?>" id="price" name="price">
                    </div>

                    <div class="col-auto">
                        <label for="category" class="fw-bold">Select Category:</label>
                        <select class="form-select form-control border border-3 rounded" aria-label="select category" name="category">

                            <?php foreach ($categories as $category) : ?>
                                <?php if($product['CategoryId'] == $category['CategoryId']) {
                                    echo PHP_EOL . <<<EOL
                                    <option value="{$category['CategoryId']}" selected>{$category['CategoryType']}</option>
                                    EOL;
                                } else {
                                    echo PHP_EOL . <<<EOL
                                    <option value="{$category['CategoryId']}">{$category['CategoryType']}</option>
                                    EOL;
                                }
                            ?>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="featured" class="fw-bold">Will this be a featured product?</label>
                        <select class="form-select form-control border border-3 rounded" id="featured" aria-label="select featured" name="featured">
                            <?php if ($product['Featured'] == 'Yes') {
                                echo PHP_EOL . <<<EOL
                                <option value="Yes" selected="selected">Yes</option>
                                <option value="No">No</option>
EOL;
                            } else {
                                echo PHP_EOL . <<<EOL
                                <option value="Yes">Yes</option>
                                <option value="No" selected="selected">No</option>
EOL;
                            } ?>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="description" class="fw-bold">Description:</label>
                        <textarea class="form-control border border-3 rounded" rows="5" name="description" cols="100"><?php echo $product['Description']; ?></textarea>
                    </div>

                    <input type="hidden" name="item_id" value="<?php echo $product['ItemId']; ?>">
                    <div class="row-auto">
                        <button type="submit" class="btn btn-primary mt-4" name="edit">Update</button> <a href="/swdv280/admin/products.php" class="btn btn-warning mt-4 ms-3">Cancel</a>
                    </div>
                </form>

            <?php endif; ?>
        </div>
    </main>
</body>
</html>