<?php
session_start();
include('./model/database.php');
include('./model/reports.php');

if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
	$_SESSION['notification'] = 'Failed to log into. Please try again.';
	header('Location: /swdv280/index.php');
}


$availables = availableFunitureOutdoor();


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
				
					<div class="text-center pt-1 ">
						<h3 class="pt-1">Available Funiture: Outdoor</h3>
						<table id="" class="table table-bordered align-middle table-sm table-hover table-light pt-1 center">
				       <?php include './modules/availblelinks.php' ?>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
							<!-- display links for all availalbe funiture -->
							<?php foreach ($availables as $outdoor) : ?>
								<tr>
									<td><?php echo $outdoor['Name']; ?></td>
                                    <td><?php echo $outdoor['Description']; ?></td>
									<td>$<?php echo $outdoor['Price']; ?></td>
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