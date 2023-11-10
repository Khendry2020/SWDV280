<?php
session_start();
include('./model/database.php');
include('./model/products.php');

// Pagination
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

// Get number per page, set first page, count products, create number of pages
$results_per_page = 10;  
$page_first_result = ($page-1) * $results_per_page;

$count = get_product_count();
$number_of_page = ceil ($count / $results_per_page);  


$products = get_items_paginated($page_first_result, $results_per_page);
$error = '';


// Deletion
if (isset($_POST['product_id'])) {
	$_POST['product_id'] = trim($_POST['product_id']);

	$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

	if ($product_id == NULL) {
		$error = 'Product ID is missing or invalid. Please call support.';
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
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<body>
	<h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4> 
	<?php include './modules/hero.php'; ?>
	<main>
		<!--Navigation-->
		<div>
			<?php include './modules/admin_bar.php'; ?>
		</div>
		<div class="container pt-5">
			<?php
				if (isset($_SESSION['Status Message'])) {
					echo $_SESSION['Status Message'];
					unset($_SESSION['Status Message']);
					}?>
			<h2 class="text-center pb-5"><a href="./add/add_product.php" class=" btn btn-secondary btn-lg btn-block text-light"> Add Product</a></h2>
			<h3 class="text-center"><?php     for($page = 1; $page<= $number_of_page; $page++) {  
        		echo '<a class="link-offset-2 link-offset-3-hover link-opacity-25-hover" href = "?page=' . $page . '">&nbsp;&nbsp;' . $page . '&nbsp;&nbsp; </a>';  
    		}?>
			</h3>
			
			<table class="table table-bordered align-middle table-sm table-hover table-light center">
			<!-- display links for all products -->
			<?php foreach ($products as $product) : ?>
			<tr class="text-center">
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td><?php echo $product['Name']; ?></th>
				<td class="text-center"><img class="img-fluid mx-auto mx-lg-0 h-100 col-8 col-sm-6 col-md-4 col-lg-2 my-auto" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['Img']); ?>" alt="<?php echo $product['Name']; ?>" /></td>
				<td class="text-center"><a class="btn btn-warning text-light" href="<?php echo './edit/edit_product.php?product_id=' . $product['ItemId']; ?>"> Edit</a>
				<td class="text-center"><?php if($error != '') {echo $error;} ?>
					<form action="" method="post" id="form<?php echo $product['ItemId']; ?>">
						<input type="hidden" name="product_id" value="<?php echo $product['ItemId']; ?>" />
						<button name="delete" class="confirm-delete btn btn-danger" rel="tooltip" title="Remove" id="<?php echo $product['ItemId']; ?>">
							Delete
						</button>
					</form>
				</td>	
			</tr>
			<?php endforeach; ?>
			</table>
			<h3 class="text-center pb-5"><?php     for($page = 1; $page<= $number_of_page; $page++) {  
        		echo '<a class="link-offset-2 link-offset-3-hover link-opacity-25-hover" href = "?page=' . $page . '">&nbsp;&nbsp;' . $page . '&nbsp;&nbsp;</a>';  
    		}?>
			</h3>
		</div>
	</main>
	
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
			$('#form' + id).submit();

			// hide modal
			$('#myModal').modal('hide');
		});
	</script>
</body>

</html>