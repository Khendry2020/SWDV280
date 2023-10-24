<header>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark justify-content-between">
		<div class="container-fluid py-2">
			<div id="headerBrandname">
				<a class="navbar-brand" href="index.php">Scott's Furniture Barn</a>
			</div>
			<div id="headerImg">
			<a class="navbar-brand" href="index.php"><img src="./favicon/apple-touch-icon.png" alt="" class="img-fluid rounded" width="40px"></a>
			</div>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
				<ul class="navbar-nav">
					<li class="nav-item pe-4"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item pe-4"><a class="nav-link" href="about.php">About</a></li>
					<li class="nav-item pe-4"><a class="nav-link" href="#">Gallery</a></li>
					<li class="nav-item pe-4"><a class="nav-link" href="#">Contact</a></li>	
				</ul>
			</div>			

			<!-- php if signed in, -->
			<?php //include './modules/logout.php'; ?>
			<!-- else { -->
			<?php include './modules/signin.php'; ?>
			<!-- } -->
			<a href="#"> <!-- to reserved items page ? -->
				<div class="position-relative bg-light text-dark p-2 rounded">
					<span class="material-symbols-outlined">shopping_cart</span>
					<div id="cartAmount" class="position-absolute bg-dark text-light ps-1 pe-1 rounded">0</div> 
				</div>
        	</a>
			
		</div>

	</nav> 
</header>