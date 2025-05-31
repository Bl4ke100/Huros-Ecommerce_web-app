<?php

include "connection.php";

$category = $_POST["c"];

if (empty($category)) {
    echo ("Please Enter your category name");
} else if (strlen($category) > 20) {
    echo ("category name should be less than 20 characters");
} else {

    $rs =  Database::search("SELECT * FROM `category` WHERE `cat_name` = '" . $category . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Brand Name Already Exists");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('" . $category . "')");
        echo ("Success");
    }
}
