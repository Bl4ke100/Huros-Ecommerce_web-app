<?php

include "connection.php";
$stockId = $_GET["s"];

if (isset($stockId)) {

    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `brand`
 ON `product`.`brand_brand_id`=`brand`.`brand_id` INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id` INNER JOIN 
 `category` ON `product`.`category_cat_id`=`category`.`cat_id` INNER JOIN `size` ON `product`.`size_size_id` = `size`.`size_id`
 WHERE `stock`.`stock_id` = '" . $stockId . "' ";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="">

    <head>
        <link rel="stylesheet" href="styles/singleProductView.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title><?php echo $d["name"] ?></title>

    </head>

    <body class="animation2">

        <?php include "homeNav.php"; ?>

        <div class="product-container">
            <div class="container">
                
                <!-- Breadcrumb Navigation -->
                <div class="breadcrumb-nav">
                    <nav class="breadcrumb">
                        <a href="testindex.php">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                        <span class="breadcrumb-separator">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        <a href="#">Products</a>
                        <span class="breadcrumb-separator">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        <span><?php echo $d["name"] ?></span>
                    </nav>
                </div>

                <!-- Product Card -->
                <div class="product-card">
                    <div class="product-layout">
                        
                        <!-- Product Image Section -->
                        <div class="product-image-section">
                            <div class="image-overlay"></div>
                            <img src="<?php echo $d["path"] ?>" alt="<?php echo $d["name"] ?>" class="product-image">
                        </div>

                        <!-- Product Details Section -->
                        <div class="product-details-section">
                            <h1 class="product-title"><?php echo $d["name"] ?></h1>
                            <hr class="product-divider">

                            <!-- Product Specifications -->
                            <div class="product-specs">
                                <div class="spec-item">
                                    <span class="spec-label">Brand</span>
                                    <span class="spec-value"><?php echo $d["brand_name"] ?></span>
                                </div>
                                <div class="spec-item">
                                    <span class="spec-label">Category</span>
                                    <span class="spec-value"><?php echo $d["cat_name"] ?></span>
                                </div>
                                <div class="spec-item">
                                    <span class="spec-label">Color</span>
                                    <span class="spec-value"><?php echo $d["color_name"] ?></span>
                                </div>
                                <div class="spec-item">
                                    <span class="spec-label">Size</span>
                                    <span class="spec-value"><?php echo $d["size_name"] ?></span>
                                </div>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description">
                                <div class="description-label">Description</div>
                                <div class="description-text"><?php echo $d["description"] ?></div>
                            </div>

                            <!-- Quantity Selection -->
                            <div class="quantity-section">
                                <div class="quantity-row">
                                    <input type="text" placeholder="Qty" value="1" class="quantity-input" id="qty">
                                    <div class="available-qty">
                                        <i class="fas fa-box"></i>
                                        Available: <?php echo $d["qty"] ?> items
                                    </div>
                                </div>
                            </div>

                            <!-- Price Section -->
                            <div class="price-section">
                                <div class="price-label">Price</div>
                                <div class="price-value">Rs. <?php echo number_format($d["price"], 2) ?></div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <button class="action-btn btn-cart" onclick="addtoCart('<?php echo $d['stock_id'] ?>');">
                                    <i class="fas fa-shopping-cart"></i>
                                    Add To Cart
                                </button>
                                <button class="action-btn btn-buy" onclick="buyNow('<?php echo $d['stock_id'] ?>');">
                                    <i class="fas fa-bolt"></i>
                                    Buy Now
                                </button>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <?php include "homeFooter.php"; ?>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>

<?php

} else {
    header("location:testindex.php");
}

?>