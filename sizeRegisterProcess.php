<?php

include "connection.php";

$size = $_POST["s"];

if (empty($size)) {
    echo ("Please Enter your size code/name");
} else if (strlen($size) > 20) {
    echo ("size code/name should be less than 20 characters");
} else {

    $rs =  Database::search("SELECT * FROM `size` WHERE `size_name` = '" . $size . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your size  Already Exists");
    } else {
        Database::iud("INSERT INTO `size` (`size_name`) VALUES ('" . $size . "')");
        echo ("Success");
    }
}
