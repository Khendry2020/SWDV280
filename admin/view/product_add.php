<form action="./index.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" step="0.01" min=0 id="price" name="price">
  </div>
  <div class="mb-3">
    <!-- TODO pull from database -->
    <label for="category" class="form-label">Select Category</label>
    <select class="form-select" aria-label="select category" name="category">
        <?php foreach ($categories as $category) : ?>
        <option value=" <?php echo $category['CategoryId']; ?>"><?php echo $category['CategoryType']; ?></option>
        <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
  <input type="hidden" name="action" value="insert_product" />
  <button type="submit" class="btn btn-primary">Submit</button>
</form>