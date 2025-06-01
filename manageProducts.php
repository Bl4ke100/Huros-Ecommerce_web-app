<?php include "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    <title>Horos | Manage Products</title>

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

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            background: var(--primary-black);
            color: var(--pure-white);
            line-height: 1.6;
            overflow-x: hidden;
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
        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.015);
            animation: floatShapes 25s infinite linear;
        }

        .shape:nth-child(1) {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 180px;
            height: 180px;
            top: 60%;
            right: 10%;
            animation-delay: 8s;
        }

        .shape:nth-child(3) {
            width: 80px;
            height: 80px;
            top: 80%;
            left: 20%;
            animation-delay: 15s;
        }

        @keyframes floatShapes {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }

            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.6;
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
            margin-bottom: 3rem;
            text-align: center;
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

        /* Action Buttons */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: var(--border-radius-md);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--pure-white);
            color: var(--primary-black);
        }

        .btn-primary:hover {
            background: var(--gray-100);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: var(--accent-blue);
            color: var(--pure-white);
        }

        .btn-secondary:hover {
            background: #2563eb;
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            padding: 2rem;
            transition: var(--transition-normal);
            animation: fadeInUp 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-xl);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: var(--pure-white);
        }

        .stat-icon.products {
            background: linear-gradient(135deg, var(--accent-green), rgba(16, 185, 129, 0.8));
        }

        .stat-icon.brands {
            background: linear-gradient(135deg, var(--accent-blue), rgba(59, 130, 246, 0.8));
        }

        .stat-icon.categories {
            background: linear-gradient(135deg, var(--accent-purple), rgba(139, 92, 246, 0.8));
        }

        .stat-icon.stock {
            background: linear-gradient(135deg, var(--accent-orange), rgba(249, 115, 22, 0.8));
        }

        .stat-icon.low-stock {
            background: linear-gradient(135deg, var(--accent-red), rgba(239, 68, 68, 0.8));
        }

        .stat-icon.colors {
            background: linear-gradient(135deg, var(--accent-pink), rgba(236, 72, 153, 0.8));
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .stat-details {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .stat-change {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--accent-green);
        }

        .stat-meta {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Products Table */
        .products-section {
            margin-bottom: 3rem;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--pure-white);
        }

        .search-filter-bar {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .search-input {
            padding: 0.75rem 1rem 0.75rem 3rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 0.95rem;
            width: 300px;
            position: relative;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--pure-white);
            background: rgba(255, 255, 255, 0.08);
        }

        .search-container {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
        }

        .filter-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem;
            border-radius: var(--border-radius-md);
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .filter-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--pure-white);
        }

        .table-container {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
        }

        .table-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.02);
        }

        .table-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
        }

        .table-description {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 1.25rem 2rem;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .data-table th {
            background: rgba(255, 255, 255, 0.03);
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-table td {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .data-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-badge.active {
            background: rgba(16, 185, 129, 0.2);
            color: var(--accent-green);
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .status-badge.out-of-stock {
            background: rgba(239, 68, 68, 0.2);
            color: var(--accent-red);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .status-badge.low-stock {
            background: rgba(251, 191, 36, 0.2);
            color: #fbbf24;
            border: 1px solid rgba(251, 191, 36, 0.3);
        }

        /* Action Buttons */
        .action-buttons-table {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-normal);
            font-size: 0.9rem;
        }

        .action-btn.edit {
            background: rgba(59, 130, 246, 0.2);
            color: var(--accent-blue);
        }

        .action-btn.delete {
            background: rgba(239, 68, 68, 0.2);
            color: var(--accent-red);
        }

        .action-btn.view {
            background: rgba(139, 92, 246, 0.2);
            color: var(--accent-purple);
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        /* Modal Styles */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition-normal);
        }

        .modal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
        }

        .modal-container {
            position: relative;
            background: var(--primary-black);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            z-index: 10000;
            animation: slideInUp 0.4s ease;
        }

        .modal-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--pure-white);
        }

        .modal-close {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--pure-white);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            background: var(--pure-white);
            color: var(--primary-black);
        }

        .modal-content {
            padding: 2rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 0.95rem;
            transition: var(--transition-normal);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--pure-white);
            background: rgba(255, 255, 255, 0.08);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        select.form-control {
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.1);
            color: var(--pure-white);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .section-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .search-filter-bar {
                width: 100%;
                flex-direction: column;
            }

            .search-input {
                width: 100%;
            }

            .data-table th,
            .data-table td {
                padding: 1rem;
                font-size: 0.9rem;
            }

            .modal-container {
                width: 95%;
                margin: 1rem;
            }

            .modal-content {
                padding: 1.5rem;
            }
        }

        /* Utility Classes */
        .d-none {
            display: none !important;
        }
    </style>
