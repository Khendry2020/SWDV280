<?php
session_start();
include('./../model/database.php');
include('./../model/admins.php');
if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
    $_SESSION['notification'] = 'Failed to log into. Please try again.';
    header('Location: /swdv280/index.php');
}
$admin_id = filter_input(INPUT_GET, 'admin_id', 
FILTER_VALIDATE_INT);
$admin = get_admin($admin_id);

$admin_name = '';
$role = '';
$password;
$admin_id;
$error = '';
if (isset($_POST['edit'])) {
    $_POST['username'] = trim($_POST['username']);
    $_POST['roles'] = trim($_POST['roles']);
    $_POST['password'] = trim($_POST['password']);
    $_POST['admin_id'] = trim($_POST['admin_id']);

    $admin_name = filter_input(INPUT_POST, 'username');
    $role = filter_input(INPUT_POST, 'roles');
    $password = filter_input(INPUT_POST, 'password');
    $admin_id = filter_input(INPUT_POST, 'admin_id', FILTER_VALIDATE_INT);

    if ($admin_name == NULL) {            
        $error = 'Admins requires a name, please try again.';
    } else {
        // Update category in database
        update_admin($admin_name, $role, $password, $admin_id);
        $_POST = [];
        //header("Refresh: 0");
        $_SESSION['notification'] = 'Admin user ' . $admin_name . ' has been updated successfully.';
        header("Location: ../admins.php");
    }
}

?>
<!DOCTYPE html>
    <?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
<body>
    <h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4>
    <?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/hero.php'); ?>
    <?php include ( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/admin/modules/admin_bar.php'); ?>

    <main>
        <div class="container pt-5">
            <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
            if ($admin == NULL || $admin == 0 || $admin === false): ?>
                <div>The admin user you are looking for does not exist. If you believe this to be an error, please contact our support team.</div>
            <?php else: ?>

            <h3 class="pb-3">Update Admin User</h3>

            <h5>Updating <?php echo $admin['UserName']; ?></h5>

            <?php if($error != '') {echo $error;} ?>

            <form action="" method="post" class="row gy-2 gx-3 align-items-center pt-4">
                <div class="col-auto">
                    <label for="username" class="fw-bold">Admin Name:</label> <span class="text-danger small ms-3"></span>
                    <input type="text" class="form-control border border-3 rounded" value="<?php echo $admin['UserName']; ?>" id="username" name="username">
                </div>

                <div class="col-auto">
                    <label for="roles" class="fw-bold">Role:</label> <span class="text-danger small ms-3"></span>
                    <input type="text" class="form-control border border-3 rounded" value="<?php echo $admin['Roles']; ?>" id="roles" name="roles">
                </div>

                <div class="col-auto">
                    <label for="password" class="fw-bold">Password:</label> <span class="text-danger small ms-3"></span>
                    <input type="text" class="form-control border border-3 rounded" value="<?php echo $admin['Password']; ?>" id="password" name="password">
                </div>

                <input type="hidden" name="admin_id" value="<?php echo $admin['AdminId']; ?>">
                
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-4" name="edit" id="submit-form">Update</button> <a href="/swdv280/admin/admins.php" class="btn btn-warning mt-4 ms-3">Cancel</a>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </main>
    <script src="/swdv280/admin/scripts/add-admin-validator.js"></script>
</body>
</html>