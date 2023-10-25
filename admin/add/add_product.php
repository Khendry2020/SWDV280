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

    $image_file = $_FILES["image"];

    // Exit if no file uploaded
    if (!isset($image_file)) {
        $error = 'An image is required for the product.';
        include('../../errors/error.php');
    }
    
    // Exit if image file is zero bytes
    if (filesize($image_file["tmp_name"]) <= 0) {
        $error = 'Uploaded image has no contents.';
        include('../../errors/error.php');
    }
    
    // Exit if is not a valid image file
    $image_type = exif_imagetype($image_file["tmp_name"]);
    if (!$image_type) {
        $error = 'The file uploaded was not an image.';
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
        // Get file extension based on file type, to prepend a dot we pass true as the second parameter
        $image_extension = image_type_to_extension($image_type, true);
        
        // Create a unique image name
        $image_name = bin2hex(random_bytes(16)) . $image_extension;

        // Add item to database
        add_item($category_id, $name, $description, $price, $image_name);

        // Move the temp image file to the images directory
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],
        
            // New image location
            "../../images/products/" . $image_name
        );
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