<?php 
$products = get_items();
if (isset($_SESSION['Status Message'])) {
        echo $_SESSION['Status Message'];
        unset($_SESSION['Status Message']);
} 
?>
    <a href="<?php echo $app_path . 'controller' . 
            '?action=add_product'; ?>"> Add Product
    </a>

<ul>
    <!-- display links for all products -->
    <?php foreach ($products as $product) : ?>
    <li>
    <?php echo $product['Name']; ?>
    <form>
    <a href="<?php echo $app_path . 'controller' . 
            '?action=edit_product' .
            '&amp;product_id=' . $product['ItemId']; ?>"> Edit
    </a>
    </form>
    <form action="./index.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo $product['ItemId']; ?>" />
    <input type="hidden" name="action" value="delete_product" />
    <input type="submit" value="Delete">
    </form>
    </li>
    <?php endforeach; ?>
</ul>
<!--     <a href="<?php echo $app_path . 'controller' . 
            '?action=delete_product' .
            '&amp;product_id=' . $product['ItemId']; ?>"> Delete
    </a> -->