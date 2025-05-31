<?php

session_start();


if (isset($_SESSION["a"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Celeste | Admin Dashboard</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    </head>

    <body class="animation" onload="loadChart();" style="background-color: rgb(186,255,57);">
        <div class="container-fluid">
            <div class="row">

                <?php
                include "adminsidebar.php";
                ?>

                <!-- chart -->
                <div class="col-5 offset-2">
                    <h2 class="text-center">Most Sold Products</h2>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

                <!-- chart -->

            </div>



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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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