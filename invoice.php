<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];

$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid`='" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Celeste | Invoice</title>
    </head>

    <body style="background-color: rgb(246, 232, 234);" >

        <div class="container text-end mt-2">
            <a href="index.php"><button class="btn btn-outline-dark btn-sm">Home</button></a>
            <button class="btn btn-dark btn-sm col-2" onclick="window.print();">Print Invoice</button>
        </div>



        <div class="container mt-2 mb-4">
            <div class="border border-3 border-black p-5 rounded-3">
                <div class="row">
                    <div class="col-6" style="font-family: 'pp_hatton';" >
                        <h3>Order ID #<span class="text-danger" ><?php echo $d["order_id"] ?></span></h3>
                        <?php echo $d["order_date"] ?></h5>
                    </div>
                    <div class="col-6 text-end">
                        <a class="navbar-brand" href="testindex.php"><img class="me-2" src="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" height="50">
                            <h4><strong>Celeste.</strong></h4>
                        </a>
                        <h1 style="font-family: 'pp_hatton';">INVOICE</h1>
                        <h5>No.45, 1st Lane</h5>
                        <h5>Colombo Road, Kandy</h5>
                    </div>
                </div>

                <div>
                    <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                    <h5><?php echo $user["mobile"] ?></h5>
                    <h5><?php echo $user["no"] ?></h5>
                    <h5><?php echo $user["line_1"] ?></h5>
                    <h5><?php echo $user["line_2"] ?></h5>
                </div>

                <div class="ps-5 pe-5 mt-5">
                    <table class="table table-hover border border-1 border-black">
                        <thead>
                            <tr>
                                <th scope="row">Product Name</th>
                                <th scope="row">Brand Name</th>
                                <th scope="row">Category</th>
                                <th scope="row">Color</th>
                                <th scope="row">Size</th>
                                <th scope="row">Qty</th>
                                <th scope="row">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $rs2 = Database::search("SELECT * FROM order_item INNER JOIN stock ON 
                        order_item.stock_stock_id = stock.stock_id INNER JOIN
                        product ON stock.product_id=product.id INNER JOIN 
                        brand ON product.brand_brand_id = brand.brand_id INNER JOIN
                        color ON product.color_color_id=color.color_id INNER JOIN
                        category ON product.category_cat_id=category.cat_id INNER JOIN
                        size ON product.size_size_id=size.size_id WHERE order_item.order_history_ohid = '" . $orderHistoryId . "'");

                            $num2 = $rs2->num_rows;

                            for ($i = 0; $i < $num2; $i++) {
                                $d2 = $rs2->fetch_assoc();

                            ?>
                                <tr>
                                    <td><?php echo $d2["name"]; ?></td>
                                    <td><?php echo $d2["brand_name"]; ?></td>
                                    <td><?php echo $d2["cat_name"]; ?></td>
                                    <td><?php echo $d2["color_name"]; ?></td>
                                    <td><?php echo $d2["size_name"]; ?></td>
                                    <td><?php echo $d2["oi_qty"]; ?></td>
                                    <td>Rs. <?php echo ($d2["price"] * $d2["oi_qty"]); ?></td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-end mt-5 pe-5">
                    <h6>Number of Items: <span class="text-muted"><?php echo $num2; ?></span></h6>
                    <h5>delivary Fee: <span class="text-muted">250</span></h5>
                    <h3>Net Total: <span class="text-muted"><?php echo $d["amount"]; ?>.00</span></h3>
                </div>
            </div>
        </div>

    </body>

    </html>

<?php
} else {
    header("location: index.php");
}


?>