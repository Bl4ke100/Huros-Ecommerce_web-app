<?php

include "connection.php";

$brand = $_POST["b"];

if (empty($brand)) {
    echo ("Please Enter your brand name");
} else if (strlen($brand) > 20) {
    echo ("Brand name should be less than 20 characters");
} else {

    $rs =  Database::search("SELECT * FROM `brand` WHERE `brand_name` = '" . $brand . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Brand Name Already Exists");
    } else {
        Database::iud("INSERT INTO `brand` (`brand_name`) VALUES ('" . $brand . "')");
        echo ("Success");
    }
}
