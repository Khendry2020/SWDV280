<?php
session_start();
include('models/database.php');
include('models/users.php');

if (isset($_POST['create'])) {
    // Trim inputs
    $_POST['name'] = trim($_POST['name']);
    $_POST['description'] = trim($_POST['description']);
    $_POST['price'] = trim($_POST['price']);
    $_POST['category'] = trim($_POST['category']);

    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $category_id = filter_input(INPUT_POST, 'category', FILTER_VALIDATE_INT);

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
<?php include './modules/head.php'; ?>

<body>
  <?php include './modules/hero.php'; ?>
  <main>
    <!--Navigation-->
    <div>
      <?php include './modules/header.php'; ?>
    </div>
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <button type="submit" class="btn btn-primary mt-3" name="add">Submit</button>
    </form>
  </main>
  <footer>
    <?php include './modules/footer.php'; ?>
  </footer>
</body>

</html>