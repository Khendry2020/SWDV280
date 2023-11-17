<?php
session_start();
include('./model/database.php');
include('./model/categories.php');
$categories = get_categories();
$error = '';
if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
	$_SESSION['notification'] = 'Failed to log into. Please try again.';
	header('Location: /swdv280/index.php');
  }
if (isset($_POST['cat_id'])) {
    $_POST['cat_id'] = trim($_POST['cat_id']);

    $cat_id = filter_input(INPUT_POST, 'cat_id', FILTER_VALIDATE_INT);

    if ($cat_id == NULL) {            
        $error = 'Category ID is missing or invalid. Please call support.';
    } else {
        // Update category in database
        delete_category($cat_id);

        $_POST = [];
        //header("Refresh: 0");
        $_SESSION['Status Message'] = 'Category deleted successfully.';
        header("Location: ./categories.php");
    }
}

?>

<!DOCTYPE html>
	<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
  	<body>
		<h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4> 
		<?php include './modules/hero.php'; ?>
		<?php include './modules/admin_bar.php'; ?>
		<main>
			<div class="container pt-5">
				<?php
					if (isset($_SESSION['Status Message'])) {
						echo $_SESSION['Status Message'];
						unset($_SESSION['Status Message']);
					} 
				?>
				<h4 class="pb-4"><a href="./add/add_category.php" class=" btn btn-dark"> Add Category</a></h4>

				<table class="table table-bordered align-middle table-sm table-hover table-light center">
					<tr>
						<th>Category Name</th>
						<th class="text-center">Edit Category</th>
						<th class="text-center">Delete Category</th>
					</tr>
					<?php foreach ($categories as $category) : ?>
					<tr>
						<td><?php echo $category['CategoryType']; ?></td>
						<td class="text-center">
							<a class="btn btn-warning text-light" href="<?php echo './edit/edit_category.php?cat_id=' . $category['CategoryId']; ?>" style="width:80px"> Edit</a>
						</td>
						<td class="text-center" >
							<?php if($error != '') {echo $error;} ?>
							<form action="" method="post" id="form<?php echo $category['CategoryId']; ?>">
								<input type="hidden" name="cat_id" value="<?php echo $category['CategoryId']; ?>" />
								<button name="delete" class="confirm-delete btn btn-danger" rel="tooltip" title="Remove" id="<?php echo $category['CategoryId']; ?>" style="width:80px">
									Delete
								</button>
							</form>	
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</main>


		<!-- Delete Category? -->
		<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 id="myModalLabel">Are you sure?</h3>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>You are about to delete. Do you want to proceed?</p>
					</div>
					<div class="modal-footer">
						<button id="btnDelete" class="btn btn-danger">Yes</button>
						<button data-bs-dismiss="modal" aria-hidden="true" class="btn btn-secondary">No</button>
					</div>
				</div>
			</div>
		</div>
		<script>
			$('.confirm-delete').on('click', function(e) {
				// preven form submit
				e.preventDefault();

				// get the current form id
				var id = $(this).attr("id")
				// assign the current id to the modal
				$('#myModal').data('id', id).modal('show');
			});

			$('#btnDelete').click(function() {
				// handle deletion here
				var id = $('#myModal').data('id');
				// submit the form
				$('#form'+id).submit();

				// hide modal
				$('#myModal').modal('hide');
			});
		</script>
	</body>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/swdv280/modules/notification.php"); ?>
</html>