<?php
session_start();
include('models/database.php');
include('models/users.php');

if (isset($_POST['create'])) {
    // Trim inputs
    $_POST['name'] = trim($_POST['name']);
    $_POST['email'] = trim($_POST['email']);
    $_POST['phone'] = trim($_POST['phone']);
    $_POST['street'] = trim($_POST['street']);
    $_POST['city'] = trim($_POST['city']);
    $_POST['state'] = trim($_POST['state']);
    $_POST['zip'] = trim($_POST['zip']);

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone');
    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');

    if ($name == NULL || $email == NULL || $phone == FALSE || $street == NULL || $city == NULL || $state == NULL || $zip == NULL) {            
        $error = 'Invalid user data. Check all fields and try again.';
        include('errors/error.php');
    } else {

        $email_check = check_email($email);
        var_dump($email_check);
        if($email_check != NULL || $email_check != FALSE || $email_check != 0) {
            $error = 'This email address is already in use. Please try another email address.';
            include('errors/error.php');
        } else {
            // Add item to database
            add_address($street, $city, $state, $zip);
            $last_id = $db->lastInsertId();
            add_user($name, $email, $phone, $last_id);
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
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="street" class="form-label">Street Address</label>
            <input type="text" class="form-control" id="street" name="street">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="state" name="state">
        </div>
        <div class="mb-3">
            <label for="zip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip">
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="create">Create Account</button>
    </form>
  </main>
  <footer>
    <?php include './modules/footer.php'; ?>
  </footer>
</body>

</html>