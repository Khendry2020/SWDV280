<?php
	session_start();
	include('./../model/database.php');
	include('./../model/categories.php');
    if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
        $_SESSION['notification'] = 'Failed to log into. Please try again.';
        header('Location: /swdv280/index.php');
    }
	
	$categorytype = '';
	$error = '';
	if (isset($_POST['add'])) {
		// Trim inputs
		$_POST['categorytype'] = trim($_POST['categorytype']);

		$categorytype = filter_input(INPUT_POST, 'categorytype');

		if ($categorytype == NULL) {            
			$_SESSION['notification'] = 'Category requires a name. Please try again.';
		} else {

			// Add category to database
			add_category($categorytype);
			$_POST = [];
			$_SESSION['notification'] = 'Category added successfully.';
			//header("Refresh: 0");
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
            <?php if($error != '') {echo $error;} ?>

			<h3>Add Category</h3>

            <form action="" method="post" enctype="post" class="row gy-2 gx-3 align-items-center pt-4">
                <div class="col-auto">
                    <label for="categorytype" class="fw-bold">Category Name:</label>
                    <input type="text" class="form-control border border-3 rounded" id="categorytype" name="categorytype">
                </div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary mt-3" name="add">Submit</button> <a href="/swdv280/admin/categories.php" class="btn btn-warning mt-3 ms-5">Cancel</a>
				</div>
            </form>

        </div>
    </main>
</body>
</html>