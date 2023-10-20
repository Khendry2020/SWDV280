<!-- This is the mobile carousel for featured items, should be invisible on medium and up,
     This will need to be looped with PHP to create items when we have DB set up.  -->
<div class="container">
    <h2 class="text-center">Featured Items</h2>
    <div class="container-fluid" id="mobileCarousel"> 
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="./favicon/apple-touch-icon.png" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./favicon/apple-touch-icon.png" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./favicon/apple-touch-icon.png" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- This is the scalable model for featured items in md and up
        This will need to be looped with PHP to create items when we have DB set up. -->
    <div class="container-fluid" id="desktopCards">
        <div class="row py-5 g-2">
            <div class="card col-lg-3 col-md-4 col-sm-6 p-3">
                <img src="./favicon/android-chrome-512x512.png">
                <div class="card-body">
                    <h5 class="card-title text-center"></h5>
                    <p class="card-text"></p>
                </div>
                <ul class="list-group list-group-flush rounded">
                    <li class="list-group-item text-center"></li>
                </ul>
                <div class="card-body text-center rounded">
                </div>
            </div>
            <div class="card col-lg-3 col-md-4 col-sm-6 p-3">
                <img src="./favicon/android-chrome-512x512.png">
                <div class="card-body">
                    <h5 class="card-title text-center"></h5>
                    <p class="card-text"></p>
                </div>
                <ul class="list-group list-group-flush rounded">
                    <li class="list-group-item text-center"></li>
                </ul>
                <div class="card-body text-center rounded">
                </div>
            </div>
            <div class="card col-lg-3 col-md-4 col-sm-6 p-3">
                <img src="./favicon/android-chrome-512x512.png">
                <div class="card-body">
                    <h5 class="card-title text-center"></h5>
                    <p class="card-text"></p>
                </div>
                <ul class="list-group list-group-flush rounded">
                    <li class="list-group-item text-center"></li>
                </ul>
                <div class="card-body text-center rounded">
                </div>
            </div>
            <div class="card col-lg-3 col-md-4 col-sm-6 p-3">
                <img src="./favicon/android-chrome-512x512.png">
                <div class="card-body">
                    <h5 class="card-title text-center"></h5>
                    <p class="card-text"></p>
                </div>
                <ul class="list-group list-group-flush rounded">
                    <li class="list-group-item text-center"></li>
                </ul>
                <div class="card-body text-center rounded">
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<!-- This is the about section to be included here on the homepage. The content needs to be created still -->
<div class="container">
    <div class="container-fluid">
        <h2>
            About Working Title
        </h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium impedit soluta doloribus voluptatem magnam molestias inventore rerum distinctio! Minus enim inventore deserunt quas ipsa iure animi impedit, in facere voluptatibus.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quisquam, illo ut in asperiores sed suscipit facilis sunt vero odio quos aperiam inventore et commodi corrupti eligendi iure ducimus minima?
        </p>
    </div>
</div>