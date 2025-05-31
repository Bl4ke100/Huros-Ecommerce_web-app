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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Celeste | <?php echo $d["name"] ?></title>

        <style>
            :root {
                --primary-black: #000000;
                --secondary-black: #1a1a1a;
                --pure-white: #ffffff;
                --gray-100: #f8f9fa;
                --gray-200: #e9ecef;
                --gray-300: #dee2e6;
                --gray-400: #6c757d;
                --gray-600: #495057;
                --gray-800: #343a40;

                --gradient-primary: linear-gradient(135deg, #000000 0%, #1a1a1a 50%, #2d2d2d 100%);
                --gradient-secondary: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);

                --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
                --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.15);
                --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.2);
                --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.3);

                --border-radius-sm: 8px;
                --border-radius-md: 12px;
                --border-radius-lg: 16px;
                --border-radius-xl: 24px;

                --transition-fast: 0.2s ease;
                --transition-normal: 0.3s ease;
                --transition-slow: 0.5s ease;
            }

            body.animation2 {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: var(--primary-black);
                color: var(--pure-white);
                line-height: 1.6;
                margin: 0;
                padding: 0;
                min-height: 100vh;
            }

            .product-container {
                min-height: 100vh;
                padding: 2rem 0;
                background: var(--gradient-primary);
                position: relative;
                overflow: hidden;
            }

            .product-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.03) 0%, transparent 50%),
                           radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.02) 0%, transparent 50%);
                pointer-events: none;
            }

            .container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 2rem;
                position: relative;
                z-index: 2;
            }

            .product-card {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                backdrop-filter: blur(20px);
                padding: 3rem;
                box-shadow: var(--shadow-xl);
                margin: 2rem 0;
                animation: slideInUp 0.6s ease-out;
            }

            @keyframes slideInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .product-layout {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 4rem;
                align-items: start;
            }

            .product-image-section {
                position: relative;
            }

            .product-image {
                width: 100%;
                height: 500px;
                object-fit: cover;
                border-radius: var(--border-radius-lg);
                box-shadow: var(--shadow-lg);
                transition: var(--transition-normal);
                filter: grayscale(20%);
            }

            .product-image:hover {
                filter: grayscale(0%);
                transform: scale(1.02);
            }

            .image-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(45deg, rgba(0, 0, 0, 0.1) 0%, transparent 50%);
                border-radius: var(--border-radius-lg);
                pointer-events: none;
            }

            .product-details-section {
                padding-left: 2rem;
            }

            .product-title {
                font-size: 2.5rem;
                font-weight: 800;
                color: var(--pure-white);
                margin-bottom: 1rem;
                line-height: 1.2;
                font-family: 'Inter', sans-serif;
            }

            .product-divider {
                width: 60px;
                height: 3px;
                background: var(--pure-white);
                border: none;
                margin: 1.5rem 0;
                border-radius: 2px;
            }

            .product-specs {
                margin: 2rem 0;
            }

            .spec-item {
                display: flex;
                align-items: center;
                margin-bottom: 1rem;
                padding: 0.75rem 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .spec-label {
                font-weight: 600;
                color: rgba(255, 255, 255, 0.8);
                min-width: 120px;
                font-size: 0.95rem;
            }

            .spec-value {
                color: var(--pure-white);
                font-weight: 500;
                font-size: 1rem;
            }

            .product-description {
                background: rgba(255, 255, 255, 0.03);
                padding: 1.5rem;
                border-radius: var(--border-radius-md);
                border: 1px solid rgba(255, 255, 255, 0.1);
                margin: 2rem 0;
            }

            .description-label {
                font-weight: 600;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 0.75rem;
                font-size: 0.95rem;
            }

            .description-text {
                color: rgba(255, 255, 255, 0.8);
                line-height: 1.6;
                font-size: 0.95rem;
            }

            .quantity-section {
                margin: 2rem 0;
                padding: 1.5rem;
                background: rgba(255, 255, 255, 0.03);
                border-radius: var(--border-radius-md);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .quantity-row {
                display: flex;
                align-items: center;
                gap: 1.5rem;
                margin-bottom: 1rem;
            }

            .quantity-input {
                width: 80px;
                padding: 0.75rem;
                background: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: var(--border-radius-sm);
                color: var(--pure-white);
                font-size: 1rem;
                text-align: center;
                transition: var(--transition-normal);
            }

            .quantity-input:focus {
                outline: none;
                border-color: var(--pure-white);
                background: rgba(255, 255, 255, 0.15);
            }

            .quantity-input::placeholder {
                color: rgba(255, 255, 255, 0.5);
            }

            .available-qty {
                color: #ffd700;
                font-weight: 600;
                font-size: 0.95rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .available-qty i {
                font-size: 0.9rem;
            }

            .price-section {
                margin: 2rem 0;
                padding: 1.5rem;
                background: rgba(255, 255, 255, 0.05);
                border: 2px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-md);
                text-align: center;
            }

            .price-label {
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.7);
                margin-bottom: 0.5rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .price-value {
                font-size: 2rem;
                font-weight: 800;
                color: var(--pure-white);
            }

            .action-buttons {
                display: flex;
                gap: 1rem;
                margin-top: 3rem;
            }

            .action-btn {
                flex: 1;
                padding: 1rem 2rem;
                border: none;
                border-radius: var(--border-radius-md);
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .btn-cart {
                background: transparent;
                color: var(--pure-white);
                border: 2px solid var(--pure-white);
            }

            .btn-cart:hover {
                background: var(--pure-white);
                color: var(--primary-black);
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }

            .btn-buy {
                background: var(--pure-white);
                color: var(--primary-black);
                border: 2px solid var(--pure-white);
            }

            .btn-buy:hover {
                background: transparent;
                color: var(--pure-white);
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }

            .breadcrumb-nav {
                padding: 1rem 0;
                margin-bottom: 1rem;
            }

            .breadcrumb {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: rgba(255, 255, 255, 0.6);
                font-size: 0.9rem;
            }

            .breadcrumb a {
                color: rgba(255, 255, 255, 0.8);
                text-decoration: none;
                transition: var(--transition-fast);
            }

            .breadcrumb a:hover {
                color: var(--pure-white);
            }

            .breadcrumb-separator {
                color: rgba(255, 255, 255, 0.4);
            }

            /* Responsive Design */
            @media (max-width: 1024px) {
                .product-layout {
                    grid-template-columns: 1fr;
                    gap: 3rem;
                }

                .product-details-section {
                    padding-left: 0;
                }

                .product-card {
                    padding: 2rem;
                }
            }

            @media (max-width: 768px) {
                .container {
                    padding: 0 1rem;
                }

                .product-card {
                    padding: 1.5rem;
                    margin: 1rem 0;
                }

                .product-title {
                    font-size: 2rem;
                }

                .action-buttons {
                    flex-direction: column;
                }

                .quantity-row {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }

                .product-image {
                    height: 350px;
                }
            }

            @media (max-width: 480px) {
                .product-title {
                    font-size: 1.75rem;
                }

                .price-value {
                    font-size: 1.5rem;
                }

                .spec-item {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 0.25rem;
                }

                .spec-label {
                    min-width: unset;
                }
            }

            /* Loading Animation */
            .product-card {
                animation: fadeInUp 0.8s ease-out;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(40px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Floating Elements */
            .product-container::after {
                content: '';
                position: absolute;
                top: 20%;
                right: -10%;
                width: 300px;
                height: 300px;
                background: rgba(255, 255, 255, 0.02);
                border-radius: 50%;
                animation: float 20s infinite linear;
            }

            @keyframes float {
                0%, 100% {
                    transform: translateY(0px) rotate(0deg);
                }
                50% {
                    transform: translateY(-20px) rotate(180deg);
                }
            }
        </style>
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
                                    <input type="text" placeholder="Qty" class="quantity-input" id="qty">
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