<?php


session_start();
    include('./../model/database.php');
    include('./../model/donation_db.php');

    $name = '';
$itemName = '';
$phone = '';
$email = '';
$date = '';
    $error = '';
    if (isset($_POST['add'])) {
        // Trim inputs
        $_POST['userName'] = trim($_POST['userName']);
        $_POST['itemName'] = trim($_POST['itemName']);
        $_POST['phone'] = trim($_POST['phone']);
        $_POST['email'] = trim($_POST['email']);
        $_POST['datepicker'] = trim($_POST['datepicker']);

        $name = filter_input(INPUT_POST, 'userName');
        $itemName = filter_input(INPUT_POST, 'itemName');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email');
        $date = filter_input(INPUT_POST, 'datepicker');

       add_donation($name,$itemName,$phone,$email, $date);
			$_POST = [];
			$_SESSION['notification'] = 'User added successfully.';
			
			header("Location: ../donations.php"); 
      
    }
?>


<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        
        maxDate: +45,
        showButtonPanel: true,
        dateFormat:"yy-mm-dd"
    });
  } );
  </script>
<body>
    <main>
        <?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/hero.php'); ?>
        <?php include ( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/admin/modules/admin_bar.php'); ?>

        <div class="container pt-5">
           

            <h3>Add Donated furniture</h3>

            <form action="" method="post"  class="row gy-2 gx-3 align-items-center pt-4" >
                <div class="col-auto">
                    <label for="userName" class="form-label fw-bold">User's Name:</label>
                    <input type="text" class="form-control border border-3 rounded" id="userName" name="userName">
                </div>

                <div class="col-auto">
                    <label for="itemName" class="form-label fw-bold">Item name:</label>
                    <input type="text" class="form-control border border-3 rounded" id="itemName" name="itemName">
                </div>

                <div class="col-auto">
                    <label for="phone" class="form-label fw-bold">Phone:</label>
                    <input type="text" class="form-control border border-3 rounded" id="phone" name="phone">
                </div>

                <div class="col-auto">
                    <label for="email" class="form-label fw-bold">Email:</label>
                    <input type="text"  class="form-control border border-3 rounded" id="email" name="email">
                </div>

                <div class="col-auto">
                    <label for="datepicker" class="form-label fw-bold">Date:</label>
                    
                    <input type="text"  class="form-control border border-3 rounded" id="datepicker" name="datepicker">
                </div>
 

                <div class="row-auto">
                    <button type="submit" class="btn btn-primary mt-3" name="add">Submit</button> <a href="/swdv280/admin/donations.php" class="btn btn-warning mt-3 ms-5">Cancel</a>
                </div>
            </form>
        </div>
    </main>
  </body>
</html>