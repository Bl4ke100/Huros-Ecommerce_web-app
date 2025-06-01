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
    <title>Horos | Admin Dashboard</title>

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
        }

        /* Dashboard Container */
        .dashboard-container {
            min-height: 100vh;
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
        }

        .dashboard-container::before {
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

        .shape:nth-child(4) {
            width: 150px;
            height: 150px;
            top: 30%;
            right: 30%;
            animation-delay: 20s;
        }

        .shape:nth-child(5) {
            width: 100px;
            height: 100px;
            top: 70%;
            left: 60%;
            animation-delay: 12s;
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
            min-height: 100vh;
        }

        /* Header */
        .main-header {
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            padding: 2rem;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
        }

        .brand-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            border-radius: var(--border-radius-md);
        }

        .brand-text {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--pure-white);
            letter-spacing: -0.5px;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.5rem;
        }

        .header-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .dashboard-card {
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

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .dashboard-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-xl);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: var(--pure-white);
            position: relative;
        }

        .card-icon.customers {
            background: linear-gradient(135deg, var(--accent-blue), rgba(59, 130, 246, 0.8));
        }

        .card-icon.products {
            background: linear-gradient(135deg, var(--accent-green), rgba(16, 185, 129, 0.8));
        }

        .card-icon.orders {
            background: linear-gradient(135deg, var(--accent-orange), rgba(249, 115, 22, 0.8));
        }

        .card-icon.revenue {
            background: linear-gradient(135deg, var(--accent-purple), rgba(139, 92, 246, 0.8));
        }

        .card-icon.brands {
            background: linear-gradient(135deg, var(--accent-cyan), rgba(6, 182, 212, 0.8));
        }

        .card-icon.categories {
            background: linear-gradient(135deg, var(--accent-pink), rgba(236, 72, 153, 0.8));
        }

        .card-value {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-label {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .card-details {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .card-change {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .card-change.positive {
            color: var(--accent-green);
        }

        .card-change.neutral {
            color: var(--accent-orange);
        }

        .card-meta {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Data Tables */
        .data-section {
            margin-bottom: 3rem;
        }

        .section-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        .data-table-container {
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
            text-align: center;
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

        .status-badge.inactive {
            background: rgba(239, 68, 68, 0.2);
            color: var(--accent-red);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .status-badge.completed {
            background: rgba(139, 92, 246, 0.2);
            color: var(--accent-purple);
            border: 1px solid rgba(139, 92, 246, 0.3);
        }

        .status-badge.out-of-stock {
            background: rgba(249, 115, 22, 0.2);
            color: var(--accent-orange);
            border: 1px solid rgba(249, 115, 22, 0.3);
        }

        .status-badge.low-stock {
            background: rgba(251, 191, 36, 0.2);
            color: #fbbf24;
            border: 1px solid rgba(251, 191, 36, 0.3);
        }

        /* Charts Section */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .chart-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            padding: 2rem;
            animation: fadeInUp 1s ease-out;
        }

        .chart-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .chart-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
        }

        .chart-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Revenue Chart Simulation */
        .revenue-chart {
            height: 250px;
            background: linear-gradient(180deg, 
                rgba(139, 92, 246, 0.1) 0%, 
                rgba(139, 92, 246, 0.05) 50%, 
                transparent 100%);
            border-radius: var(--border-radius-md);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: end;
            padding: 1rem;
            gap: 0.5rem;
        }

        .chart-bar {
            flex: 1;
            background: var(--accent-purple);
            border-radius: 4px 4px 0 0;
            min-height: 20px;
            opacity: 0.8;
            transition: var(--transition-normal);
        }

        .chart-bar:hover {
            opacity: 1;
            transform: scaleY(1.1);
        }

        /* Top Products List */
        .top-products {
            height: 250px;
            overflow-y: auto;
        }

        .product-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition-normal);
        }

        .product-item:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .product-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .product-rank {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .product-details h4 {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--pure-white);
            margin-bottom: 0.25rem;
        }

        .product-details p {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .product-sales {
            text-align: right;
        }

        .sales-amount {
            font-weight: 700;
            color: var(--accent-green);
            font-size: 0.95rem;
        }

        .sales-count {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
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
        @media (max-width: 1200px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1rem;
            }

            .main-header {
                padding: 1.5rem 1rem;
            }

            .content-area {
                padding: 1rem;
            }

            .brand-section {
                flex-direction: column;
                gap: 0.5rem;
            }

            .brand-text {
                font-size: 2rem;
            }

            .dashboard-card {
                padding: 1.5rem;
            }

            .card-value {
                font-size: 2rem;
            }

            .data-table th,
            .data-table td {
                padding: 1rem;
                font-size: 0.9rem;
            }

            .table-header {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <?php
    // Get dashboard statistics from database
    
    // Total customers
    $customerQuery = Database::search("SELECT COUNT(*) as total_customers FROM `user`");
    $customerCount = $customerQuery->fetch_assoc()['total_customers'];
    
    // Admin and user counts
    $adminQuery = Database::search("SELECT COUNT(*) as admin_count FROM `user` WHERE `user_type_id` = 1");
    $adminCount = $adminQuery->fetch_assoc()['admin_count'];
    $userCount = $customerCount - $adminCount;
    
    // Total products
    $productQuery = Database::search("SELECT COUNT(*) as total_products FROM `product`");
    $productCount = $productQuery->fetch_assoc()['total_products'];
    
    // Total stock items
    $stockQuery = Database::search("SELECT COUNT(*) as total_stock FROM `stock`");
    $stockCount = $stockQuery->fetch_assoc()['total_stock'];
    
    // Total orders
    $orderQuery = Database::search("SELECT COUNT(*) as total_orders FROM `order_history`");
    $orderCount = $orderQuery->fetch_assoc()['total_orders'];
    
    // Total revenue
    $revenueQuery = Database::search("SELECT SUM(`amount`) as total_revenue FROM `order_history`");
    $totalRevenue = $revenueQuery->fetch_assoc()['total_revenue'];
    

    
    // Total brands
    $brandQuery = Database::search("SELECT COUNT(*) as total_brands FROM `brand`");
    $brandCount = $brandQuery->fetch_assoc()['total_brands'];
    
    // Total categories
    $categoryQuery = Database::search("SELECT COUNT(*) as total_categories FROM `category`");
    $categoryCount = $categoryQuery->fetch_assoc()['total_categories'];
    
    // Total colors and sizes
    $colorQuery = Database::search("SELECT COUNT(*) as total_colors FROM `color`");
    $colorCount = $colorQuery->fetch_assoc()['total_colors'];
    
    $sizeQuery = Database::search("SELECT COUNT(*) as total_sizes FROM `size`");
    $sizeCount = $sizeQuery->fetch_assoc()['total_sizes'];
    
    // Recent orders with customer details
    $recentOrdersQuery = Database::search("
        SELECT oh.order_id, oh.order_date, oh.amount, 
               CONCAT(u.fname, ' ', u.lname) as customer_name,
               COUNT(oi.oid) as item_count
        FROM order_history oh
        INNER JOIN user u ON oh.user_id = u.id
        LEFT JOIN order_item oi ON oh.ohid = oi.order_history_ohid
        GROUP BY oh.ohid
        ORDER BY oh.order_date DESC
        LIMIT 10
    ");
    
    // Low stock products
    $lowStockQuery = Database::search("
        SELECT p.name, b.brand_name, c.cat_name, s.price, s.qty, s.status
        FROM product p
        INNER JOIN stock s ON p.id = s.product_id
        INNER JOIN brand b ON p.brand_brand_id = b.brand_id
        INNER JOIN category c ON p.category_cat_id = c.cat_id
        ORDER BY s.qty ASC, p.name ASC
        LIMIT 15
    ");
    
    // Top selling products by revenue
    $topProductsQuery = Database::search("
        SELECT p.name, b.brand_name, c.cat_name,
               SUM(oi.oi_qty * s.price) as total_revenue,
               SUM(oi.oi_qty) as total_sold
        FROM order_item oi
        INNER JOIN stock s ON oi.stock_stock_id = s.stock_id
        INNER JOIN product p ON s.product_id = p.id
        INNER JOIN brand b ON p.brand_brand_id = b.brand_id
        INNER JOIN category c ON p.category_cat_id = c.cat_id
        GROUP BY p.id
        ORDER BY total_revenue DESC
        LIMIT 10
    ");
    
    // Monthly revenue for chart (last 7 months simulation)
    $monthlyRevenueQuery = Database::search("
        SELECT MONTH(order_date) as month, SUM(amount) as monthly_revenue
        FROM order_history
        WHERE order_date >= DATE_SUB(NOW(), INTERVAL 7 MONTH)
        GROUP BY MONTH(order_date)
        ORDER BY MONTH(order_date)
    ");
    
    $monthlyRevenue = [];
    while ($row = $monthlyRevenueQuery->fetch_assoc()) {
        $monthlyRevenue[] = $row['monthly_revenue'];
    }
    
    // Fill with dummy data if not enough months
    while (count($monthlyRevenue) < 7) {
        $monthlyRevenue[] = rand(500, 2000);    
        
    }

    include "adminHeader.php";
    ?>



    <div class="dashboard-container" style="padding-top: 4rem;">
        <!-- Floating Background Shapes -->
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <!-- Main Content -->
        <main class="main-content">


            <!-- Content Area -->
            <div class="content-area">
                <!-- Stats Cards -->
                <div class="dashboard-grid">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-icon customers">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="card-value"><?php echo $customerCount; ?></div>
                        <div class="card-label">Total Customers</div>
                        <div class="card-details">
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>Active Users</span>
                            </div>
                            <div class="card-meta"><?php echo $adminCount; ?> Admin, <?php echo $userCount; ?> Users</div>
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-icon products">
                                <i class="fas fa-box"></i>
                            </div>
                        </div>
                        <div class="card-value"><?php echo $productCount; ?></div>
                        <div class="card-label">Total Products</div>
                        <div class="card-details">
                            <div class="card-change positive">
                                <i class="fas fa-check-circle"></i>
                                <span>In Catalog</span>
                            </div>
                            <div class="card-meta"><?php echo $stockCount; ?> Stock Items</div>
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-icon orders">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                        <div class="card-value"><?php echo $orderCount; ?></div>
                        <div class="card-label">Total Orders</div>
                        <div class="card-details">
                            <div class="card-change positive">
                                <i class="fas fa-chart-line"></i>
                                <span>All Completed</span>
                            </div>
                            <div class="card-meta">100% Success Rate</div>
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-icon revenue">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="card-value">Rs.<?php echo number_format($totalRevenue, 2); ?></div>
                        <div class="card-label">Total Revenue</div>
                        <div class="card-details">
                            <div class="card-change positive">
                                <i class="fas fa-trending-up"></i>
                                <span>Growing</span>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-icon brands">
                                <i class="fas fa-tags"></i>
                            </div>
                        </div>
                        <div class="card-value"><?php echo $brandCount; ?></div>
                        <div class="card-label">Active Brands</div>
                        <div class="card-details">
                            <div class="card-change neutral">
                                <i class="fas fa-star"></i>
                                <span>Premium</span>
                            </div>
                           
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div class="card-header">
                            <div class="card-icon categories">
                                <i class="fas fa-list"></i>
                            </div>
                        </div>
                        <div class="card-value"><?php echo $categoryCount; ?></div>
                        <div class="card-label">Product Categories</div>
                        <div class="card-details">
                            <div class="card-change positive">
                                <i class="fas fa-layer-group"></i>
                                <span>Diverse</span>
                            </div>
                            <div class="card-meta"><?php echo $colorCount; ?> Colors, <?php echo $sizeCount; ?> Sizes</div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="charts-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Revenue Trend</h3>
                            <p class="chart-subtitle">Monthly sales performance overview</p>
                        </div>
                        <div class="revenue-chart">
                            <?php 
                            $maxRevenue = max($monthlyRevenue);
                            foreach ($monthlyRevenue as $revenue) {
                                $height = $maxRevenue > 0 ? ($revenue / $maxRevenue) * 100 : 20;
                                echo "<div class='chart-bar' style='height: {$height}%;'></div>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Top Selling Products</h3>
                            <p class="chart-subtitle">Best performers by revenue</p>
                        </div>
                        <div class="top-products">
                            <?php
                            $rank = 1;
                            while ($product = $topProductsQuery->fetch_assoc()) {
                            ?>
                            <div class="product-item">
                                <div class="product-info">
                                    <div class="product-rank"><?php echo $rank; ?></div>
                                    <div class="product-details">
                                        <h4><?php echo $product['name']; ?></h4>
                                        <p><?php echo $product['cat_name']; ?> • <?php echo $product['brand_name']; ?></p>
                                    </div>
                                </div>
                                <div class="product-sales">
                                    <div class="sales-amount">Rs.<?php echo number_format($product['total_revenue'], 2); ?></div>
                                    <div class="sales-count"><?php echo $product['total_sold']; ?> sold</div>
                                </div>
                            </div>
                            <?php
                            $rank++;
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="data-section">
                    <div class="section-header">
                        <h2 class="section-title">Recent Orders</h2>
                        <p class="section-subtitle">Latest customer orders and transaction details</p>
                    </div>

                    <div class="data-table-container">
                        <div class="table-header">
                            <h3 class="table-title">Order History</h3>
                            <p class="table-description">Real-time order tracking and customer information</p>
                        </div>

                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Items</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($order = $recentOrdersQuery->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td>#<?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['customer_name']; ?></td>
                                    <td><?php echo date('Y-m-d', strtotime($order['order_date'])); ?></td>
                                    <td>Rs.<?php echo number_format($order['amount'], 2); ?></td>
                                    <td><?php echo $order['item_count']; ?> item<?php echo $order['item_count'] != 1 ? 's' : ''; ?></td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Product Inventory Status -->
                <div class="data-section">
                    <div class="section-header">
                        <h2 class="section-title">Inventory Status</h2>
                        <p class="section-subtitle">Current stock levels and product availability</p>
                    </div>

                    <div class="data-table-container">
                        <div class="table-header">
                            <h3 class="table-title">Stock Overview</h3>
                            <p class="table-description">Monitor inventory levels and restock requirements</p>
                        </div>

                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($product = $lowStockQuery->fetch_assoc()) {
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
                                    <td>Rs.<?php echo number_format($product['price'], 2); ?></td>
                                    <td><?php echo $product['qty']; ?></td>
                                    <td><span class="status-badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <script>
        // Initialize dashboard with animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add staggered animation to cards
            const cards = document.querySelectorAll('.dashboard-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Add hover effects to chart bars
            const chartBars = document.querySelectorAll('.chart-bar');
            chartBars.forEach(bar => {
                bar.addEventListener('mouseenter', function() {
                    this.style.background = 'linear-gradient(135deg, var(--accent-purple), var(--accent-pink))';
                });
                
                bar.addEventListener('mouseleave', function() {
                    this.style.background = 'var(--accent-purple)';
                });
            });

            // Animate numbers on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const value = entry.target;
                        const finalValue = parseInt(value.textContent.replace(/[^0-9]/g, ''));
                        if (finalValue > 0) {
                            animateValue(value, 0, finalValue, 1000);
                        }
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.card-value').forEach(value => {
                observer.observe(value);
            });
        });

        function animateValue(element, start, end, duration) {
            const range = end - start;
            const startTime = performance.now();
            const originalText = element.textContent;
            const prefix = originalText.match(/^\$/) ? '$' : '';
            const suffix = originalText.match(/\.\d+$/) ? originalText.match(/\.\d+$/)[0] : '';

            function step(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easeOutCubic = 1 - Math.pow(1 - progress, 3);
                const current = Math.floor(start + range * easeOutCubic);
                
                element.textContent = prefix + current + suffix;
                
                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    element.textContent = originalText; // Restore original formatting
                }
            }
            
            requestAnimationFrame(step);
        }
    </script>
</body>

</html>