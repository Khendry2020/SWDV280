<?php
session_start();
include('models/database.php');
include('models/users.php');
$error = '';
if (isset($_POST['create'])) {
    // Trim inputs
    $_POST['name'] = trim($_POST['name']);
    $_POST['email'] = trim($_POST['email']);
    $_POST['account-password'] = trim($_POST['account-password']);
    $_POST['phone'] = trim($_POST['phone']);
    $_POST['street'] = trim($_POST['street']);
    $_POST['city'] = trim($_POST['city']);
    $_POST['state'] = trim($_POST['state']);
    $_POST['zip'] = trim($_POST['zip']);

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'account-password');
    $phone = filter_input(INPUT_POST, 'phone');
    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');

    if ($name == NULL || $email == NULL || $password == NULL || $phone == NULL || $street == NULL || $city == NULL || $state == NULL || $zip == NULL) {            
        $error = 'Invalid user data. Check all fields and try again.';
    } else {

        $email_check = check_email($email);
        if($email_check != NULL || $email_check != FALSE || $email_check != 0) {
            $error = 'This email address is already in use. Please try another email address.';
        } else {
            // Add item to database
            add_address($street, $city, $state, $zip);
            $last_id = $db->lastInsertId();
            //add_user($name, $email, $phone, $last_id, $password);
            $_POST = [];
            $_SESSION['Status Message'] = 'Your account has been successfully created.';
            header("Location: account.php");
        }
    }
}

?>
<!DOCTYPE html>
<?php include './modules/head.php'; ?>
<link rel="stylesheet" href="scripts/jquery-ui-1.13.2.custom/jquery-ui.min.css">
<body>
  <?php include './modules/hero.php'; ?>
  <main>
    <!--Navigation-->
    <div>
      <?php include './modules/header.php'; ?>
    </div>
    <section>
        <div class="row">
            <div class="col">
                <form action="" method="post" id="account">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label> <span class="error"></span>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label> <span class="error"></span>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="verify-email" class="form-label">Verify Email</label> <span class="error"></span>
                        <input type="text" class="form-control" id="verify-email" name="verify-email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label> <span class="error"></span>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="account-password" class="form-label">Password</label> <span class="error"></span>
                        <input type="text" class="form-control" id="account-password" name="account-password">
                    </div>
                    <div class="mb-3">
                        <label for="birthday">Birthday</label>
                        <input type="text" class="form-control" id="birthday" placeholder="Your Birthday" aria-describedby="aptDateHelp">
                        <div id="aptDateHelp" class="form-text">Example: 02/13/2020</div>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Street Address</label> <span class="error"></span>
                        <input type="text" class="form-control" id="street" name="street">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label> <span class="error"></span>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label> <span class="error"></span>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>
                    <div class="mb-3">
                        <label for="zip" class="form-label">Zip</label> <span class="error"></span>
                        <input type="text" class="form-control" id="zip" name="zip">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" name="create" id="submit">Create Account</button>
                </form>
            </div>
        </div>
    </section>
  </main>
    <?php include './modules/footer.php'; ?>
  <script src="scripts/jquery-ui-1.13.2.custom/jquery-ui.min.js"></script>
  <script src="scripts/create-account-validator.js"></script>
  <script>
			$( "#birthday" ).datepicker({
                changeMonth: true,
                changeYear: true
			});
		</script>
</body>
</html>