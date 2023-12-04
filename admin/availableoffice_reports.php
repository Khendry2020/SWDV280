<?php
session_start();
include('./model/database.php');
include('./model/reports.php');

if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
	$_SESSION['notification'] = 'Failed to log into. Please try again.';
	header('Location: /SWDV280/index.php');
}


$availables = availableFunitureOffice();


?>

<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/modules/head.php'); ?>
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
						<h3 class="pt-1">Available Funiture: Office</h3>
						<?php include './modules/availblelinks.php' ?>
						<table id="" class="table table-bordered align-middle table-sm table-hover table-light pt-1 center">
				
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
							<!-- display links for all availalbe funiture -->
							<?php foreach ($availables as $office) : ?>
								<tr>
									<td><?php echo $office['Name']; ?></td>
                                    <td><?php echo $office['Description']; ?></td>
									<td>$<?php echo number_format($office['Price'], 2); ?></td>
								</tr>
							<?php endforeach; ?>
							
						</table>
					</div>
                  
			</h3>
					
				    
				</div>
			</div>
		</div>
	</main>
	
</body>
</html>