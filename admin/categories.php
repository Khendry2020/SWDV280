<?php
session_start();
include('./model/database.php');
include('./model/categories.php');
$categories = get_categories();

if (isset($_POST['cat_id'])) {
    $_POST['cat_id'] = trim($_POST['cat_id']);

    $cat_id = filter_input(INPUT_POST, 'cat_id', FILTER_VALIDATE_INT);

    if ($cat_id == NULL) {            
        $error = 'Category ID is missing or invalid. Please call support.';
        include('../../errors/error.php');
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
  <?php include '../modules/head.php'; ?>
  <body>
    <main>
        <!--Navigation-->
      <div>
        <?php include './modules/admin_bar.php'; ?>
      </div>
        <div>
			<?php 
			
			if (isset($_SESSION['Status Message'])) {
					echo $_SESSION['Status Message'];
					unset($_SESSION['Status Message']);
			} 
			?>
				<a href="./add/add_category.php"> Add Category
				</a>

			<ul>
				<!-- display links for all categorys -->
				<?php foreach ($categories as $category) : ?>
				<li>
				<?php echo $category['CategoryType']; ?>
				<a href="<?php echo './edit/edit_category.php?cat_id=' . $category['CategoryId']; ?>"> Edit
				</a>
				<form action="" method="post" id="form<?php echo $category['CategoryId']; ?>">
					<input type="hidden" name="cat_id" value="<?php echo $category['CategoryId']; ?>" />
					<button name="delete" class="confirm-delete" rel="tooltip" title="Remove" id="<?php echo $category['CategoryId']; ?>">
						Delete
					</button>
				</form>
				</li>
				<?php endforeach; ?>
			</ul>
        </div>
    </main>
    <footer>
        <?php include '../modules/footer.php'; ?>
    </footer>
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
</html>