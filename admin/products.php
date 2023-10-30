<?php
session_start();
include('./model/database.php');
include('./model/products.php');
$products = get_items();

if (isset($_POST['product_id'])) {
    $_POST['product_id'] = trim($_POST['product_id']);

    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

    if ($product_id == NULL) {            
        $error = 'Product ID is missing or invalid. Please call support.';
        include('../../errors/error.php');
    } else {
        // Update category in database
        delete_item($product_id);

        $_POST = [];
        //header("Refresh: 0");
        $_SESSION['Status Message'] = 'Item deleted successfully.';
        header("Location: ./products.php");
    }
}
?>

<!DOCTYPE html>
  <?php include '../modules/head.php'; ?>
  <body>
  	<h1 class="text-center bg-dark text-light m-0 p-0">
      Administration
    </h1>
	<?php include './modules/hero.php'; ?>
    <main>
        <!--Navigation-->
		<div>
			<?php include './modules/admin_bar.php'; ?>
		</div>
        <div class="container">
			<div class="row">
				<div class="col">
			<?php 
			
			if (isset($_SESSION['Status Message'])) {
					echo $_SESSION['Status Message'];
					unset($_SESSION['Status Message']);
			} 
			?>
					<a href="./add/add_product.php"> Add Product</a>
					<ul>
						<!-- display links for all products -->
						<?php foreach ($products as $product) : ?>
						<li>
						<?php echo $product['Name']; ?>
						<img class="img-fluid rounded product-img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['Img']); ?>" alt="<?php echo $product['Name']; ?>" /> 
						<a href="<?php echo './edit/edit_product.php?product_id=' . $product['ItemId']; ?>"> Edit</a>
						<form action="" method="post" id="form<?php echo $product['ItemId']; ?>">
							<input type="hidden" name="product_id" value="<?php echo $product['ItemId']; ?>" />
							<button name="delete" class="confirm-delete" rel="tooltip" title="Remove" id="<?php echo $product['ItemId']; ?>">
								Delete
							</button>
						</form>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
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
			
			// get the current image/form id
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