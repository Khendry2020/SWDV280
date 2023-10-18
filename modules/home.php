<div class="container visible invisible-md">
    <div id="mobileCarousel" class="carousel slide " data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>
<div class="container invisible visible-md">
<div class="row py-5 g-2">
            <div class="card col-lg-3 col-md-4 col-sm-6 col-12 p-3">                
                <img src="./images/<?php echo $product['Name']; ?>.jpg" class="card-img-top rounded" alt="<?php echo $product['Description']; ?>">
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $product['Name'];?></h5>
                    <p class="card-text"><?php echo $product['Description']; ?></p>
                </div>
                <ul class="list-group list-group-flush MMwhite rounded">
                    <li class="list-group-item text-center MMwhite">$<?php echo $product['Price']; ?>.00</li>
                </ul>
                <div class="card-body text-center MMblue rounded">
                    <form action="./AddToCart.php" method="POST">
                        <input type="text" name="ProductID" value="<?php echo $product['ProductID']?>" hidden></input>
                    <button type="submit" class="card-link btn btn-dark">Add to Cart</button>
                    </form>
                </div>
            </div>
  
        <?php } ?> 
    </div>
</div>