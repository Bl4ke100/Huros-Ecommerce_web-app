<?php
session_start();

include "connection.php";

if (isset($_SESSION["a"])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celeste | Inventory Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
</head>

<body class="animation" style="background-color: rgb(153,235,107)">
    <div class="row">

        <?php
        include "adminsidebar.php";
        ?>



    </div>


 <!-- Animated  BG Start -->
 <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <!-- Animated  BG End -->


    <!-- footer -->

    <?php
    include "footer.php";
    ?>
    <!-- footer -->

    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>


<?php

} else {
    echo "you are not a valid admin";
}



?>