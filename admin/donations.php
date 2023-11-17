<?php
session_start();
include('./model/database.php');
include('./model/donation_db.php');
$donations = donationFuniture();
if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
	$_SESSION['notification'] = 'Failed to log into. Please try again.';
	header('Location: /swdv280/index.php');
  }
?>

<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<body>
	<h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4> 
	<?php include './modules/hero.php'; ?>
	<?php include './modules/admin_bar.php'; ?>
    <main>

        <div class="container">

			<div class="row">

				<div class="col">

					<?php 
						if (isset($_SESSION['Status Message'])) {
							echo $_SESSION['Status Message'];
							unset($_SESSION['Status Message']);
						} 
					?>

					<div class="text-center table-bordered border-primary">
					<h4 class="pb-4"><a href="./add/add_donationUsers.php" class=" btn btn-dark"> Add Donation user</a></h4>
						<h2>Donated Funiture</h2>
						<table class="table table-bordered align-middle table-sm table-hover table-light center" >
						  
							<tr>
								<th>User Name</th>
								<th>Phone</th>
								<th>Item name</th>
								<th>Description</th>
							</tr>
							<?php foreach ($donations as $donation) : ?>
							<tr>
							<input type="hidden" name="Donation_id" value="<?php echo $donation['donationId']; ?>" />
								<td><?php echo $donation['Name']; ?></td>
								<td><?php echo $donation['Phone']; ?></td>
								<td><?php echo $donation['Description']; ?></td>
								</tr>
							<?php endforeach; ?> 
						</table>
            		</div>

         		</div>

        	</div>

     	 </div>

    </main>
</body>
</html>