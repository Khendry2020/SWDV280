<?php
session_start();
include('./../model/database.php');
include('./../model/categories.php');
include('./../model/products.php');
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
        update_item($name, $description, $price, $cat_id, $item_id);
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
    <main>
        <!--Navigation-->
      <div>
        <?php include '../modules/admin_bar.php'; ?>
      </div>
        <div>
        <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
                 if ($product == NULL || $product == 0 || $product === false): ?>
                <div>The product you are looking for does not exist. If you believe this to be an error, please contact our support team.</div>
            <?php else: ?>
            <h1>Update Product</h1>
            <h2>Updating <?php echo $product['Name']; ?></h2>
            <?php if($errors != []) {
                foreach ($errors as $error) {
                    echo <<<EOL
            <span class="d-block error">{$error}</span>
EOL;
                }
            } ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name">Name of Product</label>
                    <input type="text" value="<?php echo $product['Name']; ?>" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="text" value="<?php echo number_format($product['Price'], 2); ?>" id="price" name="price">
                </div>
                <div class="mb-3">
                <!-- TODO pull from database -->
                    <label for="category" class="form-label">Select Category</label>
                    <select class="form-select" aria-label="select category" name="category">
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
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3"><?php echo $product['Description']; ?></textarea>
                </div>
                <input type="hidden" name="item_id" value="<?php echo $product['ItemId']; ?>">
                <button type="submit" class="btn btn-primary mt-3" name="edit">Update</button>
            </form>
            <?php endif; ?>
        </div>
    </main>
  </body>
</html>