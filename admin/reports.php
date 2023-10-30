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
				
            <div class="text-center ">
              <table class="table-bordered border-primary">
                <h2>Available Funiture</h2>
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
            <div class="text-center ">
              <table class="table-bordered border-primary">
                <h2>Reserved Funiture</h2>
              <tr>
                <th>Buy's Name</th>
                <th>phone</th>
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
      </main>
    <footer>
        <?php include '../modules/footer.php'; ?>
    </footer>
  </body>
</html>