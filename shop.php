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
				padding-top: 90px; /* Account for fixed header */
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
				padding: 2rem 0;
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

			/* Quick Actions */
			.quick-actions {
				display: flex;
				justify-content: center;
				gap: 1rem;
				margin: 1.5rem 0;
				flex-wrap: wrap;
			}

			.quick-action-btn {
				background: transparent;
				color: var(--pure-white);
				border: 2px solid rgba(255, 255, 255, 0.3);
				padding: 0.75rem 1.5rem;
				border-radius: var(--border-radius-md);
				font-weight: 600;
				cursor: pointer;
				transition: var(--transition-normal);
				display: flex;
				align-items: center;
				gap: 0.5rem;
				text-decoration: none;
				font-size: 0.9rem;
			}

			.quick-action-btn:hover {
				background: rgba(255, 255, 255, 0.1);
				border-color: rgba(255, 255, 255, 0.5);
				transform: translateY(-2px);
				text-decoration: none;
				color: var(--pure-white);
			}

			.quick-action-btn.primary {
				background: var(--accent-blue);
				border-color: var(--accent-blue);
				color: var(--pure-white);
			}

			.quick-action-btn.primary:hover {
				background: rgba(59, 130, 246, 0.8);
				color: var(--pure-white);
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
				display: flex;
				align-items: center;
				gap: 1rem;
			}

			.results-count {
				background: rgba(16, 185, 129, 0.2);
				color: var(--accent-green);
				padding: 0.25rem 0.75rem;
				border-radius: var(--border-radius-sm);
				font-weight: 600;
				font-size: 0.85rem;
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
				cursor: pointer;
			}

			.sort-select:focus {
				outline: none;
				border-color: var(--pure-white);
			}

			.sort-select option {
				background: var(--secondary-black);
				color: var(--pure-white);
			}

			/* Advanced Search Modal */
			.search-modal {
				position: fixed;
				top: 0;
				left: 0;
				width: 100vw;
				height: 100vh;
				z-index: 9999;
				display: flex;
				align-items: center;
				justify-content: center;
			}

			.search-backdrop {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: rgba(0, 0, 0, 0.8);
				backdrop-filter: blur(10px);
			}

			.search-container {
				position: relative;
				background: var(--primary-black);
				border: 2px solid var(--pure-white);
				border-radius: var(--border-radius-xl);
				width: 90%;
				max-width: 900px;
				max-height: 90vh;
				overflow-y: auto;
				z-index: 10000;
				animation: slideInUp 0.4s ease;
			}

			.search-modal-header {
				padding: 2rem;
				border-bottom: 1px solid rgba(255, 255, 255, 0.1);
				display: flex;
				align-items: center;
				justify-content: space-between;
			}

			.search-modal-header h3 {
				font-size: 1.75rem;
				font-weight: 700;
			}

			.search-close {
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

			.search-close:hover {
				background: var(--pure-white);
				color: var(--primary-black);
			}

			.search-content {
				padding: 2rem;
			}

			.search-filters {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
				gap: 1.5rem;
				margin-bottom: 2rem;
			}

			.filter-group label {
				display: block;
				font-weight: 600;
				margin-bottom: 0.5rem;
				font-size: 0.9rem;
				color: rgba(255, 255, 255, 0.9);
			}

			.filter-select,
			.price-input {
				width: 100%;
				padding: 0.875rem 1rem;
				background: rgba(255, 255, 255, 0.05);
				border: 1px solid rgba(255, 255, 255, 0.2);
				border-radius: var(--border-radius-md);
				color: var(--pure-white);
				font-size: 0.95rem;
				transition: var(--transition-normal);
			}

			.filter-select:focus,
			.price-input:focus {
				outline: none;
				border-color: var(--pure-white);
				background: rgba(255, 255, 255, 0.1);
			}

			.filter-select option {
				background: var(--secondary-black);
				color: var(--pure-white);
			}

			.price-inputs {
				display: flex;
				align-items: center;
				gap: 0.75rem;
			}

			.price-separator {
				font-weight: 600;
				color: rgba(255, 255, 255, 0.6);
			}

			.search-btn {
				width: 100%;
				background: var(--pure-white);
				color: var(--primary-black);
				border: none;
				padding: 1rem 2rem;
				border-radius: var(--border-radius-md);
				font-size: 1.1rem;
				font-weight: 600;
				cursor: pointer;
				transition: var(--transition-normal);
				display: flex;
				align-items: center;
				justify-content: center;
				gap: 0.5rem;
			}

			.search-btn:hover {
				background: var(--gray-100);
				transform: translateY(-2px);
			}

			/* Loading State */
			.loading-state {
				text-align: center;
				padding: 4rem 2rem;
				color: rgba(255, 255, 255, 0.7);
			}

			.loading-spinner {
				width: 60px;
				height: 60px;
				border: 3px solid rgba(255, 255, 255, 0.1);
				border-top: 3px solid var(--pure-white);
				border-radius: 50%;
				animation: spin 1s linear infinite;
				margin: 0 auto 1.5rem;
			}

			@keyframes spin {
				0% { transform: rotate(0deg); }
				100% { transform: rotate(360deg); }
			}

			.loading-text {
				font-size: 1.1rem;
				font-weight: 500;
			}

			/* Product Grid (using existing styles but adding ID for AJAX) */
			.products-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
				gap: 2rem;
				margin: 2rem 0;
			}

			/* Product Card Styles (keeping existing) */
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

			/* Modern Pagination (keeping existing) */
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
			.product-card:nth-child(1) { animation-delay: 0.1s; }
			.product-card:nth-child(2) { animation-delay: 0.2s; }
			.product-card:nth-child(3) { animation-delay: 0.3s; }
			.product-card:nth-child(4) { animation-delay: 0.4s; }
			.product-card:nth-child(5) { animation-delay: 0.5s; }
			.product-card:nth-child(6) { animation-delay: 0.6s; }
			.product-card:nth-child(7) { animation-delay: 0.7s; }
			.product-card:nth-child(8) { animation-delay: 0.8s; }

			/* Responsive Design */
			@media (max-width: 1024px) {
				.container {
					padding: 0 1.5rem;
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

				.quick-actions {
					flex-direction: column;
					align-items: center;
				}

				.quick-action-btn {
					width: 100%;
					max-width: 300px;
					justify-content: center;
				}

				.products-grid {
					grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
					gap: 1.5rem;
				}

				.search-filters {
					grid-template-columns: 1fr;
				}

				.price-inputs {
					flex-direction: column;
					gap: 0.5rem;
				}
			}

			@media (max-width: 480px) {
				.shop-container {
					padding-top: 80px;
				}

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

			/* Search input animation when active */
			.search-active .search-icon {
				animation: pulse 1.5s infinite;
			}

			@keyframes pulse {
				0% { opacity: 1; }
				50% { opacity: 0.6; }
				100% { opacity: 1; }
			}
		</style>
	</head>

	<body>
		<!-- Include Navigation -->
		<?php include "homeNav.php"; ?>

		<!-- Advanced Search Modal -->
		<div class="search-modal d-none" id="filterId">
			<div class="search-backdrop" onclick="viewFilter()"></div>
			<div class="search-container">
				<div class="search-modal-header">
					<h3>Advanced Search Filters</h3>
					<button class="search-close" onclick="viewFilter()">
						<i class="fas fa-times"></i>
					</button>
				</div>

				<div class="search-content">
					<div class="search-filters">
						<div class="filter-group">
							<label>Color</label>
							<select id="color" class="filter-select">
								<option value="0">Any Color</option>
								<?php
								$rs1 = Database::search("SELECT * FROM `color`");
								$num1 = $rs1->num_rows;
								for ($i = 0; $i < $num1; $i++) {
									$d1 = $rs1->fetch_assoc();
								?>
									<option value="<?php echo $d1["color_id"] ?>">
										<?php echo $d1["color_name"] ?>
									</option>
								<?php } ?>
							</select>
						</div>

						<div class="filter-group">
							<label>Category</label>
							<select id="cat" class="filter-select">
								<option value="0">All Categories</option>
								<?php
								$rs2 = Database::search("SELECT * FROM `category`");
								$num2 = $rs2->num_rows;
								for ($i = 0; $i < $num2; $i++) {
									$d2 = $rs2->fetch_assoc();
								?>
									<option value="<?php echo $d2["cat_id"] ?>">
										<?php echo $d2["cat_name"] ?>
									</option>
								<?php } ?>
							</select>
						</div>

						<div class="filter-group">
							<label>Brand</label>
							<select id="brand" class="filter-select">
								<option value="0">All Brands</option>
								<?php
								$rs3 = Database::search("SELECT * FROM `brand`");
								$num3 = $rs3->num_rows;
								for ($i = 0; $i < $num3; $i++) {
									$d3 = $rs3->fetch_assoc();
								?>
									<option value="<?php echo $d3["brand_id"] ?>">
										<?php echo $d3["brand_name"] ?>
									</option>
								<?php } ?>
							</select>
						</div>

						<div class="filter-group">
							<label>Size</label>
							<select id="size" class="filter-select">
								<option value="0">All Sizes</option>
								<?php
								$rs4 = Database::search("SELECT * FROM `size`");
								$num4 = $rs4->num_rows;
								for ($i = 0; $i < $num4; $i++) {
									$d4 = $rs4->fetch_assoc();
								?>
									<option value="<?php echo $d4["size_id"] ?>">
										<?php echo $d4["size_name"] ?>
									</option>
								<?php } ?>
							</select>
						</div>

						<div class="filter-group">
							<label>Price Range</label>
							<div class="price-inputs">
								<input type="text" id="min" placeholder="Min" class="price-input">
								<span class="price-separator">-</span>
								<input type="text" id="max" placeholder="Max" class="price-input">
							</div>
						</div>
					</div>

					<button class="search-btn" onclick="advSearchProduct(0);">
						<i class="fas fa-search"></i>
						Search Products
					</button>
				</div>
			</div>
		</div>

		<div class="shop-container">
			<div class="container">

				<!-- Page Header -->
				<div class="page-header">
					<h1 class="page-title">Premium Collection</h1>
					<hr class="page-divider">
					<p class="page-subtitle">Discover our curated selection of premium fashion pieces</p>
				</div>

				<!-- Search and Filter Section -->
				<div class="search-filter-section">
					<div class="search-header">
						<h3 class="search-title">
							<i class="fas fa-search"></i>
							Find Your Perfect Style
						</h3>
					</div>

					<!-- Search Bar -->
					<div class="search-bar">
						<div class="search-input-group">
							<i class="fas fa-search search-icon"></i>
							<input 
								type="search" 
								class="search-input" 
								id="product" 
								placeholder="Search for products, brands, categories..." 
								onkeyup="handleSearch()"
								autocomplete="off"
							>
						</div>
					</div>

					<!-- Quick Actions -->
					<div class="quick-actions">
						<button class="quick-action-btn primary" onclick="viewFilter()">
							<i class="fas fa-sliders-h"></i>
							Advanced Filters
						</button>
						<button class="quick-action-btn" onclick="loadProduct(0)">
							<i class="fas fa-grid-3x3"></i>
							Browse All
						</button>
						<button class="quick-action-btn" onclick="clearSearch()">
							<i class="fas fa-refresh"></i>
							Clear Search
						</button>
					</div>
				</div>

				<!-- Results Header -->
				<div class="results-header" id="resultsHeader" style="display: none;">
					<div class="results-info">
						<i class="fas fa-box-open"></i>
						<span id="resultsText">Showing all products</span>
						<span class="results-count" id="resultsCount">0 items</span>
					</div>
					<div class="sort-section">
						<label class="sort-label">Sort by:</label>
						<select class="sort-select" id="sortSelect" onchange="applySorting()">
							<option value="name_asc">Name: A-Z</option>
							<option value="name_desc">Name: Z-A</option>
							<option value="price_asc">Price: Low to High</option>
							<option value="price_desc">Price: High to Low</option>
							<option value="brand_asc">Brand: A-Z</option>
							<option value="newest">Newest First</option>
						</select>
					</div>
				</div>

				<!-- Loading State -->
				<div class="loading-state" id="loadingState" style="display: none;">
					<div class="loading-spinner"></div>
					<div class="loading-text">Searching products...</div>
				</div>

				<!-- Products Grid Container -->
				<div class="row" id="pid">
					<!-- This is where your AJAX results will load -->
					<!-- Initial load of all products -->
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

					if ($products_count > 0):
						while ($product = $products_rs->fetch_assoc()):
					?>
							<div class="col-lg-3 col-md-6 col-sm-12 mb-4">
								<div class="card" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 16px; overflow: hidden; transition: all 0.3s ease; backdrop-filter: blur(20px); box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);">
									<a href="singleProductView.php?s=<?php echo $product["stock_id"] ?>">
										<img src="<?php echo $product["path"] ?>" class="card-img-top" style="height: 250px; object-fit: cover; filter: grayscale(30%); transition: all 0.3s ease;">
									</a>
									<div class="card-body" style="background: rgba(255, 255, 255, 0.03); padding: 1.5rem; color: white;">
										<h5 class="card-title" style="color: white; font-weight: 600; margin-bottom: 0.75rem;"><?php echo $product["name"] ?></h5>
										<p class="card-text" style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem; margin-bottom: 1rem;"><?php echo $product["description"] ?></p>
										<p class="card-text" style="color: #ffd700; font-size: 1.2rem; font-weight: 700; margin-bottom: 1rem;">Rs. <?php echo number_format($product["price"], 2) ?></p>
										<div class="d-flex justify-content-center">
											<a href="singleProductView.php?s=<?php echo $product["stock_id"] ?>">
												<button class="btn btn-dark col-12 ms-2 text-white" style="background: transparent; color: white; border: 2px solid white; border-radius: 12px; font-weight: 600; padding: 0.875rem; transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.9rem;">
													<i class="fas fa-eye me-2"></i>
													View Details
												</button>
											</a>
										</div>
									</div>
								</div>
							</div>
					<?php 
						endwhile;
					else:
					?>
						<div class="col-12">
							<div class="no-results">
								<i class="fas fa-search"></i>
								<h3>Start Exploring</h3>
								<p>Use the search bar above to find your perfect fashion pieces, or browse our full collection.</p>
								<button class="quick-action-btn" onclick="loadProduct(0)">
									<i class="fas fa-eye"></i>
									View All Products
								</button>
							</div>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>

		<!-- Include Footer -->
		<?php include "homeFooter.php"; ?>

		

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		<script src="script.js"></script>
	</body>

	</html>

<?php
} else {
	header("location: signin.php");
}
?>