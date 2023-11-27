<?php


session_start();
    include('./../model/database.php');
    include('./../model/donation_db.php');
    // Get categories for dropdown

    $item = '';
    $name = '';
    $itemName = '';
    $error = '';
    if (isset($_POST['add'])) {
        // Trim inputs
        $_POST['username'] = trim($_POST['username']);
        $_POST['roles'] = trim($_POST['roles']);
        $_POST['password'] = trim($_POST['password']);

        $username = filter_input(INPUT_POST, 'username');
        $roles = filter_input(INPUT_POST, 'roles');
        $password = filter_input(INPUT_POST, 'password');

      
    }
?>


<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<body>
    <main>
        <?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/hero.php'); ?>
        <?php include ( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/admin/modules/admin_bar.php'); ?>

        <div class="container pt-5">
            <?php if($error != '') {echo $error;} ?>

            <h3>Add Donated furniture</h3>

            <form action="donation_db.php" method="post" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center pt-4" >
                <div class="col-auto">
                    <label for="userName" class="form-label fw-bold">User's Name:</label>
                    <input type="text" class="form-control border border-3 rounded" id="userName" name="userName">
                </div>

                <div class="col-auto">
                    <label for="itemName" class="form-label fw-bold">Item name:</label>
                    <input type="text" class="form-control border border-3 rounded" id="roles" name="roles">
                </div>

                <div class="col-auto">
                    <label for="phone" class="form-label fw-bold">Phone:</label>
                    <input type="text" class="form-control border border-3 rounded" id="roles" name="roles">
                </div>

                <div class="col-auto">
                    <label for="email" class="form-label fw-bold">Email:</label>
                    <input type="text" class="form-control border border-3 rounded" id="email" name="email">
                </div>

                <p>Date: <input type="text" id="datepicker"></p>
 

                <div class="row-auto">
                    <button type="submit" class="btn btn-primary mt-3" name="add">Submit</button> <a href="/swdv280/admin/donations.php" class="btn btn-warning mt-3 ms-5">Cancel</a>
                </div>
            </form>
        </div>
    </main>
  </body>
</html>