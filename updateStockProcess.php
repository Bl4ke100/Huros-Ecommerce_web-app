<?php

include "connection.php";

$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

if (empty($qty)) {
    echo ("Please Enter Quantity");
} else if (!is_numeric($qty)) {
    echo ("Please Enter Number Only!");
} else if (strlen($qty) > 10) {
    echo ("Quantity should be less than 10 Characters");
} else if (empty($price)) {
    echo ("Please Enter Unit price");
} else if (!is_numeric($price)) {
    echo ("Price must only contain Numbers!");
} else if (strlen($price) > 10) {
    echo ("Price should be less than 10 Characters");
} else {
    // echo("Success");
    $rs =  Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $productId . "' AND `price`='" . $price . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $d["stock_id"] . "'");
        echo ("Stock Updated Successfully");
    } else {
        Database::iud("INSERT INTO `stock`(`price`,`qty`,`product_id`) VALUES ('" . $price . "','" . $qty . "','" . $productId . "')");
        echo ("New Stock added Successfully!");
    }
}
?>