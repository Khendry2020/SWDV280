<?php
session_start();
include('./model/database.php');
include('./model/categories.php');
$categories = get_categories();
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
				<form>
				<a href="<?php echo 'controller' . 
						'?action=edit_category' .
						'&amp;category_id=' . $category['CategoryId']; ?>"> Edit
				</a>
				</form>
				<form action="./index.php" method="post">
				<input type="hidden" name="category_id" value="<?php echo $category['CategoryId']; ?>" />
				<input type="hidden" name="action" value="delete_category" />
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