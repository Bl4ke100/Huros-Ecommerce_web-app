<?php

session_start();
include "connection.php";

if (isset($_SESSION["u"])) {
	$user = $_SESSION["u"];

	// Get search and filter parameters
	$search = isset($_GET['search']) ? $_GET['search'] : '';
	$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
	$category = isset($_GET['category']) ? $_GET['category'] : '';
	$color = isset($_GET['color']) ? $_GET['color'] : '';
	$size = isset($_GET['size']) ? $_GET['size'] : '';
	$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
	$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';
	$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name_asc';
	$page = isset($_GET['page']) ? $_GET['page'] : 1;

?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">

		<meta name="description" content="Premium Fashion Collection - Celeste" />
		<meta name="keywords" content="fashion, clothing, premium, style" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<title>Shop | Celeste Fashion</title>

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

				--accent-blue: #3b82f6;
				--accent-green: #10b981;
				--accent-red: #ef4444;
				--accent-gold: #ffd700;
			}

			body {
				font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
				background: var(--primary-black);
				color: var(--pure-white);
				line-height: 1.6;
				margin: 0;
				padding: 0;
			}

			/* Shop Container */
			.shop-container {
				min-height: 100vh;
				background: var(--gradient-primary);
				position: relative;
				overflow: hidden;
			}

			.shop-container::before {
				content: '';
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.02) 0%, transparent 50%),
					radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.01) 0%, transparent 50%);
				pointer-events: none;
			}

			.container {
				max-width: 1400px;
				margin: 0 auto;
				padding: 0 2rem;
				position: relative;
				z-index: 2;
			}

			/* Page Header */
			.page-header {
				text-align: center;
				padding: 4rem 0 2rem 0;
				animation: fadeInDown 0.8s ease-out;
			}

			.page-title {
				font-size: clamp(3rem, 8vw, 5rem);
				font-weight: 900;
				color: var(--pure-white);
				margin-bottom: 1rem;
				background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.7) 100%);
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
				background-clip: text;
			}

			.page-subtitle {
				font-size: 1.25rem;
				color: rgba(255, 255, 255, 0.8);
				max-width: 600px;
				margin: 0 auto;
			}

			.page-divider {
				width: 80px;
				height: 4px;
				background: var(--pure-white);
				border: none;
				margin: 2rem auto;
				border-radius: 2px;
			}

			/* Search and Filter Section */
			.search-filter-section {
				background: rgba(255, 255, 255, 0.05);
				border: 1px solid rgba(255, 255, 255, 0.1);
				border-radius: var(--border-radius-xl);
				backdrop-filter: blur(20px);
				padding: 2rem;
				margin: 2rem 0;
				box-shadow: var(--shadow-lg);
				animation: slideInUp 0.6s ease-out;
			}

			.search-header {
				display: flex;
				justify-content: space-between;
				align-items: center;
				margin-bottom: 2rem;
			}

			.search-title {
				font-size: 1.5rem;
				font-weight: 700;
				color: var(--pure-white);
				display: flex;
				align-items: center;
				gap: 0.75rem;
			}

			.toggle-filters-btn {
				background: transparent;
				color: var(--pure-white);
				border: 2px solid rgba(255, 255, 255, 0.3);
				padding: 0.5rem 1rem;
				border-radius: var(--border-radius-md);
				cursor: pointer;
				transition: var(--transition-normal);
				display: flex;
				align-items: center;
				gap: 0.5rem;
			}

			.toggle-filters-btn:hover {
				background: rgba(255, 255, 255, 0.1);
				border-color: rgba(255, 255, 255, 0.5);
			}

			/* Search Bar */
			.search-bar {
				margin-bottom: 2rem;
			}

			.search-input-group {
				position: relative;
				max-width: 600px;
				margin: 0 auto;
			}

			.search-input {
				width: 100%;
				padding: 1rem 1.5rem 1rem 3.5rem;
				background: rgba(255, 255, 255, 0.1);
				border: 1px solid rgba(255, 255, 255, 0.2);
				border-radius: var(--border-radius-lg);
				color: var(--pure-white);
				font-size: 1rem;
				transition: var(--transition-normal);
			}

			.search-input::placeholder {
				color: rgba(255, 255, 255, 0.6);
			}

			.search-input:focus {
				outline: none;
				border-color: var(--pure-white);
				background: rgba(255, 255, 255, 0.15);
				box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
			}

			.search-icon {
				position: absolute;
				left: 1.25rem;
				top: 50%;
				transform: translateY(-50%);
				color: rgba(255, 255, 255, 0.6);
				font-size: 1.1rem;
			}

			/* Filters Grid */
			.filters-grid {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
				gap: 1.5rem;
				margin-bottom: 2rem;
			}

			.filter-group {
				display: flex;
				flex-direction: column;
			}

			.filter-label {
				font-weight: 600;
				color: rgba(255, 255, 255, 0.9);
				margin-bottom: 0.5rem;
				font-size: 0.9rem;
				text-transform: uppercase;
				letter-spacing: 0.5px;
			}

			.filter-select,
			.filter-input {
				padding: 0.75rem 1rem;
				background: rgba(255, 255, 255, 0.1);
				border: 1px solid rgba(255, 255, 255, 0.2);
				border-radius: var(--border-radius-md);
				color: var(--pure-white);
				font-size: 0.95rem;
				transition: var(--transition-normal);
			}

			.filter-select:focus,
			.filter-input:focus {
				outline: none;
				border-color: var(--pure-white);
				background: rgba(255, 255, 255, 0.15);
			}

			.filter-select option {
				background: var(--secondary-black);
				color: var(--pure-white);
			}

			.filter-input::placeholder {
				color: rgba(255, 255, 255, 0.5);
			}

			.price-range {
				display: grid;
				grid-template-columns: 1fr auto 1fr;
				gap: 0.75rem;
				align-items: center;
			}

			.price-separator {
				color: rgba(255, 255, 255, 0.6);
				font-weight: 600;
			}

			/* Filter Actions */
			.filter-actions {
				display: flex;
				gap: 1rem;
				justify-content: center;
			}

			.filter-btn {
				padding: 0.875rem 2rem;
				border: none;
				border-radius: var(--border-radius-md);
				font-weight: 600;
				cursor: pointer;
				transition: var(--transition-normal);
				display: flex;
				align-items: center;
				gap: 0.5rem;
				text-transform: uppercase;
				letter-spacing: 0.5px;
				font-size: 0.9rem;
			}

			.btn-search {
				background: var(--pure-white);
				color: var(--primary-black);
			}

			.btn-search:hover {
				background: var(--gray-100);
				transform: translateY(-2px);
				box-shadow: var(--shadow-md);
			}

			.btn-clear {
				background: transparent;
				color: var(--pure-white);
				border: 2px solid var(--pure-white);
			}

			.btn-clear:hover {
				background: rgba(255, 255, 255, 0.1);
				transform: translateY(-2px);
			}

			/* Results Header */
			.results-header {
				display: flex;
				justify-content: space-between;
				align-items: center;
				margin: 2rem 0;
				padding: 1.5rem;
				background: rgba(255, 255, 255, 0.05);
				border: 1px solid rgba(255, 255, 255, 0.1);
				border-radius: var(--border-radius-lg);
				backdrop-filter: blur(20px);
			}

			.results-info {
				color: rgba(255, 255, 255, 0.8);
				font-size: 0.95rem;
			}

			.results-count {
				font-weight: 700;
				color: var(--pure-white);
			}

			.sort-section {
				display: flex;
				align-items: center;
				gap: 1rem;
			}

			.sort-label {
				color: rgba(255, 255, 255, 0.8);
				font-size: 0.9rem;
				font-weight: 500;
			}

			.sort-select {
				padding: 0.5rem 1rem;
				background: rgba(255, 255, 255, 0.1);
				border: 1px solid rgba(255, 255, 255, 0.2);
				border-radius: var(--border-radius-md);
				color: var(--pure-white);
				font-size: 0.9rem;
				min-width: 200px;
			}

			/* Active Filters */
			.active-filters {
				display: flex;
				flex-wrap: wrap;
				gap: 0.75rem;
				margin: 1rem 0;
			}

			.filter-tag {
				background: rgba(255, 255, 255, 0.1);
				color: var(--pure-white);
				padding: 0.5rem 1rem;
				border-radius: var(--border-radius-md);
				font-size: 0.85rem;
				display: flex;
				align-items: center;
				gap: 0.5rem;
				border: 1px solid rgba(255, 255, 255, 0.2);
			}

			.filter-tag .remove-filter {
				color: rgba(255, 255, 255, 0.7);
				cursor: pointer;
				transition: var(--transition-fast);
			}

			.filter-tag .remove-filter:hover {
				color: var(--pure-white);
			}

			/* Product Grid */
			.products-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
				gap: 2rem;
				margin: 2rem 0;
			}

			.product-card {
				background: rgba(255, 255, 255, 0.05);
				border: 1px solid rgba(255, 255, 255, 0.1);
				border-radius: var(--border-radius-lg);
				overflow: hidden;
				transition: var(--transition-normal);
				backdrop-filter: blur(20px);
				box-shadow: var(--shadow-md);
				position: relative;
				animation: slideInUp 0.6s ease-out;
				animation-fill-mode: both;
			}

			.product-card:hover {
				transform: translateY(-10px);
				border-color: rgba(255, 255, 255, 0.3);
				box-shadow: var(--shadow-xl);
			}

			.product-image {
				width: 100%;
				height: 280px;
				object-fit: cover;
				transition: var(--transition-normal);
				filter: grayscale(20%);
			}

			.product-card:hover .product-image {
				filter: grayscale(0%);
				transform: scale(1.05);
			}

			.product-info {
				padding: 1.5rem;
			}

			.product-name {
				font-size: 1.1rem;
				font-weight: 600;
				color: var(--pure-white);
				margin-bottom: 0.5rem;
				line-height: 1.3;
			}

			.product-description {
				color: rgba(255, 255, 255, 0.7);
				font-size: 0.9rem;
				margin-bottom: 1rem;
				line-height: 1.4;
				display: -webkit-box;
				-webkit-line-clamp: 2;
				-webkit-box-orient: vertical;
				overflow: hidden;
			}

			.product-details {
				display: grid;
				grid-template-columns: 1fr 1fr;
				gap: 0.75rem;
				margin-bottom: 1rem;
				font-size: 0.85rem;
			}

			.product-detail {
				display: flex;
				align-items: center;
				gap: 0.5rem;
				color: rgba(255, 255, 255, 0.8);
			}

			.detail-icon {
				width: 16px;
				color: rgba(255, 255, 255, 0.6);
			}

			.product-price {
				font-size: 1.3rem;
				font-weight: 800;
				color: var(--accent-gold);
				margin-bottom: 1rem;
			}

			.product-stock {
				font-size: 0.85rem;
				margin-bottom: 1rem;
				padding: 0.25rem 0.75rem;
				border-radius: var(--border-radius-sm);
				display: inline-block;
				font-weight: 600;
			}

			.in-stock {
				background: rgba(16, 185, 129, 0.2);
				color: var(--accent-green);
				border: 1px solid rgba(16, 185, 129, 0.3);
			}

			.out-of-stock {
				background: rgba(239, 68, 68, 0.2);
				color: var(--accent-red);
				border: 1px solid rgba(239, 68, 68, 0.3);
			}

			.low-stock {
				background: rgba(255, 193, 7, 0.2);
				color: #ffc107;
				border: 1px solid rgba(255, 193, 7, 0.3);
			}

			.product-action {
				width: 100%;
				padding: 0.875rem;
				background: transparent;
				color: var(--pure-white);
				border: 2px solid var(--pure-white);
				border-radius: var(--border-radius-md);
				font-weight: 600;
				cursor: pointer;
				transition: var(--transition-normal);
				text-transform: uppercase;
				letter-spacing: 0.5px;
				font-size: 0.9rem;
				text-decoration: none;
				display: flex;
				align-items: center;
				justify-content: center;
				gap: 0.5rem;
			}

			.product-action:hover {
				background: var(--pure-white);
				color: var(--primary-black);
				transform: translateY(-2px);
				text-decoration: none;
			}

			/* No Results */
			.no-results {
				text-align: center;
				padding: 4rem 2rem;
				color: rgba(255, 255, 255, 0.7);
				background: rgba(255, 255, 255, 0.05);
				border: 1px solid rgba(255, 255, 255, 0.1);
				border-radius: var(--border-radius-xl);
				backdrop-filter: blur(20px);
				margin: 2rem 0;
			}

			.no-results i {
				font-size: 4rem;
				margin-bottom: 2rem;
				color: rgba(255, 255, 255, 0.4);
			}

			.no-results h3 {
				font-size: 1.75rem;
				font-weight: 700;
				color: var(--pure-white);
				margin-bottom: 1rem;
			}

			.no-results p {
				font-size: 1.1rem;
				margin-bottom: 2rem;
			}

			/* Modern Pagination */
			.pagination-container {
				display: flex;
				justify-content: center;
				margin: 3rem 0;
			}

			.pagination {
				background: rgba(255, 255, 255, 0.05);
				border: 1px solid rgba(255, 255, 255, 0.1);
				border-radius: var(--border-radius-lg);
				padding: 0.75rem;
				backdrop-filter: blur(20px);
				box-shadow: var(--shadow-md);
				margin: 0;
			}

			.pagination .page-item {
				margin: 0 0.25rem;
			}

			.pagination .page-link {
				background: transparent;
				color: rgba(255, 255, 255, 0.8);
				border: 1px solid rgba(255, 255, 255, 0.2);
				border-radius: var(--border-radius-sm);
				padding: 0.75rem 1rem;
				font-weight: 500;
				transition: var(--transition-normal);
				cursor: pointer;
				min-width: 45px;
				text-align: center;
				text-decoration: none;
			}

			.pagination .page-link:hover {
				background: rgba(255, 255, 255, 0.1);
				color: var(--pure-white);
				border-color: rgba(255, 255, 255, 0.4);
				transform: translateY(-2px);
				text-decoration: none;
			}

			.pagination .page-item.active .page-link {
				background: var(--pure-white);
				color: var(--primary-black);
				border-color: var(--pure-white);
				font-weight: 600;
				box-shadow: var(--shadow-md);
			}

			.pagination .page-item.disabled .page-link {
				color: rgba(255, 255, 255, 0.3);
				border-color: rgba(255, 255, 255, 0.1);
				cursor: not-allowed;
				opacity: 0.5;
			}

			.pagination .page-item.disabled .page-link:hover {
				background: transparent;
				transform: none;
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

			/* Stagger animation for product cards */
			.product-card:nth-child(1) {
				animation-delay: 0.1s;
			}

			.product-card:nth-child(2) {
				animation-delay: 0.2s;
			}

			.product-card:nth-child(3) {
				animation-delay: 0.3s;
			}

			.product-card:nth-child(4) {
				animation-delay: 0.4s;
			}

			.product-card:nth-child(5) {
				animation-delay: 0.5s;
			}

			.product-card:nth-child(6) {
				animation-delay: 0.6s;
			}

			.product-card:nth-child(7) {
				animation-delay: 0.7s;
			}

			.product-card:nth-child(8) {
				animation-delay: 0.8s;
			}

			/* Responsive Design */
			@media (max-width: 1024px) {
				.container {
					padding: 0 1.5rem;
				}

				.filters-grid {
					grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
				}

				.results-header {
					flex-direction: column;
					gap: 1rem;
					text-align: center;
				}
			}

			@media (max-width: 768px) {
				.container {
					padding: 0 1rem;
				}

				.search-filter-section {
					padding: 1.5rem;
				}

				.search-header {
					flex-direction: column;
					gap: 1rem;
					text-align: center;
				}

				.filters-grid {
					grid-template-columns: 1fr;
					gap: 1rem;
				}

				.filter-actions {
					flex-direction: column;
				}

				.products-grid {
					grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
					gap: 1.5rem;
				}

				.price-range {
					grid-template-columns: 1fr;
					gap: 0.5rem;
				}

				.price-separator {
					text-align: center;
				}
			}

			@media (max-width: 480px) {
				.page-title {
					font-size: 2.5rem;
				}

				.products-grid {
					grid-template-columns: 1fr;
				}

				.pagination .page-link {
					padding: 0.5rem 0.75rem;
					font-size: 0.9rem;
					min-width: 40px;
				}
			}

			/* Hidden by default - toggle with JavaScript */
			.filters-collapsed .filters-grid,
			.filters-collapsed .filter-actions {
				display: none;
			}
		</style>
	</head>

	<body>
		<!-- Include Navigation -->
		<?php include "homeNav.php"; ?>

		<div class="shop-container">
			<div class="container">

				<!-- Page Header -->
				<div class="page-header">
					<h1 class="page-title">Premium Collection</h1>
					<hr class="page-divider">
					<p class="page-subtitle">Discover our curated selection of premium fashion pieces</p>
				</div>



				<?php
				// Build the main query with all joins
				$query = "SELECT s.*, p.*, b.brand_name, c.cat_name, col.color_name, sz.size_name 
                         FROM `stock` s 
                         INNER JOIN `product` p ON s.product_id = p.id 
                         INNER JOIN `brand` b ON p.brand_brand_id = b.brand_id 
                         INNER JOIN `category` c ON p.category_cat_id = c.cat_id 
                         INNER JOIN `color` col ON p.color_color_id = col.color_id 
                         INNER JOIN `size` sz ON p.size_size_id = sz.size_id 
                         WHERE s.status = 1";



				// Get total count for pagination
				$count_query = str_replace("SELECT s.*, p.*, b.brand_name, c.cat_name, col.color_name, sz.size_name", "SELECT COUNT(*)", $query);
				$count_query = preg_replace('/ORDER BY.*/', '', $count_query);
				$count_rs = Database::search($count_query);
				$total_products = $count_rs->fetch_assoc()['COUNT(*)'];

				// Pagination setup
				$results_per_page = 12;
				$total_pages = ceil($total_products / $results_per_page);
				$offset = ($page - 1) * $results_per_page;

				// Add pagination to query
				$final_query = $query . " LIMIT $results_per_page OFFSET $offset";

				// Execute final query
				$products_rs = Database::search($final_query);
				$products_count = $products_rs->num_rows;
				?>




				<!-- Products Grid -->
				<?php if ($products_count > 0): ?>
					<div class="products-grid">
						<?php while ($product = $products_rs->fetch_assoc()): ?>
							<div class="product-card">
								<img src="<?php echo $product['path']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">

								<div class="product-info">
									<h3 class="product-name"><?php echo $product['name']; ?></h3>
									<p class="product-description"><?php echo $product['description']; ?></p>

									<div class="product-details">
										<div class="product-detail">
											<i class="fas fa-tag detail-icon"></i>
											<span><?php echo $product['brand_name']; ?></span>
										</div>
										<div class="product-detail">
											<i class="fas fa-th-large detail-icon"></i>
											<span><?php echo $product['cat_name']; ?></span>
										</div>
										<div class="product-detail">
											<i class="fas fa-palette detail-icon"></i>
											<span><?php echo $product['color_name']; ?></span>
										</div>
										<div class="product-detail">
											<i class="fas fa-ruler detail-icon"></i>
											<span><?php echo $product['size_name']; ?></span>
										</div>
									</div>

									<div class="product-price">Rs. <?php echo number_format($product['price'], 2); ?></div>

									<?php
									$stock_qty = $product['qty'];
									if ($stock_qty > 10): ?>
										<div class="product-stock in-stock">In Stock (<?php echo $stock_qty; ?> available)</div>
									<?php elseif ($stock_qty > 0): ?>
										<div class="product-stock low-stock">Low Stock (<?php echo $stock_qty; ?> left)</div>
									<?php else: ?>
										<div class="product-stock out-of-stock">Out of Stock</div>
									<?php endif; ?>

									<a href="singleProductView.php?s=<?php echo $product['stock_id']; ?>" class="product-action">
										<i class="fas fa-eye"></i>
										View Details
									</a>
								</div>
							</div>
						<?php endwhile; ?>
					</div>

					<!-- Pagination -->
					<?php if ($total_pages > 1): ?>
						<div class="pagination-container">
							<nav>
								<ul class="pagination">
									<!-- Previous Button -->
									<?php if ($page > 1): ?>
										<li class="page-item">
											<a class="page-link" href="<?php echo buildPaginationUrl($page - 1, $search, $brand, $category, $color, $size, $min_price, $max_price, $sort); ?>">
												<i class="fas fa-chevron-left"></i>
											</a>
										</li>
									<?php else: ?>
										<li class="page-item disabled">
											<span class="page-link">
												<i class="fas fa-chevron-left"></i>
											</span>
										</li>
									<?php endif; ?>

									<!-- Page Numbers -->
									<?php
									$start_page = max(1, $page - 2);
									$end_page = min($total_pages, $page + 2);

									for ($i = $start_page; $i <= $end_page; $i++): ?>
										<li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
											<a class="page-link" href="<?php echo buildPaginationUrl($i, $search, $brand, $category, $color, $size, $min_price, $max_price, $sort); ?>">
												<?php echo $i; ?>
											</a>
										</li>
									<?php endfor; ?>

									<!-- Next Button -->
									<?php if ($page < $total_pages): ?>
										<li class="page-item">
											<a class="page-link" href="<?php echo buildPaginationUrl($page + 1, $search, $brand, $category, $color, $size, $min_price, $max_price, $sort); ?>">
												<i class="fas fa-chevron-right"></i>
											</a>
										</li>
									<?php else: ?>
										<li class="page-item disabled">
											<span class="page-link">
												<i class="fas fa-chevron-right"></i>
											</span>
										</li>
									<?php endif; ?>
								</ul>
							</nav>
						</div>
					<?php endif; ?>

				<?php else: ?>
					<!-- No Results -->
					<div class="no-results">
						<i class="fas fa-search"></i>
						<h3>No Products Found</h3>
						<p>We couldn't find any products matching your search criteria. Try adjusting your filters or search terms.</p>
						<button type="button" class="filter-btn btn-clear" onclick="clearFilters()">
							<i class="fas fa-refresh"></i>
							Clear All Filters
						</button>
					</div>
				<?php endif; ?>

			</div>
		</div>

		<!-- Include Footer -->
		<?php include "homeFooter.php"; ?>

		<?php
		// Helper function to build pagination URLs
		function buildPaginationUrl($page_num, $search, $brand, $category, $color, $size, $min_price, $max_price, $sort)
		{
			$params = [];
			if ($search) $params[] = "search=" . urlencode($search);
			if ($brand) $params[] = "brand=" . urlencode($brand);
			if ($category) $params[] = "category=" . urlencode($category);
			if ($color) $params[] = "color=" . urlencode($color);
			if ($size) $params[] = "size=" . urlencode($size);
			if ($min_price) $params[] = "min_price=" . urlencode($min_price);
			if ($max_price) $params[] = "max_price=" . urlencode($max_price);
			if ($sort) $params[] = "sort=" . urlencode($sort);
			$params[] = "page=" . $page_num;

			return "?" . implode("&", $params);
		}
		?>

		
	</body>

	</html>

<?php
} else {
	header("location: signin.php");
}
?>