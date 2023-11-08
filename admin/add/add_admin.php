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
        <?php include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/hero.php'); ?>
        <?php include ( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/admin/modules/admin_bar.php'); ?>

        <div class="container pt-5">
            <?php if($error != '') {echo $error;} ?>

            <h3>Add Administrator</h3>

            <form action="" method="post" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center pt-4" >
                <div class="col-auto">
                    <label for="username" class="form-label fw-bold">Name:</label>
                    <input type="text" class="form-control border border-3 rounded" id="username" name="username">
                </div>

                <div class="col-auto">
                    <label for="roles" class="form-label fw-bold">Role:</label>
                    <input type="text" class="form-control border border-3 rounded" id="roles" name="roles">
                </div>

                <div class="col-auto">
                    <label for="password" class="form-label fw-bold">Password:</label>
                    <input type="text" class="form-control border border-3 rounded" id="password" name="password">
                </div>

                <div class="row-auto">
                    <button type="submit" class="btn btn-primary mt-3" name="add">Submit</button> <a href="/swdv280/admin/admins.php" class="btn btn-warning mt-3 ms-5">Cancel</a>
                </div>
            </form>
        </div>
    </main>
  </body>
</html>