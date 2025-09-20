<?php

session_start();
include "connection.php";

if (isset($_SESSION["u"])) {
	$user = $_SESSION["u"];

	$search = isset($_GET['search']) ? $_GET['search'] : '';
	$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
	$category = isset($_GET['category']) ? $_GET['category'] : '';
	$color = isset($_GET['color']) ? $_GET['color'] : '';
	$size = isset($_GET['size']) ? $_GET['size'] : '';
	$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
	$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';
	$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name_asc';
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

?>
	<!doctype html>
	<html lang="en">

	<head>
		<link rel="stylesheet" href="styles/shop.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<title>Shop | Horo Fashion</title>

	</head>

	<body>
		<?php include "homeNav.php"; ?>

		<div class="shop-container">
			<div class="container">

				<div class="search-filter-section">



					<div class="search-filter-section">
						<div class="search-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem; width: full;">

						</div>

						<div class="search-bar" style="margin-bottom: 2rem;">
							<form method="GET" action="">
								<div class="search-input-group" style="position: relative; max-width: 600px; margin: 0 auto; width: 100%;">
									<i class="fas fa-search search-icon" style="position: absolute; left: 1.25rem; top: 50%; transform: translateY(-50%); color: rgba(255, 255, 255, 0.6); font-size: 1.1rem; z-index: 2;"></i>
									<input type="text" name="search" class="search-input" placeholder="Search for products..." value="<?php echo htmlspecialchars($search); ?>" style="width: 100%; padding: 1rem 1.5rem 1rem 3.5rem; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 16px; color: var(--pure-white); font-size: 1rem; transition: all 0.3s ease;">
									<input type="hidden" name="brand" value="<?php echo htmlspecialchars($brand); ?>">
									<input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
									<input type="hidden" name="color" value="<?php echo htmlspecialchars($color); ?>">
									<input type="hidden" name="size" value="<?php echo htmlspecialchars($size); ?>">
									<input type="hidden" name="min_price" value="<?php echo htmlspecialchars($min_price); ?>">
									<input type="hidden" name="max_price" value="<?php echo htmlspecialchars($max_price); ?>">
									<input type="hidden" name="sort" value="<?php echo htmlspecialchars($sort); ?>">
								</div>
							</form>
						</div>

						<?php if ($search || $brand || $category || $color || $size || $min_price || $max_price): ?>
							<div class="active-filters" style="display: flex; flex-wrap: wrap; gap: 0.75rem; margin: 1.5rem 0; justify-content: center; align-items: center;">
								<?php if ($search): ?>
									<div class="filter-tag" style="background: rgba(255, 255, 255, 0.1); color: var(--pure-white); padding: 0.5rem 1rem; border-radius: 12px; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
										Search: "<?php echo htmlspecialchars($search); ?>"
										<i class="fas fa-times remove-filter" onclick="removeFilter('search')" style="color: rgba(255, 255, 255, 0.7); cursor: pointer; transition: all 0.2s ease; margin-left: 0.25rem;"></i>
									</div>
								<?php endif; ?>
								<?php if ($brand): ?>
									<div class="filter-tag" style="background: rgba(255, 255, 255, 0.1); color: var(--pure-white); padding: 0.5rem 1rem; border-radius: 12px; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
										Brand: <?php echo htmlspecialchars($brand); ?>
										<i class="fas fa-times remove-filter" onclick="removeFilter('brand')" style="color: rgba(255, 255, 255, 0.7); cursor: pointer; transition: all 0.2s ease; margin-left: 0.25rem;"></i>
									</div>
								<?php endif; ?>
								<?php if ($category): ?>
									<div class="filter-tag" style="background: rgba(255, 255, 255, 0.1); color: var(--pure-white); padding: 0.5rem 1rem; border-radius: 12px; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
										Category: <?php echo htmlspecialchars($category); ?>
										<i class="fas fa-times remove-filter" onclick="removeFilter('category')" style="color: rgba(255, 255, 255, 0.7); cursor: pointer; transition: all 0.2s ease; margin-left: 0.25rem;"></i>
									</div>
								<?php endif; ?>
								<?php if ($color): ?>
									<div class="filter-tag" style="background: rgba(255, 255, 255, 0.1); color: var(--pure-white); padding: 0.5rem 1rem; border-radius: 12px; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
										Color: <?php echo htmlspecialchars($color); ?>
										<i class="fas fa-times remove-filter" onclick="removeFilter('color')" style="color: rgba(255, 255, 255, 0.7); cursor: pointer; transition: all 0.2s ease; margin-left: 0.25rem;"></i>
									</div>
								<?php endif; ?>
								<?php if ($size): ?>
									<div class="filter-tag" style="background: rgba(255, 255, 255, 0.1); color: var(--pure-white); padding: 0.5rem 1rem; border-radius: 12px; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
										Size: <?php echo htmlspecialchars($size); ?>
										<i class="fas fa-times remove-filter" onclick="removeFilter('size')" style="color: rgba(255, 255, 255, 0.7); cursor: pointer; transition: all 0.2s ease; margin-left: 0.25rem;"></i>
									</div>
								<?php endif; ?>
								<?php if ($min_price || $max_price): ?>
									<div class="filter-tag" style="background: rgba(255, 255, 255, 0.1); color: var(--pure-white); padding: 0.5rem 1rem; border-radius: 12px; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
										Price: Rs. <?php echo $min_price ? number_format($min_price) : '0'; ?> - Rs. <?php echo $max_price ? number_format($max_price) : '∞'; ?>
										<i class="fas fa-times remove-filter" onclick="removeFilter('price')" style="color: rgba(255, 255, 255, 0.7); cursor: pointer; transition: all 0.2s ease; margin-left: 0.25rem;"></i>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<div id="filters-section" class="filters-collapsed">
							<form method="GET" action="" id="filter-form">
								<div class="filters-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; align-items: end;">
									<div class="filter-group" style="display: flex; flex-direction: column;">
										<label class="filter-label" style="font-weight: 600; color: rgba(255, 255, 255, 0.9); margin-bottom: 0.5rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Brand</label>
										<select name="brand" class="filter-select" style="padding: 0.75rem 1rem; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 12px; color: var(--pure-white); font-size: 0.95rem; transition: all 0.3s ease;">
											<option value="">All Brands</option>
											<?php
											$brands_rs = Database::search("SELECT DISTINCT brand_name FROM brand ORDER BY brand_name");
											while ($brand_data = $brands_rs->fetch_assoc()):
											?>
												<option value="<?php echo $brand_data['brand_name']; ?>" <?php echo ($brand == $brand_data['brand_name']) ? 'selected' : ''; ?>>
													<?php echo $brand_data['brand_name']; ?>
												</option>
											<?php endwhile; ?>
										</select>
									</div>

									<div class="filter-group" style="display: flex; flex-direction: column;">
										<label class="filter-label" style="font-weight: 600; color: rgba(255, 255, 255, 0.9); margin-bottom: 0.5rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Category</label>
										<select name="category" class="filter-select" style="padding: 0.75rem 1rem; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 12px; color: var(--pure-white); font-size: 0.95rem; transition: all 0.3s ease;">
											<option value="">All Categories</option>
											<?php
											$categories_rs = Database::search("SELECT DISTINCT cat_name FROM category ORDER BY cat_name");
											while ($category_data = $categories_rs->fetch_assoc()):
											?>
												<option value="<?php echo $category_data['cat_name']; ?>" <?php echo ($category == $category_data['cat_name']) ? 'selected' : ''; ?>>
													<?php echo $category_data['cat_name']; ?>
												</option>
											<?php endwhile; ?>
										</select>
									</div>

									<div class="filter-group" style="display: flex; flex-direction: column;">
										<label class="filter-label" style="font-weight: 600; color: rgba(255, 255, 255, 0.9); margin-bottom: 0.5rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Color</label>
										<select name="color" class="filter-select" style="padding: 0.75rem 1rem; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 12px; color: var(--pure-white); font-size: 0.95rem; transition: all 0.3s ease;">
											<option value="">All Colors</option>
											<?php
											$colors_rs = Database::search("SELECT DISTINCT color_name FROM color ORDER BY color_name");
											while ($color_data = $colors_rs->fetch_assoc()):
											?>
												<option value="<?php echo $color_data['color_name']; ?>" <?php echo ($color == $color_data['color_name']) ? 'selected' : ''; ?>>
													<?php echo $color_data['color_name']; ?>
												</option>
											<?php endwhile; ?>
										</select>
									</div>

									<div class="filter-group" style="display: flex; flex-direction: column;">
										<label class="filter-label" style="font-weight: 600; color: rgba(255, 255, 255, 0.9); margin-bottom: 0.5rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Size</label>
										<select name="size" class="filter-select" style="padding: 0.75rem 1rem; background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 12px; color: var(--pure-white); font-size: 0.95rem; transition: all 0.3s ease;">
											<option value="">All Sizes</option>
											<?php
											$sizes_rs = Database::search("SELECT DISTINCT size_name FROM size ORDER BY size_name");
											while ($size_data = $sizes_rs->fetch_assoc()):
											?>
												<option value="<?php echo $size_data['size_name']; ?>" <?php echo ($size == $size_data['size_name']) ? 'selected' : ''; ?>>
													<?php echo $size_data['size_name']; ?>
												</option>
											<?php endwhile; ?>
										</select>
									</div>


								</div>

								<input type="hidden" name="search" value="<?php echo htmlspecialchars($search); ?>">
								<input type="hidden" name="sort" value="<?php echo htmlspecialchars($sort); ?>">

								<div class="filter-actions" style="display: flex; gap: 1rem; justify-content: center; align-items: center; flex-wrap: wrap;">
									<button type="submit" class="filter-btn btn-search" style="padding: 0.875rem 2rem; border: none; border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; gap: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.9rem; background: var(--pure-white); color: var(--primary-black);">
										<i class="fas fa-search"></i>
										Apply Filters
									</button>
									<button type="button" class="filter-btn btn-clear" onclick="clearFilters()" style="padding: 0.875rem 2rem; border: 2px solid var(--pure-white); border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; gap: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.9rem; background: transparent; color: var(--pure-white);">
										<i class="fas fa-refresh"></i>
										Clear All
									</button>
								</div>
							</form>
						</div>
					</div>

					<?php
					$query = "SELECT s.*, p.*, b.brand_name, c.cat_name, col.color_name, sz.size_name 
                         FROM `stock` s 
                         INNER JOIN `product` p ON s.product_id = p.id 
                         INNER JOIN `brand` b ON p.brand_brand_id = b.brand_id 
                         INNER JOIN `category` c ON p.category_cat_id = c.cat_id 
                         INNER JOIN `color` col ON p.color_color_id = col.color_id 
                         INNER JOIN `size` sz ON p.size_size_id = sz.size_id 
                         WHERE s.status = 1";

					if (!empty($search)) {
						$query .= " AND (p.name LIKE '%" . $search . "%' OR p.description LIKE '%" . $search . "%')";
					}

					if (!empty($brand)) {
						$query .= " AND b.brand_name = '" . $brand . "'";
					}

					if (!empty($category)) {
						$query .= " AND c.cat_name = '" . $category . "'";
					}

					if (!empty($color)) {
						$query .= " AND col.color_name = '" . $color . "'";
					}

					if (!empty($size)) {
						$query .= " AND sz.size_name = '" . $size . "'";
					}

					if (!empty($min_price)) {
						$query .= " AND s.price >= " . (float)$min_price;
					}
					if (!empty($max_price)) {
						$query .= " AND s.price <= " . (float)$max_price;
					}

					switch ($sort) {
						case 'price_asc':
							$query .= " ORDER BY s.price ASC";
							break;
						case 'price_desc':
							$query .= " ORDER BY s.price DESC";
							break;
						case 'name_desc':
							$query .= " ORDER BY p.name DESC";
							break;
						case 'newest':
							$query .= " ORDER BY p.id DESC";
							break;
						case 'oldest':
							$query .= " ORDER BY p.id ASC";
							break;
						default:
							$query .= " ORDER BY p.name ASC";
							break;
					}

					$count_query = str_replace("SELECT s.*, p.*, b.brand_name, c.cat_name, col.color_name, sz.size_name", "SELECT COUNT(*)", $query);
					$count_query = preg_replace('/ORDER BY.*/', '', $count_query);
					$count_rs = Database::search($count_query);
					$total_products = $count_rs->fetch_assoc()['COUNT(*)'];

					$results_per_page = 12;
					$total_pages = ceil($total_products / $results_per_page);
					$offset = ($page - 1) * $results_per_page;

					$final_query = $query . " LIMIT $results_per_page OFFSET $offset";

					$products_rs = Database::search($final_query);
					$products_count = $products_rs->num_rows;
					?>

					<div class="results-header">
						<div class="results-info">
							Showing <span class="results-count"><?php echo ($offset + 1); ?>-<?php echo min($offset + $products_count, $total_products); ?></span>
							of <span class="results-count"><?php echo $total_products; ?></span> results
							<?php if (!empty($search)): ?>
								for "<strong><?php echo htmlspecialchars($search); ?></strong>"
							<?php endif; ?>
						</div>
						<div class="sort-section">
							<label class="sort-label">Sort by:</label>
							<select class="sort-select" onchange="changeSort(this.value)">
								<option value="name_asc" <?php echo ($sort == 'name_asc') ? 'selected' : ''; ?>>Name (A-Z)</option>
								<option value="name_desc" <?php echo ($sort == 'name_desc') ? 'selected' : ''; ?>>Name (Z-A)</option>
								<option value="price_asc" <?php echo ($sort == 'price_asc') ? 'selected' : ''; ?>>Price (Low to High)</option>
								<option value="price_desc" <?php echo ($sort == 'price_desc') ? 'selected' : ''; ?>>Price (High to Low)</option>
								<option value="newest" <?php echo ($sort == 'newest') ? 'selected' : ''; ?>>Newest First</option>
								<option value="oldest" <?php echo ($sort == 'oldest') ? 'selected' : ''; ?>>Oldest First</option>
							</select>
						</div>
					</div>

					<?php if ($products_count > 0): ?>
						<div class="products-grid">
							<?php while ($product = $products_rs->fetch_assoc()): ?>
								<div class="product-card">
									<img src="<?php echo $product['path']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">

									<div class="product-info">
										<h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
										<p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>

										<div class="product-details">
											<div class="product-detail">
												<i class="fas fa-tag detail-icon"></i>
												<span><?php echo htmlspecialchars($product['brand_name']); ?></span>
											</div>
											<div class="product-detail">
												<i class="fas fa-th-large detail-icon"></i>
												<span><?php echo htmlspecialchars($product['cat_name']); ?></span>
											</div>
											<div class="product-detail">
												<i class="fas fa-palette detail-icon"></i>
												<span><?php echo htmlspecialchars($product['color_name']); ?></span>
											</div>
											<div class="product-detail">
												<i class="fas fa-ruler detail-icon"></i>
												<span><?php echo htmlspecialchars($product['size_name']); ?></span>
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

						<?php if ($total_pages > 1): ?>
							<div class="pagination-container">
								<nav>
									<ul class="pagination">
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

			<?php include "homeFooter.php"; ?>

			<?php
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

			<script src="scripts/shop.js"></script>
	</body>

	</html>

<?php
} else {
	header("location: signin.php");
}
?>