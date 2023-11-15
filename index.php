<?php
session_start();
if (!isset($_SESSION['userLoginError'])) {
  $_SESSION['userLoginError'] = false;
};
if (!isset($_SESSION['adminLoginError'])) {
  $_SESSION['adminLoginError'] = false;
};
/* 
     
    Code to spit out categories
     <h2>Categories</h2>
      <ul>
          <!-- display links for all categories -->
          <?php foreach ($categories as $category) : ?>
          <li>
              <a href="<?php echo $app_path . 'controller' . 
                  '?action=list_products' .
                  '&amp;category_id=' . $category['CategoryId']; ?>">
                  <?php echo $category['CategoryType']; ?>
              </a>
          </li>
          <?php endforeach; ?>
      </ul>*/
?>
<?php if ($_SESSION['adminLoginError'] == true) { ?>
  <script src="admin/adminLogin/scripts/adminLoginError.js">
  </script>
<?php }
if ($_SESSION['userLoginError'] == true) { ?>
  <script src="login/scripts/userLoginError.js">
  </script>
<?php }
$_SESSION['adminLoginError'] = false;
$_SESSION['userLoginError'] = false; ?>
<!DOCTYPE html>
<?php include './modules/head.php'; ?>

<body>
  <?php include './modules/hero.php'; ?>
  <main>
    <!--Navigation-->
    <div>
      <?php include './modules/header.php'; ?>
    </div>
    <?php include './modules/home.php'; ?>
  </main>
  <footer>
    <?php include './modules/footer.php'; ?>
  </footer>
</body>

</html>