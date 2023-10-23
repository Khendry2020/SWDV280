<h1>Update Category</h1>
<h2>Updating <?php echo $category['CategoryType']; ?></h2>
<form action="." method="post">
<div class="mb-3">
        <label for="categorytype">Category Name</label>
        <input type="text" value="<?php echo $category['CategoryType']; ?>" id="categorytype" name="categorytype">
        <input type="hidden" name="cat_id" value="<?php echo $category['CategoryId']; ?>">
        <input type="hidden" name="action" value="update_category" />
    </div>
    <input type="submit" name="edit" value="Update">
</form>