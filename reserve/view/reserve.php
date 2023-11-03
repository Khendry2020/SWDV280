<div class="container">
    <!----Item's---->
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold"><?php echo $_SESSION["itemName"] ?></div>
                <?php echo $_SESSION["itemDescription"] ?> Price: <?php echo $_SESSION['itemPrice'] ?>
            </div>
        </li>
    </ol>
</div>