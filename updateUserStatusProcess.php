<?php

include "connection.php";

$uid = $_POST["uId"];

if (empty($uid)) {
    echo ("please enter user id");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $uid . "' AND `user_type_id` = '2'");
    $num = $rs->num_rows;

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["status"] == 1) {
            Database::iud("UPDATE `user` SET `status` = '0' WHERE `id` = '" . $uid . "'");
            echo ("Deactive");
            
        }

        if ($d["status"] == 0) {
            Database::iud("UPDATE `user` SET `status` = '1' WHERE `id` = '" . $uid . "'");
            echo ("Active");
        }
        
    } else {
        echo ("Invalid user id");
    }
}
