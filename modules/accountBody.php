<?php
include './models/database.php';
include './models/users.php';


$_SESSION['UserId'] = false;
$_SESSION['isAdmin'] = false;
$_SESSION['LoggedIn'] = true;
$number_test = is_numeric($_SESSION['UserId']);

if ($number_test == 1 && $_SESSION['LoggedIn'] === true) {
    $user_id = $_SESSION['UserId'];
    $user = get_user($user_id);
} else {
?> <div class="text-center border py-2">
        <h2>You are not logged in.</h2>
        <a href="index.php" class="btn btn-primary text-center">Back to Home</a>
    </div>
<?php 
  include('./modules/footer.php');
  die();
}


if (isset($_POST['update'])) {
    $_POST['pswd'] = trim($_POST['pswd']);
    $_POST['phone'] = trim($_POST['phone']);
    $_POST['address'] = trim($_POST['address']);
    $_POST['city'] = trim($_POST['city']);
    $_POST['state'] = trim($_POST['state']);
    $_POST['zip'] = trim($_POST['zip']);

    $password = filter_input(INPUT_POST, 'pswd');
    $phone = filter_input(INPUT_POST, 'phone');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $address_id = filter_input(INPUT_POST, 'address_id', FILTER_VALIDATE_INT);

    if ($password == NULL || $phone == NULL) {            
        $error = 'Password and phone number are both required.';
    } else if ($user_id == NULL || $address_id == NULL) {
        $error = 'The user ID or address ID are missing.';
    } else {
        // Update category in database
        update_user($phone, $password, $user_id);
        update_address($address, $city, $zip, $state, $address_id);
        $_POST = [];
        //header("Refresh: 0");
        //header("Location: account.php");
        $_SESSION['Status Message'] = 'User updated successfully.';
    }
}
?>
<div class="container">
<h3>Edit <?php echo $user['Name'] ?> profile</h3>
        <?php if (isset($_SESSION['Status Message'])) {
            echo $_SESSION['Status Message'];
            unset($_SESSION['Status Message']);
        } ?>
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <!-- Let's create an action page for this, I'm thinking this page will get all the DB data and display it, allow changes in the input fields, send all the data (changed or unchanged) to the action page, and update the user in the DB-->
        <form action="" method="post">
            <div class="mt-3 mb-3 text-start">
                <label class="text-start" for="pwd">Password</label>
                <input type="text" class="form-control" id="pwd" name="pswd" value="<?php echo $user['Password']; ?>">
            </div>    
            <div class="mt-3 mb-3 text-start">
                <label class="text-start" for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user['Phone']; ?>">
            </div>
            <div class=" mb-3 mt-3 text-start">
                <label class="text-start" for="address">Street Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['Streetaddress']; ?>">
            </div>   
            <div class=" mb-3 mt-3 text-start">
                <label class="text-start" for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $user['city']; ?>">
            </div>   
            <div class=" mb-3 mt-3 text-start">
                <label class="text-start" for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" value="<?php echo $user['State']; ?>">
            </div>   
            <div class=" mb-3 mt-3 text-start">
                <label class="text-start" for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $user['Zip']; ?>">
            </div>
            <input type="hidden" name="user_id" value="<?php echo $user['UserId']; ?>">  
            <input type="hidden" name="address_id" value="<?php echo $user['AddressId']; ?>">  
            <button type="submit" name="update" class="btn btn-primary mb-3">Save Changes</button>
        </form>
</div>