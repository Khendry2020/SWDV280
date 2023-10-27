<?php
session_start();
include './models/database.php';
include './models/categories_db.php';

$categories = get_categories();
?>
<!DOCTYPE html>
    <?php include './modules/head.php'; ?>
    <body>
        <?php include './modules/header.php'; ?>
        <main> 
            <div class="container">
                <h2>Furniture Categories</h2>
                    <ul>
                        <!-- display links for all categories -->
                        <?php foreach ($categories as $category) : ?>
                        <li>
                            <a class="text-body" href="<?php echo $app_path . 'controller' . 
                                '?action=list_products' .
                                '&amp;category_id=' . $category['CategoryId']; ?>">
                                <?php echo $category['CategoryType']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
            </div>
        </main>
        <?php include './modules/footer.php'; ?>
    </body>
</html>