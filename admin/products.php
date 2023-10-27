<?php
session_start();
include('./model/database.php');
include('./model/products.php');
$products = get_items();


if (isset($_POST['delete'])) {
    $_POST['product_id'] = trim($_POST['product_id']);

    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

    if ($product_id == NULL) {            
        $error = 'Product ID is missing. Please call support.';
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
				<a href="./add/add_product.php"> Add Product
				</a>

			<ul>
				<!-- display links for all products -->
				<?php foreach ($products as $product) : ?>
				<li>
				<?php echo $product['Name']; ?>
				<a href="<?php echo './edit/edit_product.php?product_id=' . $product['ItemId']; ?>"> Edit</a>
				<form action="" method="post">
					<input type="hidden" name="product_id" value="<?php echo $product['ItemId']; ?>" />
					<input type="hidden" name="action" value="delete_product" />
					<button type="submit" class="btn btn-primary mt-3" name="delete">Delete</button>
				</form>
				</li>
				<?php endforeach; ?>
			</ul>
        </div>
    </main>
    <footer>
        <?php include '../modules/footer.php'; ?>
    </footer>
  </body>
</html>