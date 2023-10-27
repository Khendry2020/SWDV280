<?php
session_start();
include './models/database.php';
include './models/categories_db.php';
include './models/products_db.php';
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
$product = get_item($product_id);
if ($product != NULL || $product != 0 || $product !== false) {

$category_id = $product['CategoryId'];
$product_name = $product['Name'];
$image = $product['ImageName'];
//$product_name = 'Placeholder';  
$description = $product['Description'];
$list_price = number_format($product['Price'], 2);
//$discount_percent = $product['discountPercent'];

// Add HMTL tags to the description
//$description_tags = add_tags($description);

// Calculate discounts
//$discount_amount = round($list_price * ($discount_percent / 100), 2);
//$discount_percent = 0;
//$discount_amount = 0;
//$unit_price = $list_price - $discount_amount;

// Format discounts
//$discount_percent_f = number_format($discount_percent, 0);
//$discount_amount_f = number_format($discount_amount, 2);
//$unit_price_f = number_format($unit_price, 2);

/*
    <!--<p><b>Discount:</b>
    <?php echo $discount_percent_f . '%'; ?></p>-->
    <p><b>Your Price:</b>
    <?php echo '$' . $unit_price_f; ?>
    (You save <?php echo '$' . $discount_amount_f; ?>)</p>

    <p class="fs-5"><?php echo $product_name; ?></p>
*/

}
?>
<!DOCTYPE html>
    <?php include './modules/head.php'; ?>
    <body>
        <?php include './modules/header.php'; ?>
        <main>
            <div class="container mx-auto text-center">
                <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
                    if ($product == NULL || $product == 0 || $product === false): ?>
                    <p class="fs-6 text-center">The product you are looking for does not exist. Please hit the back button in your browser. If you believe this is an error, please contact support.</p>
                <?php else: ?>
                    <h4 class="fs-4 pb-1"><?php echo $product_name; ?></h4>
                    <div class="">
                        <img class="img-fluid rounded product-img" src="./images/products/<?php echo $image; ?>" alt="<?php echo $product_name; ?>"/> 
                    </div>
                    <div class="py-4">
                        <p class="fs-6 text-justify"><?php echo $description; ?></p>
                        <p><b>List Price:<?php echo '$' . $list_price; ?></b></p>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="reserve_item">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <input type="submit" value="Reserve Item">
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </main>
        <?php include './modules/footer.php'; ?>
    </body>
</html>