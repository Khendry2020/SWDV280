<?php
session_start();
include('./model/database.php');
include('./model/reports.php');
if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
	$_SESSION['notification'] = 'Failed to log into. Please try again.';
	header('Location: /swdv280/index.php');
}

$reserveds = reservedFuniture();
?>

<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<body>
	<h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4> 
	<?php include './modules/hero.php'; ?>
	<main>
		<?php include './modules/admin_bar.php'; ?>

		<div class="container">
			<div class="row">
				<div class="col">
					<?php 		
						if (isset($_SESSION['Status Message'])) {
							echo $_SESSION['Status Message'];
							unset($_SESSION['Status Message']);
						} 
					?>
				

					<!-- display links for all Reserved funiture -->
					<div class=" container text-center">
						<table id="myTable" class="table table-bordered align-middle table-sm table-hover table-light pt-1 center">
							<h3 class="pt-1">Reserved Funiture</h3>
							<tr>
								<th>Buyer's Name</th>
								<th>Item's Name</th>
								<th>Phone</th>
								<th>Reserved date</th>
								<th>Pickup Date</th>
								<th>Total</th>
							</tr>
							<?php foreach ($reserveds as $reserved) : ?>
								<tr>
									<td><?php echo $reserved['Name']; ?></td> 
									<td><?php echo $reserved['ItemName']; ?></td>   
									<td><?php echo $reserved['Phone']; ?></td>            
									<td><?php echo $reserved['ReservedDate']; ?></td>
									<td><?php echo $reserved['PickupDate']; ?></td>
									<td>$<?php echo $reserved['Total']; ?></td>
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
<script>
	let table = new DataTable('#myTable');
</script>