<?php
session_start();
include('models/database.php');
include('models/users.php');
$error = '';
if (isset($_POST['create'])) {
    // Trim inputs
    $_POST['name'] = trim($_POST['name']);
    $_POST['email'] = trim($_POST['email']);
    $_POST['password'] = trim($_POST['password']);
    $_POST['phone'] = trim($_POST['phone']);
    $_POST['street'] = trim($_POST['street']);
    $_POST['city'] = trim($_POST['city']);
    $_POST['state'] = trim($_POST['state']);
    $_POST['zip'] = trim($_POST['zip']);

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
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
            add_user($name, $email, $phone, $last_id, $password);
            $_POST = [];
            $_SESSION['Status Message'] = 'Your account has been successfully created.';
            header("Location: account.php");
        }
    }
}

?>
<!DOCTYPE html>
<?php include './modules/head.php'; ?>

<body>
  <?php include './modules/hero.php'; ?>
  <main>
    <!--Navigation-->
    <div>
      <?php include './modules/header.php'; ?>
    </div>
    <?php if(isset($error)) { echo $error; } ?>
    <div class="container">
        <h3 class="my-2">Sign Up</h3>
        <form action="" method="post">
            <div class="my-2 text-start">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
            
            <div class="my-2 text-start">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="my-2 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="my-2 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            <div class="my-2">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="my-2">
                <label for="street" class="form-label">Street Address</label>
                <input type="text" class="form-control" id="street" name="street">
            </div>
            <div class="my-2">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="my-2">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="my-2">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip">
            </div>

            <button type="submit" class="btn btn-primary my-2" name="create">Create Account</button>
        </form>
    </div>
  </main>
  <footer>
    <?php include './modules/footer.php'; ?>
  </footer>
</body>

</html>