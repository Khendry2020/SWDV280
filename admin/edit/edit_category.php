<?php
session_start();
include('./../model/database.php');
include('./../model/categories.php');
if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
    $_SESSION['notification'] = 'Failed to log into. Please try again.';
    header('Location: /swdv280/index.php');
}
$cat_id = filter_input(INPUT_GET, 'cat_id', 
FILTER_VALIDATE_INT);
$category = get_category($cat_id);
$name = '';
$cat_id = '';
$error = '';
if (isset($_POST['edit'])) {
    $_POST['categorytype'] = trim($_POST['categorytype']);
    $_POST['cat_id'] = trim($_POST['cat_id']);

    $name = filter_input(INPUT_POST, 'categorytype');
    $cat_id = filter_input(INPUT_POST, 'cat_id', FILTER_VALIDATE_INT);

    if ($name == NULL) {            
        $error = 'Category requires a name, please try again.';
        //include('../../errors/error.php');
    } else {
        // Update category in database
        update_category($name, $cat_id);

        $_POST = [];
        //header("Refresh: 0");
        $_SESSION['notification'] = 'Category updated successfully.';
        header("Location: ../categories.php");
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
            <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
                if ($category == NULL || $category == 0 || $category === false): ?>
                    <div>The category you are looking for does not exist. If you believe this to be an error, please contact our support team.</div>
                <?php else: ?>

                <h3 class="pb-3">Update Category</h3>
                <h5>Updating <?php echo $category['CategoryType']; ?></h5>

                <?php if($error != '') {echo $error;} ?>

                <form action="" method="post" class="row gy-2 gx-3 align-items-center pt-4">
                    <div class="col-auto">
                        <label for="categorytype" class="fw-bold">Category Name:</label>
                        <input type="text" class="form-control border border-3 rounded" value="<?php echo $category['CategoryType']; ?>" id="categorytype" name="categorytype">
                        <input type="hidden" name="cat_id" value="<?php echo $category['CategoryId']; ?>">
                        <input type="hidden" name="action" value="update_category" />
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mt-4" name="edit">Update</button> <a href="/swdv280/admin/categories.php" class="btn btn-warning mt-4 ms-3">Cancel</a>
                    </div>

                </form>

            <?php endif; ?>
        </div>
    </main>
</body>
</html>