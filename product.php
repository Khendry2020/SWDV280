<?php
session_start();
include './models/database.php';
include './models/products_db.php';
$product = [];
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
$product = get_item($product_id);

if ($product != NULL || $product_id != 0 || $product !== false) {

    $category_id = $product['CategoryId'];
    $category_name = $product['CategoryType'];
    $product_name = $product['Name'];

    $product_image = $product['Img'];

    //$image = $product['ImageName'];
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
    <?php include './modules/hero.php'; ?>
    <?php include './modules/header.php'; ?>
    <main>
        <div class="container mx-auto text-center pt-2">
            <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
            if ($product == NULL || $product == 0 || $product === false) : ?>
                <p class="fs-6 text-center">The product you are looking for does not exist. Please hit the back button in your browser. If you believe this is an error, please contact support.</p>
            <?php else : ?>

                <h4 class="fs-4 pb-1"><?php echo $product_name; ?></h4>
                <div class="">
                    <img class="img-fluid rounded product-img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product_image); ?>" alt="<?php echo $product_name; ?>" />
                </div>
                <div class="py-2">
                    <p class="fs-6 text-justify"><?php echo $description; ?></p>
                    <p><b>List Price:<?php echo '$' . $list_price; ?></b></p>
                    <?php if ($_SESSION['LoggedIn'] == true) { ?>
                        <form action="reserve/models/reserveItem.php?id= <?php echo $product_id ?>" method="post">
                            <input type="hidden" name="action" value="reserve_item">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <input class="btn btn-dark" type="submit" value="Reserve Item">
                        </form>
                    <?php } else { ?>
                        <a class="btn btn-dark" href="signup.php">Sign up for an account to reserve an item</a>
                    <?php } ?>
                </div>
                <!-- check this functionality -->
                <a class="link-dark" href="category.php?cat_id=<?php echo $category_id; ?>">
                    <p class="py-1 my-0 fs-6 fw-light">Back to <?php echo $category_name; ?></p>
                </a>
            <?php endif; ?>
        </div>
    </main>
    <?php include './modules/footer.php'; ?>
</body>

</html>