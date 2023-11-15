 <?php 
include './models/database.php';

function getFeaturedItems($limit = 4) {
    global $db;
    try{

        $query = "SELECT * FROM items WHERE `featured` = 'yes' ORDER BY RAND() LIMIT :limit";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    } catch(PDOException $e) {
        display_db_error($e->getMessage());
    }
}

$perfectConditionItems = getFeaturedItems($limit = 4);
?> 

<!-- This is the mobile carousel for featured items, should be invisible on medium and up-->
<div class="container">
    <h2 class="text-center pt-2">Featured Items</h2>
    <div class="container-fluid" id="mobileCarousel"> 
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($perfectConditionItems as $key => $item) : ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $key ?>" <?= $key == 0 ? 'class="active"' : '' ?> aria-label="Slide <?= $key + 1 ?>"></button>
                <?php endforeach; ?>
            </div>

            <div class="carousel-inner">
                <?php foreach ($perfectConditionItems as $key => $item) : ?>
                    <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                        <?php 
                            $imgData = base64_encode($item['Img']);
                            $imgSrc = "data:image/jpeg;base64,{$imgData}";
                        ?>
                        <img src="<?= $imgSrc ?>" class="d-block w-100 img-fluid rounded" alt="<?= $item['Name'] ?>">
                    </div>
                <?php endforeach; ?>
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

    <!-- This is the scalable model for featured items in md and up -->
    <div class="container-fluid" id="desktopCards">
        <div class="row py-3 g-3">
            <?php foreach ($perfectConditionItems as $item) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100">
                        <?php 
                            $imgData = base64_encode($item['Img']);
                            $imgSrc = "data:image/jpeg;base64,{$imgData}";
                        ?>
                        
                        <a href="product.php?product_id=<?= $item['ItemId'] ?>" class="link-dark link-underline link-underline-opacity-0" >

                            <img src="<?= $imgSrc ?>" class="img-fluid rounded card-img-top mx-auto d-block pb-1" alt="<?= $item['Name'] ?>" style="width: 17vw; height: 15vw;">

                            <div class="card-body py-1">
                                <h5 class="card-title text-center"><?= $item['Name'] ?></h5>
                                <p class="card-text text-center pt-2">$<?= $item['Price'] ?></p>
                            </div>
                            
                            <div class="card-footer py-0">
                                <!-- <small class="text-muted"><?= $item['condition'] ?> condition</small><br> -->
                                <small class="text-muted">Reserve now</small>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<hr> 

<!-- This is the about section to be included here on the homepage. The content needs to be created still -->
<div class="MMblue border border-black border-5 container color-red mb-4">
<a href="about.php" class="text-decoration-none color-light" >
    <div class="container-fluid color-light">
        <h2>
        Click here to learn more about Scott's Funiture Barn
        </h2>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium impedit soluta doloribus voluptatem magnam molestias inventore rerum distinctio! Minus enim inventore deserunt quas ipsa iure animi impedit, in facere voluptatibus.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quisquam, illo ut in asperiores sed suscipit facilis sunt vero odio quos aperiam inventore et commodi corrupti eligendi iure ducimus minima?
        </p>
    </div>
</a>
</div>