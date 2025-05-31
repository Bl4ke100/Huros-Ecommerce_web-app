<?php 
include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$pw = $_POST["p"];
$no = $_POST["n"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

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
}  else if (empty($pw)) {
    echo ("Please enter your password");
} else if (strlen($pw) < 5 || strlen($pw) > 45) {
    echo ("Your password must contain 5 - 45 characters");
} else if(empty($no)){
    echo("Please enter your address number");
}else if(strlen($no)>10){
    echo("Your number should be less than 10 characters");
}else if(empty($line1)){
    echo("Please enter your address line 01");
}else if(strlen($line1)>50){
    echo("Your number should be less than 10 characters");
}else if(empty($line2)){
    echo("Please enter your address line 02");
}else if(strlen($line1)>50){
    echo("Your number should be less than 10 characters");
}else{

    Database::iud("UPDATE `user` SET `fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`mobile` = '".$mobile."',
    `password` = '".$pw."',`no` = '".$no."',`line_1` = '".$line1."',`line_2` = '".$line2."' WHERE `id`= '".$user["id"]."'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo("Details Updated successfully");

}
?>

