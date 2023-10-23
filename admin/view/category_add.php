<form action="./index.php" method="post">
  <div class="mb-3">
    <label for="categorytype" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="categorytype" name="categorytype">
  </div>
  <input type="hidden" name="action" value="insert_category" />
  <button type="submit" class="btn btn-primary">Submit</button>
</form>