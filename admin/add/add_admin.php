<?php
session_start();
include('./../model/database.php');
include('./../model/admins.php');
// Get categories for dropdown

$username = '';
$roles = '';
$password = '';
$error = '';
if (isset($_POST['add'])) {
    // Trim inputs
    $_POST['username'] = trim($_POST['username']);
    $_POST['roles'] = trim($_POST['roles']);
    $_POST['password'] = trim($_POST['password']);

    $username = filter_input(INPUT_POST, 'username');
    $roles = filter_input(INPUT_POST, 'roles');
    $password = filter_input(INPUT_POST, 'password');

    if ($username == NULL || $roles == NULL || $password == NULL) {            
        $error = 'All user data is required for entry. Please try again.';
    } else {
        // Add category to database
        add_admin($username, $roles, $password);
        $_POST = [];
        //header("Refresh: 0");
        $_SESSION['Status Message'] = 'Admin created successfully.';
        header("Location: ../admins.php");
    }
}

?>
<!DOCTYPE html>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>
  <body>
    <main>
        <!--Navigation-->
      <div>
        <?php include '../modules/admin_bar.php'; ?>
      </div>
        <div>
            <?php if($error != '') {echo $error;} ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Name</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="roles" class="form-label">Roles</label>
                    <input type="text" class="form-control" id="roles" name="roles">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="add">Submit</button>
            </form>
        </div>
    </main>
  </body>
</html>