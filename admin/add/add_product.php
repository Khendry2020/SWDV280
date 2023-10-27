<?php
session_start();
include('./../model/database.php');
include('./../model/categories.php');
include('./../model/products.php');
// Get categories for dropdown
$categories = get_categories();

$name = '';
$description = '';
$price = '';
$category_id = '';

if (isset($_POST['add'])) {
    // Trim inputs
    $_POST['name'] = trim($_POST['name']);
    $_POST['description'] = trim($_POST['description']);
    $_POST['price'] = trim($_POST['price']);
    $_POST['category'] = trim($_POST['category']);

    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $category_id = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);

    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg'); 
    if(in_array($fileType, $allowTypes)){ 
        $img = file_get_contents($_FILES['image']['tmp_name']);
    } else {
        $error = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        include('../../errors/error.php');
    } 
    
    if ($name == NULL || $description == NULL ||
            $price == FALSE || $category_id == NULL) {            
        $error = 'Invalid product data. Check all fields and try again.';
        include('../../errors/error.php');
    } else if ($price <= 0) {
        $error = 'Price of item cannot be 0 or less than 0.';
        include('../../errors/error.php');
    } else {
        // Add item to database
        add_item($category_id, $name, $description, $price, $img);

        $_POST = [];

        $_SESSION['Status Message'] = 'Item added successfully.';
        header("Location: ../products.php");
    }
}

?>

<!DOCTYPE html>
  <?php include '../../modules/head.php'; ?>
  <body>
    <main>
        <!--Navigation-->
      <div>
        <?php include '../modules/admin_bar.php'; ?>
      </div>
        <div>
            <form action="" method="post" enctype="multipart/form-data">
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
                <button type="submit" class="btn btn-primary mt-3" name="add">Submit</button>
            </form>
        </div>
    </main>
    <footer>
        <?php include '../../modules/footer.php'; ?>
    </footer>
  </body>
</html>