<?php if (isset($_SESSION['Status Message'])) {
        echo $_SESSION['Status Message'];
        unset($_SESSION['Status Message']);
} ?>
<?php
    $categories = get_categories();
?>
    <a href="<?php echo $app_path . 'controller' . 
            '?action=add_category'; ?>"> Add Category
    </a>

<ul>
    <!-- display links for all products -->
    <?php foreach ($categories as $category) : ?>
    <li>
    <?php echo $category['CategoryType']; ?>
    <form>
    <a href="<?php echo $app_path . 'controller' . 
            '?action=edit_category' .
            '&amp;cat_id=' . $category['CategoryId']; ?>"> Edit
    </a>
    </form>
    <form action="./index.php" method="post">
    <input type="hidden" name="cat_id" value="<?php echo $category['CategoryId']; ?>" />
    <input type="hidden" name="action" value="delete_category" />
    <input type="submit" value="Delete">
    </form>
    </li>
    <?php endforeach; ?>
</ul>
<!--     <a href="<?php echo $app_path . 'controller' . 
            '?action=delete_category' .
            '&amp;category_id=' . $category['CategoryId']; ?>"> Delete
    </a> -->