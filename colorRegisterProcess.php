<?php

include "connection.php";

$color = $_POST["co"];

if (empty($color)) {
    echo ("Please Enter your color code/name");
} else if (strlen($color) > 20) {
    echo ("color name should be less than 20 characters");
} else {

    $rs =  Database::search("SELECT * FROM `color` WHERE `color_name` = '" . $color . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Brand Name Already Exists");
    } else {
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('" . $color . "')");
        echo ("Success");
    }
}
