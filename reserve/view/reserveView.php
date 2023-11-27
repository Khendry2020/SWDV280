<?php
// if ($_SESSION['loggedIn']) {

include "reserve/models/reserveCart.php";
$_SESSION['totalPrice'] = 0 ?>
<div class="container">

    <ol class="list-group list-group-numbered">
        <?php
        if (empty($reservedRows)) {
            $_SESSION['cartCount'] = 0; ?>
            <H1>Cart is empty</H1>
            <a class="btn btn-dark" href="./gallery.php">Click here to view our Gallery</a>
            <?php } else {
            foreach ($reservedRows as $row) {
                $_SESSION['cartCount'] += 1; ?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">
                            <h5><?php echo htmlspecialchars($row['Name']); ?> - Condition: <?php echo htmlspecialchars($row['condition']); ?> - Price: $<?php echo htmlspecialchars($row['Price']); ?>
                                <a class="btn btn-danger" href="./reserve/models/reserveDelete.php?ReservedId=<?php echo $row["ReservedId"]; ?>" type="button">Remove</a>
                            </h5>
                        </div>
                    </div>
                </li>
            <?php
                $_SESSION['totalPrice'] += $row['Price'];
            }

            ?>
    </ol>
    <?php
            echo "<h5>Subtotal: $";
            echo $_SESSION['totalPrice'];
            echo ("<h5>");
            $total = ($_SESSION['totalPrice'] * 0.06) + number_format((float)$_SESSION['totalPrice'], 2, '.', '');
            echo "<h5>Tax: 6%";
            echo ("<h5>");
            echo "<h5>Total: $";
            echo number_format((float)$total, 2, '.', '');
            echo ("<h5>");
        }
    ?><?php if ($_SESSION['LoggedIn'] == true) { ?>
    <a class="btn btn-dark" href="reserve/models/reserveItems.php">Reserve Items</a> <?php } else { ?>
    <a class="btn btn-dark" href="signup.php">Sign up for an account to reserve these item's</a>
<?php } ?><a class="btn btn-danger" href=./reserve/models/reserveDeleteAll.php>Remove All Items</a>

<? //} 
?>
</div>