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


        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        // Allow certain file formats 
        $allowTypes = array('jpg'); 
        if(in_array($fileType, $allowTypes)){ 
            $img = file_get_contents($_FILES['image']['tmp_name']);
        } else {
            $errors[] = 'Sorry, only JPG, JPEG, files are allowed to upload.';
        } 
        
        if ($name == NULL || $description == NULL ||
                $price == FALSE || $category_id == NULL || $condition) {            
            $errors[] = 'Invalid product data. Check all fields and try again.';
        } else if ($price <= 0) {
            $errors[] = 'Price of item cannot be 0 or less than 0.';
        } else {
            // Add item to database
            add_item($category_id, $name, $description, $price, $condition, $img);

            $_POST = [];

            $_SESSION['Status Message'] = 'Item added successfully.';
            header("Location: ../products.php");
        }
    }

?>

<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<body>
    <?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/hero.php'); ?>
    <?php include ( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/admin/modules/admin_bar.php'); ?>
    <main>
        <div class="container pt-5">
            <?php if($errors != []) {
                foreach ($errors as $error) {
                    echo <<<EOL
                    <span class="d-block error">{$error}</span>
                    EOL;
                }
            } ?>

            <h3>Add Product</h3>

            <form action="" method="post" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center pt-4">
                <div class="col-auto">
                    <label for="name" class="fw-bold">Name:</label>
                    <input type="text" class="form-control border border-3 rounded" id="name" name="name">
                </div>

                <div class="col-auto">
                    <label for="image" class="fw-bold">Image:</label>
                    <input type="file" class="form-control border border-3 rounded" id="image" name="image">
                </div>

                <div class="col-auto">
                    <label for="price" class="fw-bold">Price:</label>
                    <input type="number" class="form-control border border-3 rounded" step="0.01" min=0 id="price" name="price">
                </div>
                <div class="col-auto">
                    <label for="condition" class="fw-bold">Condition:</label>
                    <input type="text" class="form-control border border-3 rounded" id="condition" name="condition">
                </div>
                <div class="col-auto">
                    <label for="category" class="fw-bold">Select Category:</label>

                    <select class="form-select form-control border border-3 rounded" aria-label="select category" name="category">
                        <?php foreach ($categories as $category) : ?>
                        <option value=" <?php echo $category['CategoryId']; ?>"><?php echo $category['CategoryType']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-auto">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control border border-3 rounded" id="description" name="description" cols="100"></textarea>
                </div>

                <div class="row-auto">
                    <button type="submit" class="btn btn-primary mt-3" name="add">Submit</button> <a href="/swdv280/admin/products.php" class="btn btn-warning mt-3 ms-5">Cancel</a>
                </div>
            </form>

        </div>

    </main>
</body>
</html>