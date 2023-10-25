<?php
session_start();
include('./model/database.php');
include('./model/admins.php');
$admins = display_admins();
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
						'?action=add_admin'; ?>"> Add Admin User
				</a>

			<ul>
				<!-- display links for all categorys -->
				<?php foreach ($admins as $admin) : ?>
				<li>
				<?php echo $admin['UserName']; ?>
				<form>
				<a href="<?php echo 'controller' . 
						'?action=edit_admin' .
						'&amp;admin_id=' . $admin['AdminId']; ?>"> Edit
				</a>
				</form>
				<form action="./index.php" method="post">
				<input type="hidden" name="admin_id" value="<?php echo $admin['AdminId']; ?>" />
				<input type="hidden" name="action" value="delete_admin" />
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