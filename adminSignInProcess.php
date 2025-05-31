<?php

session_start();

include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];

if (empty($username)) {
    echo ("please enter your username");
} else if (empty($password)) {
    echo ("please enter your password");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        $d = $rs->fetch_assoc();

        if ($d["user_type_id"] == 1) {
            echo ("success");

            $_SESSION["a"] = $d;
        } else {
            echo ("you are not an Admin");
        }
    } else {
        echo ("Invalid Admin username or Password");
    }
}
