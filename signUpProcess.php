<?php

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$username = $_POST["u"];
$password = $_POST["p"];

if (empty($fname)) {
    echo ("Please enter your first name");
} else if (strlen($fname) > 20) {
    echo ("Your First name should be less than 20 characters");
} else if (empty($lname)) {
    echo ("Please enter your last name");
} else if (strlen($lname) > 20) {
    echo ("Your Last name should be less than 20 characters");
} else if (empty($email)) {
    echo ("Please enter your email");
} else if (strlen($email) > 100) {
    echo ("your email should be less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL) > 100) {
    echo ("your Email address is Invalid");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile Number.");
} else if (strlen($mobile) != 10) {
    echo ("Mobile Number Must Contain 10 characters.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number.");
} else if (empty($username)) {
    echo ("Please enter your username");
} else if (strlen($username) > 20) {
    echo ("Your username should be less than 20 characters");
} else if (empty($password)) {
    echo ("Please enter your password");
} else if (strlen($password) < 5 || strlen($password) > 45) {
    echo ("Your password must contain 5 - 45 characters");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "'OR `username`='" . $username . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("User with the same Email Address,Username or same Mobile Number already exists.");
    } else {
        Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`mobile`,`username`,`password`,`user_type_id`) 
    VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $mobile . "','" . $username . "','" . $password . "','2')");

        echo ("success");
    }
}
