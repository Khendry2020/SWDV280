<h1>Update Product</h1>
<h2>Updating <?php echo $product['Name']; ?></h2>
<form action="." method="post">
<div class="mb-3">
        <label for="name">Name of Product</label>
        <input type="text" value="<?php echo $product['Name']; ?>" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="price">Price</label>
        <input type="text" value="<?php echo $product['Price']; ?>" id="price" name="price">
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
        <textarea name="description"><?php echo $product['Description']; ?></textarea>
    </div>
    <input type="hidden" name="item_id" value="<?php echo $product['ItemId']; ?>">
    <input type="hidden" name="action" value="update_item" />
    <input type="submit" name="edit" value="Update">
</form>