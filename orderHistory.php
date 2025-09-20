<?php
session_start();
$user = $_SESSION["u"];

include "connection.php";

if (isset($user)) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="styles/orderHistory.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <title>Horos | Order History</title>
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">

        
    </head>

    <body>

        <?php include "homeNav.php"; ?>

        <div class="order-history-container">
            <div class="container-fluid mt-5">

                

                <div class="row">
                    <?php

                    $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
                    $num = $rs->num_rows;

                    if ($num > 0) {
                        // Not Empty
                    ?>
                        <div class="section-header">
                            <h3 class="section-title">
                                <i class="fas fa-receipt"></i>
                                Your Orders (<?php echo $num; ?>)
                            </h3>
                        </div>

                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <!-- order history card -->
                            <div class="col-12">
                                <div class="order-card">

                                    <div class="order-header">
                                        <div class="order-info">
                                            <div class="order-id">
                                                <i class="fas fa-hashtag"></i>
                                                Order ID:
                                                <span class="order-badge">#<?php echo $d["order_id"]; ?></span>
                                            </div>
                                            <div class="order-date">
                                                <i class="fas fa-calendar-alt"></i>
                                                <?php echo date('F j, Y - g:i A', strtotime($d["order_date"])); ?>
                                            </div>
                                        </div>
                                        <div class="order-status">
                                            <i class="fas fa-check-circle"></i>
                                            Completed
                                        </div>
                                    </div>

                                    <div class="order-table-container">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <i class="fas fa-tag me-2"></i>
                                                        Product Name
                                                    </th>
                                                    <th scope="col">
                                                        <i class="fas fa-sort-numeric-up me-2"></i>
                                                        Quantity
                                                    </th>
                                                    <th scope="col">
                                                        <i class="fas fa-dollar-sign me-2"></i>
                                                        Price
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rs2 =  Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id`=`stock`.`stock_id` INNER JOIN `product` ON
                                            `stock`.`product_id` = `product`.`id` WHERE `order_item`.`order_history_ohid` = '" . $d["ohid"] . "'");

                                                $num2 = $rs2->num_rows;

                                                for ($j = 0; $j < $num2; $j++) {
                                                    $d2 = $rs2->fetch_assoc();
                                                ?>
                                                    <tr>
                                                        <th scope="row" class="product-name"><?php echo $d2["name"]; ?></th>
                                                        <td>
                                                            <span class="quantity-badge"><?php echo $d2["oi_qty"]; ?></span>
                                                        </td>
                                                        <td class="price-value">Rs. <?php echo number_format(($d2["price"] * $d2["oi_qty"]), 2); ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="order-total">
                                        <span class="total-label">Net Total: Rs. <?php echo number_format($d["amount"], 2); ?></span>
                                        
                                    </div>

                                </div>
                            </div>
                            <!-- order history card -->

                        <?php
                        }
                        ?>

                    <?php
                    } else {
                        // Empty
                    ?>
                        <div class="col-12">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <h2 class="empty-title">No Orders Yet</h2>
                                <p class="empty-subtitle">You haven't placed any orders. Start exploring our amazing collection!</p>
                                <a href="index.php" class="start-shopping-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    Start Shopping
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

        <?php include "homeFooter.php"; ?>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php

} else {
    header("location:signin.php");
}
?>