<?php
session_start();
if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
  $_SESSION['notification'] = 'Failed to log into. Please try again.';
  header('Location: /SWDV280/index.php');
}
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/SWDV280/modules/head.php'); ?>

<body>
  <h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/modules/hero.php'; ?>
  <main>
    <div>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/admin/modules/admin_bar.php'; ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <section class="py-5">
            <p>
              Welcome to the administration site. These pages are for updating and changing products and information for Scott's Furniture barn.
            </p>
            <p>
              It is a criminal offense to access and/or make changes to this site without permission. 
              If you are not an administrator for Scott's Furniture Barn, log out now.
            </p>
          </section>
        </div>
      </div>
  </main>
</body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/SWDV280/modules/notification.php");
?>
</html>