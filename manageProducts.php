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
    <title>Horo | Manage Products</title>

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
            0%, 100% {
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

        .search-container {
            position: relative;
        }

        .search-input {
            padding: 0.75rem 1rem 0.75rem 3rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 0.95rem;
            width: 300px;
            transition: var(--transition-normal);
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--pure-white);
            background: rgba(255, 255, 255, 0.08);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
        }

        .clear-search {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            opacity: 0;
            transition: var(--transition-normal);
        }

        .clear-search.show {
            opacity: 1;
        }

        .clear-search:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--pure-white);
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

        .search-results-info {
            padding: 16px 24px;
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            display: none;
        }

        .search-results-info.show {
            display: block;
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

        .data-table tbody tr {
            transition: var(--transition-normal);
        }

        .data-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .data-table tbody tr.hidden {
            display: none;
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

      
        .action-btn.view {
            background: rgba(139, 92, 246, 0.2);
            color: var(--accent-purple);
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        .no-results {
            text-align: center;
            padding: 60px 20px;
            color: rgba(255, 255, 255, 0.5);
            display: none;
        }

        .no-results.show {
            display: block;
        }

        .no-results i {
            font-size: 48px;
            margin-bottom: 16px;
            color: rgba(255, 255, 255, 0.3);
        }

        .no-results h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.7);
        }

        .no-results p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
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
            <div class="page-header">
                <h1 class="page-title">Product Management</h1>
                <p class="page-subtitle">Manage your product inventory, stock levels, and product information</p>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary" onclick="window.location.href='addProduct.php';">
                    <i class="fas fa-plus"></i>
                    Add New Product
                </button>
                <button class="btn btn-secondary" onclick="window.location.href='manageCats.php';">
                    <i class="fas fa-tags"></i>
                    Add New Color/ Category/
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
                            <button class="clear-search" id="clearSearch" title="Clear search">
                                <i class="fas fa-times"></i>
                            </button>
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

                    <div class="search-results-info" id="searchResults">
                        <span id="searchResultText"></span>
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
                                <tr data-product-id="<?php echo $product['id']; ?>">
                                    <td data-label="product"><?php echo htmlspecialchars($product['name']); ?></td>
                                    <td data-label="brand"><?php echo htmlspecialchars($product['brand_name']); ?></td>
                                    <td data-label="category"><?php echo htmlspecialchars($product['cat_name']); ?></td>
                                    <td data-label="color"><?php echo htmlspecialchars($product['color_name']); ?></td>
                                    <td data-label="size"><?php echo htmlspecialchars($product['size_name']); ?></td>
                                    <td data-label="price">Rs.<?php echo number_format($product['price'], 2); ?></td>
                                    <td data-label="stock"><?php echo $product['qty']; ?></td>
                                    <td data-label="status"><span class="status-badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span></td>
                                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="no-results" id="noResults">
                        <i class="fas fa-search"></i>
                        <h3>No products found</h3>
                        <p>Try adjusting your search terms or clear the search to see all products.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <script>
        // Enhanced Search Functionality
        class ProductSearch {
            constructor() {
                this.searchInput = document.getElementById('productSearch');
                this.clearBtn = document.getElementById('clearSearch');
                this.tableRows = document.querySelectorAll('.data-table tbody tr');
                this.searchResults = document.getElementById('searchResults');
                this.searchResultText = document.getElementById('searchResultText');
                this.noResults = document.getElementById('noResults');
                
                this.totalRows = this.tableRows.length;
                this.visibleRows = this.totalRows;
                
                this.init();
            }

            init() {
                // Search input event
                this.searchInput.addEventListener('input', (e) => {
                    this.performSearch(e.target.value);
                    this.toggleClearButton(e.target.value);
                });

                // Clear search button
                this.clearBtn.addEventListener('click', () => {
                    this.clearSearch();
                });

                // Enter key search
                this.searchInput.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        this.performSearch(e.target.value);
                    }
                });
            }

            performSearch(searchTerm) {
                const term = searchTerm.toLowerCase().trim();
                let visibleCount = 0;

                this.tableRows.forEach(row => {
                    if (!term) {
                        // Show all rows if search is empty
                        row.classList.remove('hidden');
                        visibleCount++;
                        return;
                    }

                    // Get all searchable text content
                    const productName = row.querySelector('[data-label="product"]')?.textContent.toLowerCase() || '';
                    const brandName = row.querySelector('[data-label="brand"]')?.textContent.toLowerCase() || '';
                    const categoryName = row.querySelector('[data-label="category"]')?.textContent.toLowerCase() || '';
                    const colorName = row.querySelector('[data-label="color"]')?.textContent.toLowerCase() || '';
                    const sizeName = row.querySelector('[data-label="size"]')?.textContent.toLowerCase() || '';
                    const statusText = row.querySelector('[data-label="status"]')?.textContent.toLowerCase() || '';
                    const priceText = row.querySelector('[data-label="price"]')?.textContent.toLowerCase() || '';

                    // Check if search term matches any field
                    const isMatch = 
                        productName.includes(term) ||
                        brandName.includes(term) ||
                        categoryName.includes(term) ||
                        colorName.includes(term) ||
                        sizeName.includes(term) ||
                        statusText.includes(term) ||
                        priceText.includes(term);

                    if (isMatch) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                this.visibleRows = visibleCount;
                this.updateSearchResults(term, visibleCount);
            }

            updateSearchResults(searchTerm, visibleCount) {
                if (!searchTerm) {
                    // Hide search results info when no search term
                    this.searchResults.classList.remove('show');
                    this.noResults.classList.remove('show');
                    return;
                }

                if (visibleCount === 0) {
                    // Show no results message
                    this.searchResults.classList.remove('show');
                    this.noResults.classList.add('show');
                } else {
                    // Show search results info
                    this.noResults.classList.remove('show');
                    this.searchResults.classList.add('show');
                    
                    const resultText = visibleCount === 1 
                        ? `Found 1 product matching "${searchTerm}"`
                        : `Found ${visibleCount} products matching "${searchTerm}"`;
                    
                    this.searchResultText.textContent = resultText;
                }
            }

            toggleClearButton(searchTerm) {
                if (searchTerm.length > 0) {
                    this.clearBtn.classList.add('show');
                } else {
                    this.clearBtn.classList.remove('show');
                }
            }

            clearSearch() {
                this.searchInput.value = '';
                this.searchInput.focus();
                this.performSearch('');
                this.toggleClearButton('');
            }
        }

        // Initialize search when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            window.productSearch = new ProductSearch();
        });

        // Product Actions
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

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl+F or Cmd+F to focus search
            if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                e.preventDefault();
                document.getElementById('productSearch').focus();
            }
            
            // Escape to clear search
            if (e.key === 'Escape') {
                if (window.productSearch) {
                    window.productSearch.clearSearch();
                }
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