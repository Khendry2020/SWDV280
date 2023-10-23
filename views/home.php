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
            <h1>
              Scott's Furniture Barn
            </h1>
            <p class="tagline">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            </p>
          </div>
        </div>
      </div>
    </section><!-- End Hero -->
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
<?php
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
