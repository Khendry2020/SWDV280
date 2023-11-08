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
        <?php include './modules/hero.php'; ?>
        <?php include './modules/header.php'; ?>
        <main> 
            <div class="container">
                <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
                    if ($category == NULL || $category == 0 || $category === false): ?>
                    <div>The category you are looking for does not exist. Please hit the back button in your browser. If you believe this is an error, please contact support.</div>
                    <?php else: ?>
                    <h3><a class="link-dark" href="gallery.php"><p class="py-3 my-0 fs-6 fw-light">Back to Categories</p></a></h3> 
                    <h2 class="text-center">
                        <?php echo $category['CategoryType']; ?>
                    </h2>
                <?php // Check if the category has products. If not, say no products otherwise show them.
                    if (count($products) == 0) : ?>
                    <ul>
                        <li>There are no products in this category.</li>
                    </ul>

                    <?php else: ?>

                     <!--Cards for products listed in 2 columns per row-->
                    <div class="row row-cols-2 g-4">
                    <?php foreach ($products as $product) : ?>
                        <div class="col">                        
                            <div class="card img-fluid mx-auto h-100 col-8 col-sm-6 col-md-4 col-lg-4 my-auto">                               
                                    <img class="rounded" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['Img']); ?>" alt="<?php echo $product['Name']; ?>" />
                                    <div class="card-body">
                                        <a class="card-title" href="product.php?product_id=<?php
                                                echo $product['ItemId']; ?>">
                                            <?php echo $product['Name']; ?>
                                        </a>                                   
                                    </div>
                            </div>                                   
                        </div>
                        <?php endforeach; ?>        
                    </div>

                    <?php endif; ?>

                <?php endif; ?>

            </div><br>

        </main>
        <?php include './modules/footer.php'; ?>
    </body>
</html>