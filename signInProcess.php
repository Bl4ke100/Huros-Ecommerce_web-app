<?php

session_start();

include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if (empty($username)) {
    echo ("please enter your username");
} else if (empty($password)) {
    echo ("please enter your password");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        if ($d["status"] == 1) {
            echo ("success");

            $_SESSION["u"] = $d;

            if ($rememberme == "true") {
                // SET
                setcookie("username", $username, time() + (60 * 60 * 24 * 360));
                setcookie("password", $password, time() + (60 * 60 * 24 * 360));
            } else {
                // DESTROY
                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo ("Inactive user");
        }
    } else {
        echo ("Invalid username or Password");
    }
}
