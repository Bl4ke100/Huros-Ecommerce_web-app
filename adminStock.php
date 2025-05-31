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

    <body class="animation" style="background-color: rgb(186,255,57);">
        <div class="container-fluid">
            <div class="row">
                <?php
                include "adminSidebar.php";
                ?>




                <div class="col-5 mt-5">
                    <h2 class="text-center" style="color: black;"><strong>Product Registration</strong></h2>
                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="pname">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label">Brand</label>
                            <select class="form-select" id="brand">
                                <option value="0">Select</option>
                                <?php

                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>

                                <?php

                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Category</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select</option>
                                <?php

                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["cat_name"]); ?></option>

                                <?php

                                }

                                ?>


                            </select>
                        </div>


                        <div class="mb-3 col-6">
                            <label class="form-label">Color</label>
                            <select class="form-select" id="color">
                                <option value="0">Select</option>
                                <?php

                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["color_id"]); ?>"><?php echo ($data["color_name"]); ?></option>

                                <?php

                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Size</label>
                            <select class="form-select" id="size">
                                <option value="0">Select</option>
                                <?php

                                $rs = Database::search("SELECT * FROM `size`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["size_id"]); ?>"><?php echo ($data["size_name"]); ?></option>

                                <?php

                                }

                                ?>


                            </select>
                        </div>


                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <!-- <input type="text" class="form-control"> -->
                        <textarea class="form-control" rows="5" id="desc"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Images</label>
                        <input type="file" class="form-control" id="file">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-dark" onclick="regProduct();">Register Product</button>
                    </div>


                </div>

                <div class="col-5 mt-5">

                    <h2 class="text-center" style="color: black;"><strong>Stock Update</strong></h2>
                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <option value="0">Select</option>
                            <?php

                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($x = 0; $x < $num; $x++) {
                                $data = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></option>

                            <?php

                            }

                            ?>


                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Unit Price</label>
                        <input type="text" class="form-control" id="uprice">

                    </div>

                    <div class="d-grid">
                        <button class="btn btn-warning" onclick="updateStock();">Update Stock</button>
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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="script.js"></script>
                <script src="bootstrap.bundle.min.js"></script>
            </div>
    </body>


    </html>



<?php

} else {
    echo "you are not a valid admin";
}

?>