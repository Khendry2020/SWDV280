<header>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark ">
		<div class="container">
			<div id="headerBrandname">
				<a class="navbar-brand" href="index.php">Scott's Furniture Barn</a>
			</div>
			<div id="headerImg">
				<a class="navbar-brand" href="index.php"><img src="/swdv280/images/scotts_S.png" alt="" class="img-fluid rounded"></a>
			</div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center pe-5 " id="navbarResponsive">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="/swdv280/admin/products.php">View Products</a></li>
					<li class="nav-item"><a class="nav-link" href="/swdv280/admin/categories.php">View Categories</a></li>
					<li class="nav-item"><a class="nav-link" href="/swdv280/admin/admins.php">View Users</a></li>
					<li class="nav-item"><a class="nav-link" href="/swdv280/admin/reports.php">View Reports</a></li>
					<li class="nav-item"><a class="nav-link" href="/swdv280/admin/donations.php">View Donations</a></li>
				</ul>
			</div>
			<?php
				include( $_SERVER['DOCUMENT_ROOT'] . '/swdv280/admin/adminLogin/view/logout.php');
			?>
		</div>
	</nav>
</header>