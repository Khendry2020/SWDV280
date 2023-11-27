<?php
// if ($_SESSION['loggedIn']) {

include "reserve/models/reserveCart.php";
$_SESSION['totalPrice'] = 0 ?>
<div class="container">

    <h2 class="py2 text-center">Reserved Items</h2>

    <table class="table table-sm table-bordered align-middle table-hover table-light">
        <tr class="text-center">
            <th>Item</th>
            <th>Item Condition</th>
            <th>Item Price</th>
            <th>Remove Items</th>
        </tr>

        <?php 
            if (empty($reservedRows)) { ?>
            <!--Add styling-->
            <H1>Cart is empty</H1>

            <?php } else {
                foreach ($reservedRows as $row) { ?>

                    <?php 
                        $imgData = base64_encode($row['Img']);
                        $imgSrc = "data:image/jpeg;base64,{$imgData}";
                    ?>

                 <tr>
                    <td class=" col-12 col-sm-4 col-md-4 col-lg-2"><img src="<?= $imgSrc ?>" alt="Product Image" class="img-fluid mx-auto mx-lg-0 h-100 col-8 col-sm-6 col-md-4 col-lg-2 my-auto rounded"><br><?php echo htmlspecialchars($row['Name']); ?></td>
                    <td class=" col-sm-4 col-md-4 col-lg-2"><?php echo htmlspecialchars($row['condition']); ?></td>
                    <td class="col-sm-4 col-md-4 col-lg-2 text-center">$<?php echo htmlspecialchars($row['Price']); ?>
                    <td class=" col-sm-4 col-md-4 col-lg-2 text-center"><button class="btn btn-danger" type="button">Remove</button></td>

                 </tr>

                 
                 <?php
                    $_SESSION['totalPrice'] += $row['Price'];
                }
            }
        ?>
    </table>

    

    <?php
        echo "<h5>Subtotal: ";
        echo $_SESSION['totalPrice'];
        echo ("<h5>");
        $total = ($_SESSION['totalPrice'] * 0.06) + number_format((float)$_SESSION['totalPrice'], 2, '.', '');
        echo "<h5>Tax: 6%";
        echo ("<h5>");
        echo "<h5>Total: ";
        echo number_format((float)$total, 2, '.', '');
        echo ("<h5>");
        
    ?><?php if ($_SESSION['LoggedIn'] == true) { ?>
    <a class="btn btn-dark">Reserve Items</a> <?php } else { ?>
    <a class="btn btn-dark" href="signup.php">Sign up for an account to reserve these item's</a>
    <?php } ?><a class="btn btn-danger" href="./reserve/models/reserveDelete.php">Remove All Items</a>
<? 
?>
</div>