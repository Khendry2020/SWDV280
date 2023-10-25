<?php
session_start();
include('./../model/database.php');
include('./../model/categories.php');

$categorytype = '';

if (isset($_POST['add'])) {
    // Trim inputs
    $_POST['categorytype'] = trim($_POST['categorytype']);

    $categorytype = filter_input(INPUT_POST, 'categorytype');

    if ($categorytype == NULL) {            
        $error = 'Category requires a name. Please try again.';
        include('./../errors/error.php');
    } else {

        // Add category to database
        add_category($categorytype);
        $_POST = [];
        $_SESSION['Status Message'] = 'Category added successfully.';
        header("Refresh: 0");
        header("Location: ../categories.php"); 
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
            <form action="" method="post" enctype="post">
                <div class="mb-3">
                    <label for="categorytype" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="categorytype" name="categorytype">
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