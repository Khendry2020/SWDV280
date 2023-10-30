<?php
session_start();
include './models/database.php';
include './models/categories_db.php';

$categories = get_categories();

function urlize($text)
{
    setlocale(LC_ALL, 'en_US.utf8');
    return strtolower(trim(preg_replace('/[^\\p{L}0-9]+/', '-', str_replace(['\'', '.'], '', iconv('UTF-8', 'ASCII//TRANSLIT', $text))), '-'));
}

?>
<!DOCTYPE html>
    <?php include './modules/head.php'; ?>
    <body>
        <?php include './modules/header.php'; ?>
        <main> 
            <div class="container text-center">
                
                <h2>Furniture Categories</h2>
                <div class="row text-center py-3">
                        <!-- display links for all categories -->
                    <?php foreach ($categories as $category) : ?>
                    <?php $image_url = urlize($category['CategoryType']); ?>

                        <div class="col-lg-3 col-6 pb-3">

                            <div class="card pb-0">
                                <a class="text-body text-decoration-none" href="<?php echo 
                                    'category.php?cat_id=' . $category['CategoryId']; ?>">
                                    
                                    <img src="https://placehold.co/600x400/png" alt="<?php echo $category['CategoryType']; ?>" class="img-fluid rounded gallery-img card-img-top" style="width: 100%">
                                    
                                    <div class="card-footer pt-3">

                                        <p><?php echo $category['CategoryType']; ?></p>
                                    </div>
                                    
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
        <?php include './modules/footer.php'; ?>
    </body>
</html>