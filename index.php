<?php
session_start();
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