</head>

<body>
    <?php
    // Get product statistics from database

    // Total products
    $productQuery = Database::search("SELECT COUNT(*) as total_products FROM `product`");
    $productCount = $productQuery->fetch_assoc()['total_products'];

    // Total brands
    $brandQuery = Database::search("SELECT COUNT(*) as total_brands FROM `brand`");
    $brandCount = $brandQuery->fetch_assoc()['total_brands'];

    // Total categories
    $categoryQuery = Database::search("SELECT COUNT(*) as total_categories FROM `category`");
    $categoryCount = $categoryQuery->fetch_assoc()['total_categories'];

    // Total stock items
    $stockQuery = Database::search("SELECT COUNT(*) as total_stock FROM `stock`");
    $stockCount = $stockQuery->fetch_assoc()['total_stock'];

    // Out of stock products
    $outOfStockQuery = Database::search("SELECT COUNT(*) as out_of_stock FROM `stock` WHERE `qty` = 0");
    $outOfStockCount = $outOfStockQuery->fetch_assoc()['out_of_stock'];

    // Low stock products (qty <= 10)
    $lowStockQuery = Database::search("SELECT COUNT(*) as low_stock FROM `stock` WHERE `qty` > 0 AND `qty` <= 10");
    $lowStockCount = $lowStockQuery->fetch_assoc()['low_stock'];

    // Total colors
    $colorQuery = Database::search("SELECT COUNT(*) as total_colors FROM `color`");
    $colorCount = $colorQuery->fetch_assoc()['total_colors'];

    // Total sizes
    $sizeQuery = Database::search("SELECT COUNT(*) as total_sizes FROM `size`");
    $sizeCount = $sizeQuery->fetch_assoc()['total_sizes'];

    // Products with detailed information
    $productsQuery = Database::search("
        SELECT p.id, p.name, p.description, b.brand_name, c.cat_name, 
               col.color_name, s.size_name, st.price, st.qty, st.status
        FROM product p
        INNER JOIN brand b ON p.brand_brand_id = b.brand_id
        INNER JOIN category c ON p.category_cat_id = c.cat_id
        INNER JOIN color col ON p.color_color_id = col.color_id
        INNER JOIN size s ON p.size_size_id = s.size_id
        INNER JOIN stock st ON p.id = st.product_id
        ORDER BY p.id DESC
        LIMIT 15
    ");

    // Brand statistics
    $brandStatsQuery = Database::search("
        SELECT b.brand_name, COUNT(p.id) as product_count
        FROM brand b
        LEFT JOIN product p ON b.brand_id = p.brand_brand_id
        GROUP BY b.brand_id
        ORDER BY product_count DESC
    ");

    // Category statistics
    $categoryStatsQuery = Database::search("
        SELECT c.cat_name, COUNT(p.id) as product_count
        FROM category c
        LEFT JOIN product p ON c.cat_id = p.category_cat_id
        GROUP BY c.cat_id
        ORDER BY product_count DESC
    ");
    ?>

    <div class="page-container">
        <!-- Floating Background Shapes -->
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <!-- Include Admin Navigation -->
        <?php include "adminHeader.php"; ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Page Header -->

            <div class="action-buttons">
                <button class="btn btn-primary" onclick="window.location.href='addProduct.php';">
                    <i class="fas fa-plus"></i>
                    Add New Product
                </button>
                <button class="btn btn-secondary" onclick="openAddBrandModal()">
                    <i class="fas fa-tags"></i>
                    Add New Color/ Category
                </button>
                <button class="btn btn-secondary" onclick="window.location.href='manageStock.php';">
                    <i class="fas fa-tags"></i>
                    Manage Stock
                </button>
            </div>

            <!-- Product Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon products">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <div class="stat-value"><?php echo $productCount; ?></div>
                    <div class="stat-label">Total Products</div>
                    <div class="stat-details">
                        <div class="stat-change">
                            <i class="fas fa-check-circle"></i>
                            <span>Active</span>
                        </div>
                        <div class="stat-meta"><?php echo $stockCount; ?> stock entries</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon brands">
                            <i class="fas fa-tags"></i>
                        </div>
                    </div>
                    <div class="stat-value"><?php echo $brandCount; ?></div>
                    <div class="stat-label">Active Brands</div>
                    <div class="stat-details">
                        <div class="stat-change">
                            <i class="fas fa-star"></i>
                            <span>Premium</span>
                        </div>
                        <div class="stat-meta">
                            <?php
                            $topBrand = Database::search("
                                SELECT b.brand_name, COUNT(p.id) as count 
                                FROM brand b 
                                LEFT JOIN product p ON b.brand_id = p.brand_brand_id 
                                GROUP BY b.brand_id 
                                ORDER BY count DESC 
                                LIMIT 1
                            ");
                            $topBrandData = $topBrand->fetch_assoc();
                            echo $topBrandData['brand_name'] . " leads";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon categories">
                            <i class="fas fa-list"></i>
                        </div>
                    </div>
                    <div class="stat-value"><?php echo $categoryCount; ?></div>
                    <div class="stat-label">Categories</div>
                    <div class="stat-details">
                        <div class="stat-change">
                            <i class="fas fa-layer-group"></i>
                            <span>Diverse</span>
                        </div>
                        <div class="stat-meta"><?php echo $colorCount; ?> colors, <?php echo $sizeCount; ?> sizes</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon stock">
                            <i class="fas fa-warehouse"></i>
                        </div>
                    </div>
                    <div class="stat-value"><?php echo $stockCount - $outOfStockCount; ?></div>
                    <div class="stat-label">In Stock Items</div>
                    <div class="stat-details">
                        <div class="stat-change">
                            <i class="fas fa-chart-line"></i>
                            <span>Available</span>
                        </div>
                        <div class="stat-meta"><?php echo round((($stockCount - $outOfStockCount) / $stockCount) * 100, 1); ?>% availability</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon low-stock">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                    <div class="stat-value"><?php echo $lowStockCount; ?></div>
                    <div class="stat-label">Low Stock Alerts</div>
                    <div class="stat-details">
                        <div class="stat-change">
                            <i class="fas fa-arrow-down"></i>
                            <span>Reorder Soon</span>
                        </div>
                        <div class="stat-meta"><?php echo $outOfStockCount; ?> out of stock</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon colors">
                            <i class="fas fa-palette"></i>
                        </div>
                    </div>
                    <div class="stat-value"><?php echo $colorCount + $sizeCount; ?></div>
                    <div class="stat-label">Variants Available</div>
                    <div class="stat-details">
                        <div class="stat-change">
                            <i class="fas fa-adjust"></i>
                            <span>Options</span>
                        </div>
                        <div class="stat-meta"><?php echo $colorCount; ?> colors, <?php echo $sizeCount; ?> sizes</div>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="products-section">
                <div class="section-header">
                    <h2 class="section-title">Product Inventory</h2>
                    <div class="search-filter-bar">
                        <div class="search-container">
                            <input type="text" class="search-input" placeholder="Search products..." id="productSearch">
                            <i class="fas fa-search search-icon"></i>
                        </div>
                        <button class="filter-btn" title="Filter Products">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <div class="table-header">
                        <h3 class="table-title">Product Catalog</h3>
                        <p class="table-description">Complete overview of all products with stock status</p>
                    </div>

                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($product = $productsQuery->fetch_assoc()) {
                                $statusClass = 'active';
                                $statusText = 'In Stock';

                                if ($product['qty'] == 0) {
                                    $statusClass = 'out-of-stock';
                                    $statusText = 'Out of Stock';
                                } elseif ($product['qty'] <= 10) {
                                    $statusClass = 'low-stock';
                                    $statusText = 'Low Stock';
                                }
                            ?>
                                <tr>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['brand_name']; ?></td>
                                    <td><?php echo $product['cat_name']; ?></td>
                                    <td><?php echo $product['color_name']; ?></td>
                                    <td><?php echo $product['size_name']; ?></td>
                                    <td>$<?php echo number_format($product['price'], 2); ?></td>
                                    <td><?php echo $product['qty']; ?></td>
                                    <td><span class="status-badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span></td>
                                    <td>
                                        <div class="action-buttons-table">
                                            <button class="action-btn delete" title="Delete Product" onclick="deleteProduct(<?php echo $product['id']; ?>)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal" id="addProductModal">
        <div class="modal-backdrop" onclick="closeAddProductModal()"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title">Add New Product</h3>
                <button class="modal-close" onclick="closeAddProductModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-content">
                <form id="addProductForm">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" placeholder="Enter product name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="productDescription" placeholder="Enter product description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Brand</label>
                        <select class="form-control" id="productBrand" required>
                            <option value="">Select Brand</option>
                            <?php
                            $brandsQuery = Database::search("SELECT * FROM `brand` ORDER BY `brand_name`");
                            while ($brand = $brandsQuery->fetch_assoc()) {
                                echo "<option value='{$brand['brand_id']}'>{$brand['brand_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="productCategory" required>
                            <option value="">Select Category</option>
                            <?php
                            $categoriesQuery = Database::search("SELECT * FROM `category` ORDER BY `cat_name`");
                            while ($category = $categoriesQuery->fetch_assoc()) {
                                echo "<option value='{$category['cat_id']}'>{$category['cat_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Color</label>
                        <select class="form-control" id="productColor" required>
                            <option value="">Select Color</option>
                            <?php
                            $colorsQuery = Database::search("SELECT * FROM `color` ORDER BY `color_name`");
                            while ($color = $colorsQuery->fetch_assoc()) {
                                echo "<option value='{$color['color_id']}'>{$color['color_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Size</label>
                        <select class="form-control" id="productSize" required>
                            <option value="">Select Size</option>
                            <?php
                            $sizesQuery = Database::search("SELECT * FROM `size` ORDER BY `size_name`");
                            while ($size = $sizesQuery->fetch_assoc()) {
                                echo "<option value='{$size['size_id']}'>{$size['size_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" id="productPrice" placeholder="0.00" step="0.01" min="0" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Initial Stock Quantity</label>
                        <input type="number" class="form-control" id="productQty" placeholder="0" min="0" required>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-cancel" onclick="closeAddProductModal()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Brand Modal -->
    <div class="modal" id="addBrandModal">
        <div class="modal-backdrop" onclick="closeAddBrandModal()"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title">Add New Brand</h3>
                <button class="modal-close" onclick="closeAddBrandModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-content">
                <form id="addBrandForm">
                    <div class="form-group">
                        <label class="form-label">Brand Name</label>
                        <input type="text" class="form-control" id="brandName" placeholder="Enter brand name" required>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-cancel" onclick="closeAddBrandModal()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <script>
        // Modal Functions
        function openAddProductModal() {
            document.getElementById('addProductModal').classList.add('show');
        }

        function closeAddProductModal() {
            document.getElementById('addProductModal').classList.remove('show');
            document.getElementById('addProductForm').reset();
        }

        function openAddBrandModal() {
            document.getElementById('addBrandModal').classList.add('show');
        }

        function closeAddBrandModal() {
            document.getElementById('addBrandModal').classList.remove('show');
            document.getElementById('addBrandForm').reset();
        }

        // Product Actions
        function viewProduct(productId) {
            // Implement view product functionality
            Swal.fire({
                title: 'View Product',
                text: `Viewing product ID: ${productId}`,
                icon: 'info',
                background: '#1a1a1a',
                color: '#ffffff'
            });
        }

        function editProduct(productId) {
            // Implement edit product functionality
            Swal.fire({
                title: 'Edit Product',
                text: `Editing product ID: ${productId}`,
                icon: 'info',
                background: '#1a1a1a',
                color: '#ffffff'
            });
        }

        function deleteProduct(productId) {
            Swal.fire({
                title: 'Delete Product?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                background: '#1a1a1a',
                color: '#ffffff'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Implement delete functionality
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Product has been deleted.',
                        icon: 'success',
                        background: '#1a1a1a',
                        color: '#ffffff'
                    });
                }
            });
        }

        // Form Submissions
        document.getElementById('addProductForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Collect form data
            const formData = {
                name: document.getElementById('productName').value,
                description: document.getElementById('productDescription').value,
                brand: document.getElementById('productBrand').value,
                category: document.getElementById('productCategory').value,
                color: document.getElementById('productColor').value,
                size: document.getElementById('productSize').value,
                price: document.getElementById('productPrice').value,
                qty: document.getElementById('productQty').value
            };

            // Here you would send the data to your PHP backend
            console.log('Adding product:', formData);

            Swal.fire({
                title: 'Success!',
                text: 'Product added successfully!',
                icon: 'success',
                background: '#1a1a1a',
                color: '#ffffff'
            }).then(() => {
                closeAddProductModal();
                // Refresh the page or update the table
                location.reload();
            });
        });

        document.getElementById('addBrandForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const brandName = document.getElementById('brandName').value;

            // Here you would send the data to your PHP backend
            console.log('Adding brand:', brandName);

            Swal.fire({
                title: 'Success!',
                text: 'Brand added successfully!',
                icon: 'success',
                background: '#1a1a1a',
                color: '#ffffff'
            }).then(() => {
                closeAddBrandModal();
                // Refresh the page or update the brand dropdown
                location.reload();
            });
        });

        // Search functionality
        document.getElementById('productSearch').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('.data-table tbody tr');

            tableRows.forEach(row => {
                const productName = row.cells[0].textContent.toLowerCase();
                const brandName = row.cells[1].textContent.toLowerCase();
                const categoryName = row.cells[2].textContent.toLowerCase();

                if (productName.includes(searchTerm) ||
                    brandName.includes(searchTerm) ||
                    categoryName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Close modals on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddProductModal();
                closeAddBrandModal();
            }
        });

        // Initialize page animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>

</html>