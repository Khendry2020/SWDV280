<?php
session_start();
include('models/database.php');
include('models/users.php');
$error = '';

function validateDate($date, $format = 'm-d-Y'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

if (isset($_POST['create'])) {
    // Trim inputs
    $_POST['fname'] = trim($_POST['fname']);
    $_POST['lname'] = trim($_POST['lname']);
    $_POST['user_name'] = trim($_POST['user_name']);
    $_POST['email'] = trim($_POST['email']);
    $_POST['account-password'] = trim($_POST['account-password']);
    $_POST['phone'] = trim($_POST['phone']);
    $_POST['street'] = trim($_POST['street']);
    $_POST['city'] = trim($_POST['city']);
    $_POST['state'] = trim($_POST['state']);
    $_POST['zip'] = trim($_POST['zip']);
    $_POST['birthday'] = trim($_POST['birthday']);

    $firstname = filter_input(INPUT_POST, 'fname');
    $lastname = filter_input(INPUT_POST, 'lname');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone');
    $user_name = filter_input(INPUT_POST, 'user_name');
    $password = filter_input(INPUT_POST, 'account-password');
    $birthday = filter_input(INPUT_POST, 'birthday');
    
    $birthday = strtotime($birthday);
    $birthday_insert = date('Y-m-d', $birthday);

    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');


    if ($firstname == NULL || $lastname == NULL || $user_name == NULL ||$email == NULL || $password == NULL || $phone == NULL || $street == NULL || $city == NULL || $state == NULL || $zip == NULL || $birthday_insert == NULL) {            
        $error = 'Invalid user data. Check all fields and try again.';
    } else {

        $email_check = check_email($email);
        if($email_check != NULL || $email_check != FALSE || $email_check != 0) {
            $error = 'The email address is already in use. Please try another email address.';
        } else {
            // Add item to database
            add_address($street, $city, $state, $zip);
            $last_id = $db->lastInsertId();
            add_user($firstname, $lastname, $email, $phone, $last_id, $user_name, $password, $birthday_insert);
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php if($error != '') { echo $error; }; ?>
                    <form action="" method="post" id="account">
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label> <span class="error"></span>
                            <input type="text" class="form-control" id="fname" name="fname">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label> <span class="error"></span>
                            <input type="text" class="form-control" id="lname" name="lname">
                        </div>
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Username</label> <span class="error"></span>
                            <input type="text" class="form-control" id="user_name" name="user_name">
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
                            <label for="birthday">Birthday</label> <span class="error"></span>
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Your Birthday" aria-describedby="aptDateHelp">
                            <div id="aptDateHelp" class="form-text">Example: 02/13/2020 (February 13th, 2020)</div>
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
        </div>
    </section>
  </main>
    <?php include './modules/footer.php'; ?>
    <script src="scripts/create-account-validator.js"></script>

  <script src="scripts/jquery-ui-1.13.2.custom/jquery-ui.min.js"></script>
  <script>
			$( "#birthday" ).datepicker({
                changeMonth: true,
                changeYear: true
			});
		</script>
</body>
</html>