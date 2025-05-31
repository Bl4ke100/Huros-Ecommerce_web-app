<?php

session_start();

include "connection.php";

if (isset($_SESSION["a"])) {


?>


    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
        <title>Celeste | Admin Reports</title>

    </head>

    <body class="adminBody animation" style="background-color: rgb(186,255,57);">

        <div class="container-fluid">
            <div class="row">
                <!-- Nav bar -->
                <?php
                include "adminSidebar.php";
                ?>
                <!-- Nav bar -->

                <div class="col-10">
                    <h2 class="text-center mt-5" style="color: black;"><strong> Reports</strong></h2>
                    <hr style="color: black;">

                    <div class="row mt-5">
                        <div class="col-4 mt-5">
                            <a href=""><button class="btn btn-dark col-12" onclick="openNewWindow();">Stock Report</button></a>
                        </div>

                        <div class="col-4 mt-5">
                            <a href=""><button class="btn btn-dark col-12" onclick="openNewWindow1();">Product Report</button></a>
                        </div>

                        <div class="col-4 mt-5">
                            <a href=""><button class="btn btn-dark col-12" onclick="openNewWindow2();">User Report</button></a>
                        </div>

                    </div>

                </div>
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