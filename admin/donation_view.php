<?php
session_start();
include('./model/database.php');
include('./model/donation_db.php');
$donations = donationFuniture();
?>

<!DOCTYPE html>
  <?php include '../modules/head.php'; ?>
  <body>
  	<h1 class="text-center bg-dark text-light m-0 p-0">
      Administration
    </h1>
	<?php include './modules/hero.php'; ?>
    <main>
        <!--Navigation-->
		<div>
			<?php include './modules/admin_bar.php'; ?>
		</div>
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
            <table >
              <h2>Donated Funiture</h2>
              <tr>
                <th>User Name</th>
                <th>Phone</th>
                <th>Description</th>
              </tr>
              <?php foreach ($donations as $donation) : ?>
             <tr>
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
    <footer>
        <?php include '../modules/footer.php'; ?>
    </footer>
  </body>
</html>