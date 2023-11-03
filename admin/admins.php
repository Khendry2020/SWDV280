<?php
session_start();
include('./model/database.php');
include('./model/admins.php');
$admins = display_admins();
$error = '';
if (isset($_POST['admin_id']) && $_POST['admin_id'] != 1) {
    $_POST['admin_id'] = trim($_POST['admin_id']);

    $admin_id = filter_input(INPUT_POST, 'admin_id', FILTER_VALIDATE_INT);

    if ($admin_id == NULL) {            
        $error = 'Admin ID is missing. Please call support.';
    } else {
        // Update category in database
        delete_admin($admin_id);
        $_POST = [];
        //header("Refresh: 0");
        $_SESSION['Status Message'] = 'Admin user deleted successfully.';
        header("Location: ./admins.php");
    }
}

?>

<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<body>
  	<h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4>
	<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
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
			<h4 class="pb-4"><a href="./add/add_admin.php" class=" btn btn-dark"> Add Admin User</a></h4>

			<table class="table table-bordered align-middle table-sm table-hover table-light center">
				<tr>
					<th>Admin Username</th>
					<th class="text-center">Edit Admin</th>
					<th class="text-center">Delete Admin</th>
				</tr>

				<?php foreach ($admins as $admin) : ?>
					<?php if($admin['AdminId'] != 1) : ?>

				<tr>
					<td><?php echo $admin['UserName']; ?></td>
					<td class="text-center">
						<a class="btn btn-warning text-light" href="<?php echo './edit/edit_admin.php?admin_id=' . $admin['AdminId']; ?>" style="width:80px"> Edit</a>
					</td>
					<td class="text-center">
						<?php if($error != '') {echo $error;} ?>
						<form action="" method="post" id="form<?php echo $admin['AdminId']; ?>">
							<input type="hidden" name="admin_id" value="<?php echo $admin['AdminId']; ?>" />
							<button name="delete" class="confirm-delete btn btn-danger" rel="tooltip" title="Remove" id="<?php echo $admin['AdminId']; ?>" style="width:80px">
								Delete
							</button>
						</form>
					</td>
				</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</table>
		</div>
    </main>

	<!-- Modal for Admin Users Deletion -->
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

			// get the current image
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