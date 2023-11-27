<?php
session_start();
if (!$_SESSION['isAdmin'] || $_SESSION['isAdmin'] == NULL || isset($_SESSION['adminLogError'])) {
  $_SESSION['notification'] = 'Failed to log into. Please try again.';
  header('Location: /swdv280/index.php');
}
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/head.php'); ?>

<body>
  <h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/swdv280/modules/hero.php'; ?>
  <main>
    <!--Navigation-->
    <div>
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/swdv280/admin/modules/admin_bar.php'; ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <section class="py-5">
            <p>
              
            </p>
            <p>
            </p>
          </section>
        </div>
      </div>
  </main>
</body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/swdv280/modules/notification.php");
?>
</html>