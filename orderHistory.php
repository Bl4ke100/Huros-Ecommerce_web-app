<?php
session_start();
$user = $_SESSION["u"];

include "connection.php";

if (isset($user)) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Celeste | Order History</title>
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    </head>

    <body style="background-color: rgb(186,255,57);">

        <?php include "homeNav.php"; ?>

        <div class="container-fluid  mt-5">

        <div class="row">
            <div class="col-12">
                <h1 class="mt-5" style="font-family: pp_hatton;">Order History
                    <hr>
                </h1>
            </div>
        </div>

            <div class="row">

                <?php

                $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                    // Not Empty

                ?>
                    <div class="mb-3">
                        <h3 style="font-family: 'pp_hatton';">Order History</h3>
                    </div>

                    <?php

                    for ($i = 0; $i < $num; $i++) {

                        $d = $rs->fetch_assoc();
                    ?>
                        <!-- order history card -->
                        <div class="p-3 border border-3 mb-4" style="background-color: #79837b;">

                            <div class="text-white">
                                <h5>Order Id <span class="text-black" style="background-color: rgb(186,255,57);">#<?php echo $d["order_id"]; ?></span></h5>
                                <p><?php echo $d["order_date"]; ?></p>
                            </div>
                            <div class="ps-5 pe-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>

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
                                                <th scope="row"><?php echo $d2["name"]; ?></th>
                                                <td><?php echo $d2["oi_qty"]; ?></td>
                                                <td><?php echo ($d2["price"] * $d2["oi_qty"]); ?></td>

                                            </tr>

                                        <?php

                                        }

                                        ?>


                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-end pe-5 mt-5">
                            
                                <h4 class="text-white" style="font-family: 'pp_hatton';">Net Total : <span class="text-warning">Rs.<?php echo $d["amount"];?>.00</span></h4>
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
                    <div class="col-12 text-center mt-5">
                        <h2 style="font-family: 'pp_hatton';">Your have not ordered Anything yet!</h2>
                        <a href="index.php" class="btn btn-outline-dark mt-2 mb-3">Start Shopping</a>
                    </div>
                <?php
                }


                ?>






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
