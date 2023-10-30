<?php
session_start();
include('./../model/database.php');
include('./../model/admins.php');
$admin_id = filter_input(INPUT_GET, 'admin_id', 
FILTER_VALIDATE_INT);
$admin = get_admin($admin_id);

$admin_name = '';
$role = '';
$password;
$admin_id;

if (isset($_POST['edit'])) {
    $_POST['adminname'] = trim($_POST['adminname']);
    $_POST['role'] = trim($_POST['role']);
    $_POST['password'] = trim($_POST['password']);
    $_POST['admin_id'] = trim($_POST['admin_id']);

    $admin_name = filter_input(INPUT_POST, 'adminname');
    $role = filter_input(INPUT_POST, 'role');
    $password = filter_input(INPUT_POST, 'password');
    $admin_id = filter_input(INPUT_POST, 'admin_id', FILTER_VALIDATE_INT);

    if ($admin_name == NULL) {            
        $error = 'Admins requires a name, please try again.';
        include('../../errors/error.php');
    } else {
        // Update category in database
        update_admin($admin_name, $role, $password, $admin_id);
        $_POST = [];
        //header("Refresh: 0");
        $_SESSION['Status Message'] = 'Admin updated successfully.';
        header("Location: ../admins.php");
    }
}
?>
<!DOCTYPE html>
<?php include '../../modules/head.php'; ?>
  <body>
    <main>
        <!--Navigation-->
      <div>
        <?php include '../modules/admin_bar.php'; ?>
      </div>
        <div>
            <?php // Check if cateogry is empty or null, if so show error that category doesn't exist, otherwise proceed
                 if ($admin == NULL || $admin == 0 || $admin === false): ?>
                <div>The admin user you are looking for does not exist. If you believe this to be an error, please contact our support team.</div>
            <?php else: ?>
            <h1>Update Admin User</h1>
            <h2>Updating <?php echo $admin['UserName']; ?></h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="adminname">Admin Name</label>
                    <input type="text" value="<?php echo $admin['UserName']; ?>" id="username" name="adminname">
                </div>
                <div class="mb-3">
                    <label for="roles">Roles</label>
                    <input type="text" value="<?php echo $admin['Roles']; ?>" id="role" name="role">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="text" value="<?php echo $admin['Password']; ?>" id="password" name="password">
                </div>
                    <input type="hidden" name="admin_id" value="<?php echo $admin['AdminId']; ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="edit">Update</button>
            </form>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <?php include '../../modules/footer.php'; ?>
    </footer>
  </body>
</html>