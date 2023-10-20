<!DOCTYPE html>
    <?php include '../modules/head.php'; ?>
    <body>
        <main>
            <div>
                <?php include '../modules/header.php'; ?>
            </div>  
            <section>
                <h1>
                    <?php echo $current_category['CategoryType']; ?>
                </h1>
            <?php if (count($products) == 0) : ?>
                <ul>
                    <li>There are no products in this category.</li>
                </ul>
            <?php else: ?>
                <ul>
                <?php foreach ($products as $product) : ?>
                    <li>
                        <a href="?action=view_product&amp;product_id=<?php
                                echo $product['ItemId']; ?>">
                            <?php echo $product['Name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            </section>
        </main>
        <footer>
            <?php include '../modules/footer.php'; ?>
        </footer>
    </body>
</html>