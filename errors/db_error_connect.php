<?php include('./modules/head.php'); ?>
<?php include('./modules/header.php'); ?>
<section>
    <h1>Database Error</h1>
    <p>An error occurred connecting to the database.</p>
    <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
</section>
<?php include('./modules/footer.php'); ?>