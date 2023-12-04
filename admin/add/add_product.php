<?php
    session_start();
    include('./../model/database.php');
    include('./../model/categories.php');
    include('./../model/products.php');
    if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
        $_SESSION['notification'] = 'Failed to log into. Please try again.';
        header('Location: /SWDV280/index.php');
    }
    $categories = get_categories();

    $name = '';
    $description = '';
    $price = '';
    $category_id = '';
    $errors = [];
    if (isset($_POST['add'])) {
        // Trim inputs
        $_POST['name'] = trim($_POST['name']);
        $_POST['description'] = trim($_POST['description']);
        $_POST['price'] = trim($_POST['price']);
        $_POST['category'] = trim($_POST['category']);
        $_POST['condition'] = trim($_POST['condition']);


        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $category_id = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);
        $condition = filter_input(INPUT_POST, 'condition');
        $featured = filter_input(INPUT_POST, 'featured');

        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        // Allow certain file formats 
        $allowTypes = array('jpg'); 
        $img = NULL;
        if(in_array($fileType, $allowTypes)){ 
            $img = file_get_contents($_FILES['image']['tmp_name']);
        } else {
            $errors[] = 'Sorry, only JPG, JPEG, files are allowed to upload.';
        } 
        
        if ($name == NULL || $description == NULL ||
                $price == FALSE || $category_id == NULL || $condition == NULL || $featured == NULL || $img == NULL ) {            
            $errors[] = 'Invalid product data. Check all fields and try again.';
        } else if ($price <= 0) {
            $errors[] = 'Price of item cannot be 0 or less than 0.';
        } else {
            // Add item to database
            add_item($category_id, $name, $description, $price, $condition, $img, $featured);

            $_POST = [];

            $_SESSION['notification'] = 'Item added successfully.';
            header("Location: ../products.php");
        }
    }

?>

<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/modules/head.php'); ?>
<body>
    <?php include( $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/modules/hero.php'); ?>
    <?php include ( $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/admin/modules/admin_bar.php'); ?>
    <main>
        <div class="container pt-5">
            <?php if($errors != []) {
                foreach ($errors as $error) {
                    echo <<<EOL
                    <span class="d-block text-danger small">{$error}</span>
                    EOL;
                }
            } ?>
            <div class="row">
                <h3>Add Product</h3>

                <form action="" method="post" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center pt-4">
                    <div class="col-auto">
                        <label for="name" class="fw-bold">Name:</label> <span class="text-danger small ms-3"></span>
                        <input type="text" class="form-control border border-3 rounded" id="name" name="name" value="<?php if (isset($_POST['name'])){ echo $_POST['name'];}; ?>">
                    </div>

                    <div class="col-auto">
                        <label for="image" class="fw-bold">Image:</label> <span class="text-danger small ms-3"></span>
                        <input type="file" class="form-control border border-3 rounded" id="image" name="image">
                    </div>

                    <div class="col-auto">
                        <label for="price" class="fw-bold">Price:</label> <span class="text-danger small ms-3"></span>
                        <input type="number" class="form-control border border-3 rounded" step="0.01" min=0 id="price" name="price" value="<?php if (isset($_POST['price'])){ echo $_POST['price'];}; ?>">
                    </div>
                    <div class="col-auto">
                        <label for="condition" class="fw-bold">Condition:</label> <span class="text-danger small ms-3"></span>
                        <select class="form-select form-control border border-3 rounded" id="condition" aria-label="select condition" name="condition">
                            <option value="Good">Good</option>
                            <option value="Excellent" selected="selected">Excellent</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="category" class="fw-bold">Select Category:</label> <span class="text-danger small ms-3"></span>

                        <select class="form-select form-control border border-3 rounded" aria-label="select category" name="category">
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['CategoryId']; ?>"><?php echo $category['CategoryType']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="description" class="form-label">Description</label> <span class="text-danger small ms-3"></span>
                        <textarea class="form-control border border-3 rounded" id="description" name="description" cols="100"><?php if (isset($_POST['description'])){ echo $_POST['description'];}; ?></textarea>
                    </div>
                    <div class="col-auto">
                        <label for="featured" class="fw-bold">Will this be a featured product?</label> <span class="text-danger small ms-3"></span>
                        <select class="form-select form-control border border-3 rounded" id="featured" aria-label="select featured" name="featured">
                            <option value="Yes">Yes</option>
                            <option value="No" selected="selected">No</option>
                        </select>
                    </div>
                    <div class="row-auto">
                        <button type="submit" class="btn btn-primary mt-3" name="add" id="submit-form">Submit</button> <a href="/SWDV280/admin/products.php" class="btn btn-warning mt-3 ms-5">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="/SWDV280/admin/scripts/add-product-validator.js"></script>
</body>
</html>