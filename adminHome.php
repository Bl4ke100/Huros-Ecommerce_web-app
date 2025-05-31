<?php
session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Celeste | Product Management</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    </head>

    <body class="animation" style="background-color: rgb(186,255,57);">
        <div class="container-fluid">
            <div class="row">

                <!-- navbar -->
                <?php
                include "adminSidebar.php";
                ?>
                <!-- navbar -->

                <div class="col-10">
                    <h2 class="text-center mt-4"><strong>Product Management</strong></h2>
                    <hr>
                    <div class="row mt-5">

                        <!-- Brand Registration -->
                        <div class="col-4 offset-1 mt-4">
                            <label for="form-label">Brand Name : </label>
                            <div><input type="text" placeholder="Brand Name" class="form-control mb-4" id="brand"></div>

                            <div class=" d-none" id="msgDiv1" onclick="reload();">
                                <div class="alert alert-danger" id="msg1"></div>
                            </div>

                            <div>
                                <button class="btn btn-dark col-12" onclick="brandReg();">Brand Register</button>
                            </div>

                        </div>
                        <!-- Brand Registration -->


                        <!-- Category Registration -->
                        <div class="col-4 offset-2 mt-4">
                            <label for="form-label">Category : </label>
                            <div><input type="text" placeholder="Enter Category" class="form-control mb-3" id="category"></div>

                            <div class=" d-none" id="msgDiv2" onclick="reload();">
                                <div class="alert alert-danger" id="msg2"></div>
                            </div>

                            <div>
                                <button class="btn btn-dark col-12" onclick="catReg();">Category Register</button>
                            </div>

                        </div>
                        <!-- Category Registration -->

                        <!-- Color Registration -->
                        <div class="col-4 offset-1 mt-5">
                            <label for="form-label">Color Code : </label>
                            <div><input type="text" placeholder="Color Code" class="form-control mb-3" id="color"></div>

                            <div class="d-none" id="msgDiv3" onclick="reload();">
                                <div class="alert alert-danger col-12" id="msg3"></div>
                            </div>

                            <div>
                                <button class="btn btn-dark col-12" onclick="colorReg();">Color Register</button>
                            </div>

                        </div>
                        <!-- Color Registration -->


                        <!-- Size Registration -->
                        <div class="col-4 offset-2 mt-5">
                            <label for="form-label">Size : </label>
                            <div><input type="text" placeholder="Enter Size" class="form-control mb-3" id="size"></div>

                            <div class="d-none" id="msgDiv4" onclick="reload();">
                                <div class="alert alert-danger" id="msg4"></div>
                            </div>

                            <div>
                                <button class="btn btn-dark col-12" onclick="sizeReg();">Size Register</button>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- Size Registration -->





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

                <?php
                include "footer.php";
                ?>

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