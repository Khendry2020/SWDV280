<?php
session_start();
?>
<!DOCTYPE html>
  <?php include './modules/head.php'; ?>
  <body>
    <h1 class="text-center bg-dark text-light m-0 p-0">
      Administration
    </h1>   
    <?php include './modules/hero.php'; ?>
    <main>
        <!--Navigation-->
      <div>
        <?php include './admin/modules/admin_bar.php'; ?>
      </div>
      <div class="container text-center">    
        <?php include './admin/modules/admin_landing.php'; ?>
      </div>
    </main>
    <footer>
    
    </footer>
  </body>
</html>