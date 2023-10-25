<?php
session_start();

/*
				<a href="<?php echo 'controller' . '?action=view_admins'; ?>">View Admins</a>
				<a href="<?php echo 'controller' . '?action=view_reports'; ?>">View Reports</a>

*/

?>
<!DOCTYPE html>
  <?php include './../modules/head.php'; ?>
  <body>
    <main>
        <!--Navigation-->
      <div>
        <?php include './modules/admin_bar.php'; ?>
      </div>
        <div>
			<section>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sit amet ultrices justo. Mauris non dolor dolor. Nam dictum leo a lectus pharetra, id malesuada tellus iaculis. Morbi in magna volutpat, auctor quam in, consequat mauris. Aenean luctus ex vel rutrum ullamcorper. Vestibulum at magna odio. Morbi ut ullamcorper risus. Curabitur sollicitudin tincidunt nulla vitae lobortis. Etiam cursus dui ut imperdiet venenatis. Nam ullamcorper eu dolor ut mattis. Nullam lacinia justo vitae arcu sodales, nec iaculis sapien tincidunt. Nullam congue augue nisl, ultricies maximus justo euismod id. Nulla vitae placerat ex, dictum efficitur magna. Fusce fringilla orci convallis ligula ullamcorper aliquam. In interdum efficitur tempor.
				</p>
				<p>
					Sed tempus pulvinar est faucibus iaculis. Sed consequat, arcu sed mollis venenatis, sapien magna varius magna, nec tincidunt nulla metus eget arcu. Aenean aliquet tortor nec viverra varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus efficitur ac dui eu fermentum. Sed dui libero, elementum faucibus neque a, ultricies sodales est. Donec ultrices ultricies metus, sit amet lobortis purus. Maecenas viverra at lorem ut elementum. Mauris vitae sem diam. Curabitur et mi at turpis imperdiet placerat vitae id mi. Phasellus gravida est et pulvinar venenatis. Nulla facilisi. Praesent hendrerit eleifend odio non maximus. Curabitur vel nisi scelerisque, malesuada nulla non, maximus elit. Morbi non libero sapien.
				</p>
				<a href="products.php">View Products</a>
				<a href="categories.php">View Categories</a>
				<a href="users.php">View Admins</a>
				<a href="reports.php">View Reports</a>
			</section>
        </div>
    </main>
    <footer>
        <?php include './../modules/footer.php'; ?>
    </footer>
  </body>
</html>