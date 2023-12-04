<?php include( $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/modules/head.php'); ?>
<h4 class="text-center bg-dark text-light m-0 py-2">Administration</h4>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/admin/modules/hero.php'); ?>
<?php include( $_SERVER['DOCUMENT_ROOT'] . '/SWDV280/admin/modules/admin_bar.php'); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Database Error</h1>
                <p>A database error occurred.</p>
                <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
            </div>
        </div>
    </div>
</section>
