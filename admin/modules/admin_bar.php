<header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <div class="container">
			<div id="headerBrandname">
				<a class="navbar-brand" href="index.php">Scott's Furniture Barn</a>
			</div>
			<div id="headerImg">
				<a class="navbar-brand" href="index.php"><img src="./images/scotts_S.png" alt="" class="img-fluid rounded"></a>
			</div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center pe-5 " id="navbarResponsive">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="<?php echo $app_path . 'controller' . '?action=view_products'; ?>">View Products</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo $app_path . 'controller' . '?action=view_categories'; ?>">View Categories</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo $app_path . 'controller' . '?action=view_users'; ?>">View Users</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo $app_path . 'controller' . '?action=view_reports'; ?>">View Reports</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo $app_path . 'controller' . '?action=view_donation'; ?>">View Donations</a></li>
				</ul>
			</div>			
    	</div>
	</nav>
</header>