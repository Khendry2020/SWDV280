<?php
session_start();
include('./model/database.php');
include('./model/products.php');
$products = get_items();
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
				<form>
				<a href="<?php echo './edit/edit_product.php?product_id=' . $product['ItemId']; ?>"> Edit
				</form>
				<form action="./index.php" method="post">
					<input type="hidden" name="product_id" value="<?php echo $product['ItemId']; ?>" />
					<input type="hidden" name="action" value="delete_product" />
					<input type="submit" value="Delete">
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