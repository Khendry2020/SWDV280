<?php
session_start();
include('./model/database.php');
include('./model/reports.php');
$availables = availableFuniture();
$reserveds = reservedFuniture();
?>

<!DOCTYPE html>
<?php include '../modules/head.php'; ?>
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
				
					<div class="text-center pt-1 ">
						<h3 class="pt-1">Available Funiture</h3>
						<table class="table table-bordered align-middle table-sm table-hover table-light pt-1 center">
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
							<!-- display links for all availalbe funiture -->
							<?php foreach ($availables as $available) : ?>
								<tr>
									<td><?php echo $available['Name']; ?></td>
									<!-- <td><img href="<?php echo $available['Img']; ?>"></td>-->
									<td><?php echo $available['Description']; ?></td>
									<td><?php echo $available['Price']; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>

					<!-- display links for all Reserved funiture -->
					<div class=" container text-center">
						<table class="table table-bordered align-middle table-sm table-hover table-light pt-1 center">
							<h3 class="pt-1">Reserved Funiture</h3>
							<tr>
								<th>Buy's Name</th>
								<th>Phone</th>
								<th>Reserved date</th>
								<th>Pickup Date</th>
								<th>Total</th>
							</tr>
							<?php foreach ($reserveds as $reserved) : ?>
								<tr>
									<td><?php echo $reserved['Name']; ?></td>    
									<td><?php echo $reserved['Phone']; ?></td>            
									<td><?php echo $reserved['ReservedDate']; ?></td>
									<td><?php echo $reserved['PickupDate']; ?></td>
									<td><?php echo $reserved['Total']; ?></td>
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