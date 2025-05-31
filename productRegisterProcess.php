<?php

include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$size = $_POST["size"];
$color = $_POST["color"];
$desc = $_POST["desc"];


if (empty($pname)) {
    echo ("Please enter the Product Name");
}else if (strlen($pname) >30) {
    echo ("Product name shoould be less than 30 characters");
} else if ($brand == 0) {
    echo ("Please Select the Product Brand");
} else if ($cat == 0) {
    echo ("Please Select the Product Category");
} else if ($size == 0) {
    echo ("Please Select the Product Size");
} else if ($color == 0) {
    echo ("Please Select the Product Color");
} else if (empty($desc)) {
    echo ("Please Submit a description");
} else if (strlen($desc)>100) {
    echo ("Product Description shoould be less than 30 characters");
} else {

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $path = "Resources/img/ProductImg/" . uniqid() . ".png";
        move_uploaded_file($image["tmp_name"], $path);


        $rs = Database::search("SELECT * FROM `product` WHERE `name` = '$pname'");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo ("Product has been Already uploaded!");
        } else {
            Database::iud("INSERT INTO `product`(`name`,`description`,`path`,`brand_brand_id`,`color_color_id`,`category_cat_id`,`size_size_id`) 
            VALUES ('" . $pname . "','" . $desc . "','" . $path . "','" . $brand . "','" . $color . "','" . $cat . "','" . $size . "')");

            echo ("Success");
        }
    } else {
        echo ("Please Select a Product image");
    }
}
