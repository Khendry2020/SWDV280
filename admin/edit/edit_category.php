<?php
session_start();
include('./../model/database.php');
include('./../model/categories.php');
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
        $_SESSION['Status Message'] = 'Category updated successfully.';
        header("Location: ../categories.php");
    }
}
?>
<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
  <body>
    <main>
        <!--Navigation-->
      <div>
        <?php include '../modules/admin_bar.php'; ?>
      </div>
        <div>
        <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
                 if ($category == NULL || $category == 0 || $category === false): ?>
                <div>The category you are looking for does not exist. If you believe this to be an error, please contact our support team.</div>
            <?php else: ?>
            <h1>Update Category</h1>
            <h2>Updating <?php echo $category['CategoryType']; ?></h2>
            <?php if($error != '') {echo $error;} ?>
            <form action="" method="post">
            <div class="mb-3">
                    <label for="categorytype">Category Name</label>
                    <input type="text" value="<?php echo $category['CategoryType']; ?>" id="categorytype" name="categorytype">
                    <input type="hidden" name="cat_id" value="<?php echo $category['CategoryId']; ?>">
                    <input type="hidden" name="action" value="update_category" />
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="edit">Update</button>
            </form>
            <?php endif; ?>
        </div>
    </main>
  </body>
</html>