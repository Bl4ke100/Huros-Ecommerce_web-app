<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];
// echo($product);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;
// echo($num);

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
// echo ($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results ";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

?>

<style>
    :root {
        --primary-black: #000000;
        --secondary-black: #1a1a1a;
        --pure-white: #ffffff;
        --gray-100: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-400: #6c757d;
        --gray-600: #495057;
        --gray-800: #343a40;
        
        --border-radius-sm: 8px;
        --border-radius-md: 12px;
        --border-radius-lg: 16px;
        --border-radius-xl: 24px;
        
        --transition-fast: 0.2s ease;
        --transition-normal: 0.3s ease;
        --transition-slow: 0.5s ease;
        
        --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.15);
        --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.2);
        --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    /* Modern Product Cards */
    .col .card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--border-radius-lg);
        overflow: hidden;
        transition: var(--transition-normal);
        backdrop-filter: blur(20px);
        box-shadow: var(--shadow-md);
        height: 100%;
        display: flex;
        flex-direction: column;
        margin-bottom: 2rem;
    }

    .col .card:hover {
        transform: translateY(-10px);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: var(--shadow-xl);
    }

    .col .card-img-top {
        height: 250px;
        object-fit: cover;
        filter: grayscale(30%);
        transition: var(--transition-normal);
        border-radius: 0;
    }

    .col .card:hover .card-img-top {
        filter: grayscale(0%);
        transform: scale(1.05);
    }

    .col .card-body {
        background: rgba(255, 255, 255, 0.03) !important;
        padding: 1.5rem;
        color: var(--pure-white);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .col .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--pure-white);
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .col .card-text {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 0.75rem;
        flex-grow: 1;
    }

    .col .card-text:last-of-type {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--pure-white);
        margin-bottom: 1rem;
    }

    .col .card .btn {
        background: transparent !important;
        color: var(--pure-white) !important;
        border: 2px solid var(--pure-white) !important;
        border-radius: var(--border-radius-md);
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        transition: var(--transition-normal);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }

    .col .card .btn:hover {
        background: var(--pure-white) !important;
        color: var(--primary-black) !important;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* No Results State */
    .no-results {
        text-align: center;
        padding: 4rem 2rem;
        color: rgba(255, 255, 255, 0.7);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--border-radius-xl);
        backdrop-filter: blur(20px);
        margin: 2rem 0;
        animation: fadeInUp 0.6s ease-out;
    }

    .no-results i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: rgba(255, 255, 255, 0.4);
    }

    .no-results h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--pure-white);
        margin-bottom: 0.5rem;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .no-results p {
        font-size: 1rem;
        margin: 0;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* Modern Pagination */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 3rem;
        padding: 2rem 0;
    }

    .pagination {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--border-radius-lg);
        padding: 0.5rem;
        backdrop-filter: blur(20px);
        box-shadow: var(--shadow-md);
        margin: 0;
    }

    .pagination .page-item {
        margin: 0 0.25rem;
    }

    .pagination .page-item .page-link {
        background: transparent;
        color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--border-radius-sm);
        padding: 0.75rem 1rem;
        font-weight: 500;
        transition: var(--transition-normal);
        cursor: pointer;
        margin: 0;
        min-width: 45px;
        text-align: center;
    }

    .pagination .page-item .page-link:hover {
        background: rgba(255, 255, 255, 0.1);
        color: var(--pure-white);
        border-color: rgba(255, 255, 255, 0.4);
        transform: translateY(-2px);
    }

    .pagination .page-item.active .page-link {
        background: var(--pure-white) !important;
        color: var(--primary-black) !important;
        border-color: var(--pure-white);
        font-weight: 600;
        box-shadow: var(--shadow-md);
    }

    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
        padding: 0.75rem 1.25rem;
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

    /* Animation for cards */
    .col {
        animation: fadeInUp 0.6s ease-out;
        animation-fill-mode: both;
    }

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

    /* Stagger animation for multiple cards */
    .col:nth-child(1) { animation-delay: 0.1s; }
    .col:nth-child(2) { animation-delay: 0.2s; }
    .col:nth-child(3) { animation-delay: 0.3s; }
    .col:nth-child(4) { animation-delay: 0.4s; }
    .col:nth-child(5) { animation-delay: 0.5s; }
    .col:nth-child(6) { animation-delay: 0.6s; }
    .col:nth-child(7) { animation-delay: 0.7s; }
    .col:nth-child(8) { animation-delay: 0.8s; }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .col .card-body {
            padding: 1.25rem;
        }
        
        .col .card-title {
            font-size: 1rem;
        }
        
        .col .card-text {
            font-size: 0.85rem;
        }
        
        .pagination .page-item .page-link {
            padding: 0.6rem 0.8rem;
            font-size: 0.9rem;
            min-width: 40px;
        }
        
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            padding: 0.6rem 1rem;
        }
        
        .no-results {
            padding: 3rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .pagination-container {
            margin-top: 2rem;
            padding: 1rem 0;
        }
        
        .pagination {
            flex-wrap: wrap;
            gap: 0.5rem;
            padding: 1rem;
        }
        
        .pagination .page-item {
            margin: 0;
        }
        
        .no-results {
            padding: 2rem 1rem;
        }
        
        .no-results i {
            font-size: 2rem;
        }
        
        .no-results h3 {
            font-size: 1.25rem;
        }
    }
</style>

<?php

if ($num2 == 0) {
    //Not Available Stock
?>
    <div class="no-results">
        <i class="fas fa-search"></i>
        <h3>No Results Found</h3>
        <p>We're sorry, we cannot find any matches for your search term. Try different keywords or browse our categories.</p>
    </div>
    <?php
} else {
    // Load Result

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>
        <!-- card -->
        <div class="col">
            <div class="card">
                <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>">
                    <img src="<?php echo $d["path"] ?>" class="card-img-top" alt="<?php echo $d["name"] ?>">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"] ?></h5>
                    <p class="card-text"><?php echo $d["description"] ?></p>
                    <p class="card-text">Rs. <?php echo number_format($d["price"], 2) ?></p>
                    <div class="d-flex justify-content-center">
                        <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>">
                            <button class="btn btn-dark col-12 ms-2 text-white">
                                <i class="fas fa-eye me-2"></i>
                                View Details
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
    <?php
    }
    ?>

    <!-- pagination -->
    <div class="pagination-container">
        <nav aria-label="Search results pagination">
            <ul class="pagination">
                <li class="page-item <?php echo ($pageno <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" <?php
                        if ($pageno <= 1) {
                            echo 'href="#"';
                        } else {
                        ?> onclick="searchProduct(<?php echo ($pageno - 1) ?>);" <?php
                        }
                    ?>>
                        <i class="fas fa-chevron-left me-1"></i>
                        Prev
                    </a>
                </li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                <?php
                    }
                }
                ?>

                <li class="page-item <?php echo ($pageno >= $num_of_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link" <?php
                        if ($pageno >= $num_of_pages) {
                            echo 'href="#"';
                        } else {
                        ?> onclick="searchProduct(<?php echo ($pageno + 1) ?>);" <?php
                        }
                    ?>>
                        Next
                        <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- pagination -->

<?php
}

?>