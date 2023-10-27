<?php
session_start();
include './models/database.php';
include './models/categories_db.php';
include './models/products_db.php';
$cat_id = filter_input(INPUT_GET, 'cat_id', 
FILTER_VALIDATE_INT);
$category = get_category($cat_id);
if($category != NULL || $category != 0 || $category !== false) {
$products = get_items_by_category($category['CategoryId']);
}
?>
<!DOCTYPE html>
    <?php include './modules/head.php'; ?>
    <body>
        <?php include './modules/header.php'; ?>
        <main> 
            <div class="container">
                <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
                    if ($category == NULL || $category == 0 || $category === false): ?>
                    <div>The category you are looking for does not exist. Please hit the back button in your browser. If you believe this is an error, please contact support.</div>
                <?php else: ?>
                    <h2>
                        <?php echo $category['CategoryType']; ?>
                    </h2>
                <?php // Check if the category has products. If not, say no products otherwise show them.
                    if (count($products) == 0) : ?>
                    <ul>
                        <li>There are no products in this category.</li>
                    </ul>

                    <?php else: ?>

                    <ul>
                        <?php foreach ($products as $product) : ?>
                        <li>
                            <a class="text-body" href="?action=view_product&amp;product_id=<?php
                                    echo $product['ItemId']; ?>">
                                <?php echo $product['Name']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <?php endif; ?>

                <?php endif; ?>

            </div>

        </main>
        <?php include './modules/footer.php'; ?>
    </body>
</html>