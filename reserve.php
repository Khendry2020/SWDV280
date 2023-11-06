<?php
session_start();
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
        <div class="container">
            <?php
            include "./reserve/models/reserveCart.php";
            include "./reserve/view/reserveView.php"
            ?>
        </div>
    </main>
    <footer>
        <?php include './modules/footer.php'; ?>
    </footer>
</body>

</html>