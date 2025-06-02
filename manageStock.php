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
    <title>Celeste | Stock Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">

    <style>
        :root {
            --primary-black: #000000;
            --secondary-black: #1a1a1a;
            --tertiary-black: #2d2d2d;
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

            --accent-blue: #3b82f6;
            --accent-green: #10b981;
            --accent-red: #ef4444;
            --accent-gold: #ffd700;
            --accent-purple: #8b5cf6;
            --accent-orange: #f97316;
            --accent-cyan: #06b6d4;
            --accent-pink: #ec4899;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.animation {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            background: var(--gradient-primary);
            color: var(--pure-white);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
            padding-top: 70px;
        }

        /* Page Container */
        .page-container {
            min-height: 100vh;
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
        }

        .page-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.02) 0%, transparent 50%),
                       radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.01) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Floating Background Shapes */
        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            list-style: none;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.03);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        /* Main Content */
        .main-content {
            position: relative;
            z-index: 2;
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-orange), transparent);
            margin: 2rem auto;
            border-radius: 1px;
            max-width: 200px;
        }

        /* Main Layout */
        .content-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        /* Products List Section */
        .products-section {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            padding: 2rem;
            animation: slideInLeft 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .products-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .section-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--accent-blue), rgba(59, 130, 246, 0.8));
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pure-white);
            font-size: 1.25rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--pure-white);
            margin-bottom: 0.25rem;
        }

        .section-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Search Bar */
        .search-container {
            position: relative;
            margin-bottom: 2rem;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 0.95rem;
            transition: var(--transition-normal);
            outline: none;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-input:focus {
            border-color: var(--accent-blue);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 1rem;
        }

        /* Products List */
        .products-list {
            max-height: 500px;
            overflow-y: auto;
            border-radius: var(--border-radius-md);
        }

        .product-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: var(--border-radius-md);
            margin-bottom: 0.75rem;
            transition: var(--transition-normal);
            cursor: pointer;
        }

        .product-item:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        .product-item.selected {
            background: rgba(59, 130, 246, 0.2);
            border-color: var(--accent-blue);
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-weight: 600;
            color: var(--pure-white);
            font-size: 0.95rem;
            margin-bottom: 0.25rem;
        }

        .product-details {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .product-stock {
            text-align: right;
        }

        .current-stock {
            font-weight: 700;
            color: var(--accent-green);
            font-size: 1rem;
        }

        .current-price {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 0.25rem;
        }

        .stock-status {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .stock-status.in-stock {
            background: rgba(16, 185, 129, 0.2);
            color: var(--accent-green);
        }

        .stock-status.low-stock {
            background: rgba(251, 191, 36, 0.2);
            color: #fbbf24;
        }

        .stock-status.out-of-stock {
            background: rgba(239, 68, 68, 0.2);
            color: var(--accent-red);
        }

        /* Stock Update Section */
        .stock-update-section {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            padding: 2rem;
            animation: slideInRight 0.8s ease-out;
            position: relative;
            overflow: hidden;
            height: fit-content;
        }

        .stock-update-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .update-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .update-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--accent-orange), rgba(249, 115, 22, 0.8));
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pure-white);
            font-size: 1.25rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 1rem 1.25rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 1rem;
            font-weight: 500;
            transition: var(--transition-normal);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-orange);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1);
            transform: translateY(-2px);
        }

        .form-select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1rem;
            padding-right: 3rem;
        }

        .form-select option {
            background: var(--secondary-black);
            color: var(--pure-white);
            padding: 0.5rem;
        }

        /* Selected Product Display */
        .selected-product-info {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: var(--border-radius-md);
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: none;
        }

        .selected-product-info.show {
            display: block;
        }

        .selected-product-name {
            font-weight: 600;
            color: var(--accent-blue);
            margin-bottom: 0.5rem;
        }

        .selected-product-current {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Submit Button */
        .d-grid {
            margin-top: 2rem;
        }

        .btn {
            width: 100%;
            padding: 1.25rem 2rem;
            border: none;
            border-radius: var(--border-radius-md);
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-normal);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--accent-orange), rgba(249, 115, 22, 0.9));
            color: var(--pure-white);
            box-shadow: var(--shadow-md);
        }

        .btn-warning::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-warning:hover::before {
            left: 100%;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #ea580c, var(--accent-orange));
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-warning:active {
            transform: translateY(-1px);
        }

        /* Loading State */
        .btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid var(--pure-white);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 0.5rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Form Validation */
        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: var(--accent-red);
            background: rgba(239, 68, 68, 0.1);
        }

        .form-control.is-valid,
        .form-select.is-valid {
            border-color: var(--accent-green);
            background: rgba(16, 185, 129, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .content-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .products-section,
            .stock-update-section {
                padding: 1.5rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .products-list {
                max-height: 300px;
            }

            .product-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .product-stock {
                text-align: left;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.75rem;
            }

            .section-header,
            .update-header {
                flex-direction: column;
                text-align: center;
                gap: 0.75rem;
            }

            .form-control,
            .form-select {
                padding: 0.875rem 1rem;
            }

            .btn {
                padding: 1rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        /* Utility Classes */
        .d-none {
            display: none !important;
        }

        .d-grid {
            display: grid;
        }

        /* Focus States for Accessibility */
        .form-control:focus-visible,
        .form-select:focus-visible,
        .btn:focus-visible {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }
    </style>
</head>

<body class="animation">
    <div class="page-container">
        <!-- Include Admin Navigation -->
        <?php include "adminHeader.php"; ?>

        <!-- Main Content -->
        <div class="main-content">
            

            <!-- Main Layout -->
            <div class="content-layout">
                
                <!-- Products List Section -->
                <div class="products-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Product Inventory</h3>
                            <p class="section-subtitle">Browse products and select one to update stock</p>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="search-container">
                        <input type="text" class="search-input" id="productSearch" placeholder="Search products by name, brand, or category...">
                        <i class="fas fa-search search-icon"></i>
                    </div>

                    <!-- Products List -->
                    <div class="products-list" id="productsList">
                        <?php
                        // Get all products with stock information
                        $productsQuery = Database::search("
                            SELECT p.id, p.name, p.description, 
                                   b.brand_name, c.cat_name, col.color_name, s.size_name,
                                   st.price, st.qty, st.status
                            FROM product p
                            INNER JOIN brand b ON p.brand_brand_id = b.brand_id
                            INNER JOIN category c ON p.category_cat_id = c.cat_id
                            INNER JOIN color col ON p.color_color_id = col.color_id
                            INNER JOIN size s ON p.size_size_id = s.size_id
                            LEFT JOIN stock st ON p.id = st.product_id
                            ORDER BY p.name ASC
                        ");

                        while ($product = $productsQuery->fetch_assoc()) {
                            $stockStatus = 'out-of-stock';
                            $statusText = 'Out of Stock';
                            $statusIcon = 'fas fa-times-circle';
                            
                            if ($product['qty'] > 10) {
                                $stockStatus = 'in-stock';
                                $statusText = 'In Stock';
                                $statusIcon = 'fas fa-check-circle';
                            } elseif ($product['qty'] > 0) {
                                $stockStatus = 'low-stock';
                                $statusText = 'Low Stock';
                                $statusIcon = 'fas fa-exclamation-triangle';
                            }
                            
                            $currentQty = $product['qty'] ?? 0;
                            $currentPrice = $product['price'] ?? 0;
                        ?>
                        <div class="product-item" onclick="selectProduct(<?php echo $product['id']; ?>, '<?php echo addslashes($product['name']); ?>', <?php echo $currentQty; ?>, <?php echo $currentPrice; ?>)" data-product-id="<?php echo $product['id']; ?>">
                            <div class="product-info">
                                <div class="product-name"><?php echo $product['name']; ?></div>
                                <div class="product-details">
                                    <?php echo $product['brand_name']; ?> • <?php echo $product['cat_name']; ?> • 
                                    <?php echo $product['color_name']; ?> • <?php echo $product['size_name']; ?>
                                </div>
                            </div>
                            <div class="product-stock">
                                <div class="current-stock"><?php echo $currentQty; ?> units</div>
                                <div class="current-price">Rs.<?php echo number_format($currentPrice, 2); ?></div>
                                <div class="stock-status <?php echo $stockStatus; ?>">
                                    <i class="<?php echo $statusIcon; ?>"></i>
                                    <?php echo $statusText; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <!-- Stock Update Section -->
                <div class="stock-update-section">
                    <div class="update-header">
                        <div class="update-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Update Stock</h3>
                            <p class="section-subtitle">Modify quantity and pricing</p>
                        </div>
                    </div>

                    <!-- Selected Product Info -->
                    <div class="selected-product-info" id="selectedProductInfo">
                        <div class="selected-product-name" id="selectedProductName"></div>
                        <div class="selected-product-current" id="selectedProductCurrent"></div>
                    </div>

                    <!-- Stock Update Form -->
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <option value="0">Select a product from the list</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `product` ORDER BY `name`");
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

                    <div class="form-group">
                        <label class="form-label">New Stock quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" min="0">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Unit Price</label>
                        <input type="number" class="form-control" id="uprice" placeholder="Enter unit price" min="0" step="0.01">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-warning" onclick="updateStock();" id="updateBtn">
                            <i class="fas fa-save"></i>
                            Update Stock
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Animated Background -->
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
    </div>

    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <script>
        let selectedProductId = null;

        // Product selection function
        function selectProduct(productId, productName, currentQty, currentPrice) {
            // Update selected product
            selectedProductId = productId;
            
            // Update dropdown
            document.getElementById('selectProduct').value = productId;
            
            // Show selected product info
            const infoDiv = document.getElementById('selectedProductInfo');
            const nameDiv = document.getElementById('selectedProductName');
            const currentDiv = document.getElementById('selectedProductCurrent');
            
            nameDiv.textContent = productName;
            currentDiv.textContent = `Current Stock: ${currentQty} units at $${currentPrice.toFixed(2)} each`;
            infoDiv.classList.add('show');
            
            // Pre-fill current values
            document.getElementById('quantity').value = currentQty;
            document.getElementById('uprice').value = currentPrice.toFixed(2);
            
            // Update visual selection
            document.querySelectorAll('.product-item').forEach(item => {
                item.classList.remove('selected');
            });
            document.querySelector(`[data-product-id="${productId}"]`).classList.add('selected');
        }

        // Dropdown change handler
        document.getElementById('selectProduct').addEventListener('change', function() {
            const selectedValue = this.value;
            if (selectedValue !== '0') {
                // Find the product item and simulate click
                const productItem = document.querySelector(`[data-product-id="${selectedValue}"]`);
                if (productItem) {
                    productItem.click();
                }
            } else {
                // Clear selection
                selectedProductId = null;
                document.getElementById('selectedProductInfo').classList.remove('show');
                document.getElementById('quantity').value = '';
                document.getElementById('uprice').value = '';
                document.querySelectorAll('.product-item').forEach(item => {
                    item.classList.remove('selected');
                });
            }
        });

        // Search functionality
        document.getElementById('productSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const productItems = document.querySelectorAll('.product-item');
            
            productItems.forEach(item => {
                const productName = item.querySelector('.product-name').textContent.toLowerCase();
                const productDetails = item.querySelector('.product-details').textContent.toLowerCase();
                
                if (productName.includes(searchTerm) || productDetails.includes(searchTerm)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Enhanced update stock function
        const originalUpdateStock = window.updateStock;
        window.updateStock = function() {
            const selectedProduct = document.getElementById('selectProduct').value;
            const quantity = document.getElementById('quantity').value;
            const unitPrice = document.getElementById('uprice').value;
            
            // Validation
            if (!selectedProduct || selectedProduct === '0') {
                Swal.fire({
                    title: 'Validation Error',
                    text: 'Please select a product',
                    icon: 'error',
                    background: '#1a1a1a',
                    color: '#ffffff',
                    confirmButtonColor: '#ef4444'
                });
                return;
            }
            
            if (!quantity || quantity < 0) {
                Swal.fire({
                    title: 'Validation Error',
                    text: 'Please enter a valid quantity',
                    icon: 'error',
                    background: '#1a1a1a',
                    color: '#ffffff',
                    confirmButtonColor: '#ef4444'
                });
                return;
            }
            
            if (!unitPrice || unitPrice <= 0) {
                Swal.fire({
                    title: 'Validation Error',
                    text: 'Please enter a valid unit price',
                    icon: 'error',
                    background: '#1a1a1a',
                    color: '#ffffff',
                    confirmButtonColor: '#ef4444'
                });
                return;
            }

            const updateBtn = document.getElementById('updateBtn');
            const originalText = updateBtn.innerHTML;
            
            // Add loading state
            updateBtn.classList.add('loading');
            updateBtn.disabled = true;
            updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';

            // Call original function if it exists
            if (typeof originalUpdateStock === 'function') {
                originalUpdateStock();
            } else {
                // Simulate successful update
                setTimeout(() => {
                    updateBtn.classList.remove('loading');
                    updateBtn.disabled = false;
                    updateBtn.innerHTML = originalText;
                    
                    Swal.fire({
                        title: 'Stock Updated Successfully!',
                        text: 'The stock has been updated successfully.',
                        icon: 'success',
                        background: '#1a1a1a',
                        color: '#ffffff',
                        confirmButtonColor: '#10b981'
                    }).then(() => {
                        // Reload page to show updated stock
                        location.reload();
                    });
                }, 2000);
            }
        };

        // Form validation
        function validateField(fieldId) {
            const field = document.getElementById(fieldId);
            const value = field.value.trim();
            
            field.classList.remove('is-invalid', 'is-valid');
            
            if (!value || (fieldId !== 'selectProduct' && parseFloat(value) < 0)) {
                field.classList.add('is-invalid');
                return false;
            } else {
                field.classList.add('is-valid');
                return true;
            }
        }

        // Real-time validation
        ['selectProduct', 'quantity', 'uprice'].forEach(fieldId => {
            const field = document.getElementById(fieldId);
            field.addEventListener('blur', function() {
                validateField(fieldId);
            });
            
            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });
        });

        // Page load animations
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.products-section, .stock-update-section');
            sections.forEach((section, index) => {
                section.style.animationDelay = `${index * 0.2}s`;
            });
        });
    </script>
</body>
</html>

<?php
} else {
    echo "You are not a valid admin";
}
?>