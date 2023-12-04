<?php
session_start();
include('./model/database.php');
include('./model/products.php');
if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
	$_SESSION['notification'] = 'Failed to log into. Please try again.';
	header('Location: /SWDV280/index.php');
}

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

// Pagination and sorting
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}
if (!isset ($_GET['column'])) {
	$column = 'name';
} else {
	$column = $_GET['column'];
}
if (!isset ($_GET['order'])) {
	$order = 'asc';
} else {
	$order = $_GET['order'];
}
$results_per_page = 10;  
$page_first_result = ($page-1) * $results_per_page;

$count = get_product_count();
$number_of_page = ceil ($count / $results_per_page);  
global $dba;

$products = get_items_paginated($page_first_result, $results_per_page);
$error = '';
// For extra protection these are the columns that the user can sort by (in your database table).
$columns = array('name','price');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

$query = 'SELECT * FROM items ORDER BY ' . $column . ' ' . $sort_order . ' LIMIT ' . $page_first_result . ', ' .  $results_per_page;

// Get the result...
if ($statement = $dba->prepare($query)) {
	// Some variables we need for the table.
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    $products = $result;
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/modules/head.php'); ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
			<h3 class="text-center"><?php for($page = 1; $page<= $number_of_page; $page++) {
        		echo <<<EOL
				<a class="link-offset-2 link-offset-3-hover link-opacity-25-hover" href="products.php?page={$page}&column={$column}&order={$order}">&nbsp;&nbsp;{$page}&nbsp;&nbsp;</a>
EOL;
    		}?>
			</h3>
			<?php if($error != '') {echo $error;} ?>
			<table class="table table-bordered align-middle table-sm table-hover table-light center">
				<tr class="text-center">
					<th><a href="products.php?column=name&order=<?php echo $asc_or_desc; ?>">Name<i style="display: inline-block; line-height: 1rem; margin-left: 6px;" class="fas fa-sort<?php echo $column == 'name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th style="width: 80px;"><a href="products.php?column=price&order=<?php echo $asc_or_desc; ?>">Price<i style="display: inline-block; line-height: 1rem; margin-left: 6px;" class="fas fa-sort<?php echo $column == 'price' ? '-' . $up_or_down : ''; ?>"></i></a></th>
					<th>Condition</th>
					<th>Image</th>
					<th>Featured</th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach ($products as $product): ?>
				<tr>
					<td<?php echo $column == 'name' ? $add_class : ''; ?>><?php echo $product['Name']; ?></td>
					<td<?php echo $column == 'price' ? $add_class : ''; ?>><?php echo number_format($product['Price'], 2); ?></td>
					<td><?php echo $product['condition']; ?></td>
					<td class="text-center"><img class="img-fluid mx-auto mx-lg-0 h-100 col-8 col-sm-6 col-md-4 col-lg-2 my-auto" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['Img']); ?>" alt="<?php echo $product['Name']; ?>" /></td>
					<td><?php echo $product['featured'];?></td>
					<td class="text-center"><a class="btn btn-warning text-light" href="<?php echo './edit/edit_product.php?product_id=' . $product['ItemId']; ?>"> Edit</a></td>
					<td class="text-center">
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
			<h3 class="text-center"><?php for($page = 1; $page<= $number_of_page; $page++) {
        		echo <<<EOL
				<a class="link-offset-2 link-offset-3-hover link-opacity-25-hover" href="products.php?page={$page}&column={$column}&order={$order}">&nbsp;&nbsp;{$page}&nbsp;&nbsp;</a>
EOL;
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
<?php include($_SERVER['DOCUMENT_ROOT'] . "/SWDV280/modules/notification.php"); ?>
</html>
	<?php
}
?>