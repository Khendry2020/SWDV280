<?php
session_start();
include('./model/database.php');
include('./model/categories.php');
$users = display_admins();
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
				<a href="<?php echo 'controller' . 
						'?action=add_category'; ?>"> Add Category
				</a>

			<ul>
				<!-- display links for all categorys -->
				<?php foreach ($users as $user) : ?>
				<li>
				<?php echo $user['Name']; ?>
				<form>
				<a href="<?php echo 'controller' . 
						'?action=edit_admin' .
						'&amp;category_id=' . $user['CategoryId']; ?>"> Edit
				</a>
				</form>
				<form action="./index.php" method="post">
				<input type="hidden" name="category_id" value="<?php echo $user['AdminId']; ?>" />
				<input type="hidden" name="action" value="delete_user" />
				<input type="submit" value="Delete">
				</form>
				</li>
				<?php endforeach; ?>
			</ul>
			<!--     <a href="<?php echo $app_path . 'controller' . 
						'?action=delete_category' .
						'&amp;category_id=' . $category['CategoryId']; ?>"> Delete
				</a> -->
        </div>
    </main>
    <footer>
        <?php include '../modules/footer.php'; ?>
    </footer>
  </body>
</html>