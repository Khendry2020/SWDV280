<div class="container">
    <!----Item's---->
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">
                    <?php echo $_SESSION['itemID'] ?>
                    <?php echo $_SESSION["itemName"] ?>
                    Price: <?php echo $_SESSION['itemPrice'] ?></div>
                <button class="btn btn-danger" href>Remove</button>
            </div>
        </li>
    </ol>
</div>