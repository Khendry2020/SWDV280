<?php
session_start();
include('./model/database.php');
include('./model/donation_db.php');
$donations = donationFuniture();
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
				

			<ul>
				<!-- display links for all categorys -->
				<?php foreach ($donations as $donation) : ?>
				<li>
				<?php echo $donation['Name']; ?>
                <?php echo $donation['Phone']; ?>
                <?php echo $donation['Description']; ?>
                <?php echo $donation['Name']; ?>
				
				
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