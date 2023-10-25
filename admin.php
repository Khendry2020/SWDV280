<?php
session_start();
?>
<!DOCTYPE html>
  <?php include'./modules/head.php'; ?>
  <body>
      <!-- ======= Hero Section =======  -->
    <section id="hero" class="hero">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-12">
          </div>
          <div class="col-md-12">
          <img style="height: 200px;" class="mh-100 rounded img-fluid my-2" src="images/scottslogo.png"
                    alt="Scott's Funiture Barn Logo">
            <h1>
              Administration
            </h1>
            
          </div>
        </div>
      </div>
    </section><!-- End Hero -->
    <main>
        <!--Navigation-->
      <div>
        <?php include './admin/modules/admin_bar.php'; ?>
      </div>    
        <?php include './admin/modules/admin_landing.php'; ?>
    </main>
    <footer>
    
    </footer>
  </body>
</html>