<?php
session_start();
$user = $_SESSION["u"];

include "connection.php";

if (isset($user)) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <title>Horos | Order History</title>
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">

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

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
                background: var(--primary-black) !important;
                color: var(--pure-white);
                line-height: 1.6;
                margin: 0;
                padding: 0;
                min-height: 100vh;
            }

            .order-history-container {
                min-height: 100vh;
                padding: 2rem 0;
                background: var(--gradient-primary);
                position: relative;
                overflow: hidden;
            }

            .order-history-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.03) 0%, transparent 50%),
                           radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.02) 0%, transparent 50%);
                pointer-events: none;
            }

            .container-fluid {
                position: relative;
                z-index: 2;
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 2rem;
            }

            /* Page Header */
            .page-header {
                text-align: center;
                margin: 4rem 0;
                animation: fadeInDown 0.8s ease-out;
            }

            .page-title {
                font-size: clamp(2.5rem, 6vw, 4rem);
                font-weight: 900;
                color: var(--pure-white);
                margin-bottom: 1rem;
                background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.7) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .page-subtitle {
                font-size: 1.2rem;
                color: rgba(255, 255, 255, 0.7);
                font-weight: 400;
            }

            .page-divider {
                width: 80px;
                height: 4px;
                background: var(--pure-white);
                border: none;
                margin: 2rem auto;
                border-radius: 2px;
            }

            /* Order Cards */
            .order-card {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                backdrop-filter: blur(20px);
                padding: 2rem;
                margin-bottom: 2rem;
                box-shadow: var(--shadow-lg);
                transition: var(--transition-normal);
                animation: slideInUp 0.6s ease-out;
                animation-fill-mode: both;
            }

            .order-card:hover {
                transform: translateY(-5px);
                border-color: rgba(255, 255, 255, 0.2);
                box-shadow: var(--shadow-xl);
            }

            .order-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .order-info {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .order-id {
                font-size: 1.25rem;
                font-weight: 700;
                color: var(--pure-white);
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .order-badge {
                background: var(--pure-white);
                color: var(--primary-black);
                padding: 0.25rem 0.75rem;
                border-radius: var(--border-radius-sm);
                font-size: 0.9rem;
                font-weight: 600;
            }

            .order-date {
                color: rgba(255, 255, 255, 0.7);
                font-size: 0.95rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .order-status {
                background: rgba(34, 197, 94, 0.2);
                color: #22c55e;
                padding: 0.5rem 1rem;
                border-radius: var(--border-radius-md);
                font-size: 0.85rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border: 1px solid rgba(34, 197, 94, 0.3);
            }

            /* Modern Table */
            .order-table-container {
                background: rgba(255, 255, 255, 0.03);
                border-radius: var(--border-radius-lg);
                overflow: hidden;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .table {
                margin: 0;
                background: transparent;
            }

            .table thead th {
                background: rgba(255, 255, 255, 0.05);
                color: var(--pure-white);
                font-weight: 600;
                font-size: 0.9rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border: none;
                padding: 1rem 1.5rem;
            }

            .table tbody td,
            .table tbody th {
                background: transparent;
                color: rgba(255, 255, 255, 0.9);
                border: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                padding: 1rem 1.5rem;
                font-size: 0.95rem;
            }

            .table tbody tr:hover {
                background: rgba(255, 255, 255, 0.02);
            }

            .table tbody tr:last-child td {
                border-bottom: none;
            }

            .product-name {
                font-weight: 600;
                color: var(--pure-white);
            }

            .quantity-badge {
                background: rgba(255, 255, 255, 0.1);
                color: var(--pure-white);
                padding: 0.25rem 0.75rem;
                border-radius: var(--border-radius-sm);
                font-size: 0.85rem;
                font-weight: 600;
                display: inline-block;
            }

            .price-value {
                font-weight: 600;
                color: var(--pure-white);
            }

            /* Order Total */
            .order-total {
                display: flex;
                justify-content: flex-end;
                padding: 1.5rem;
                background: rgba(255, 255, 255, 0.03);
                border-radius: var(--border-radius-md);
                border: 1px solid rgba(255, 255, 255, 0.1);
                margin-top: 1.5rem;
            }

            .total-label {
                font-size: 1.2rem;
                font-weight: 700;
                color: var(--pure-white);
                margin-right: 1rem;
            }

            .total-amount {
                font-size: 1.5rem;
                font-weight: 800;
                color: #ffd700;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            /* Empty State */
            .empty-state {
                text-align: center;
                padding: 4rem 2rem;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                backdrop-filter: blur(20px);
                margin: 2rem 0;
                animation: fadeIn 0.8s ease-out;
            }

            .empty-icon {
                font-size: 4rem;
                color: rgba(255, 255, 255, 0.3);
                margin-bottom: 2rem;
            }

            .empty-title {
                font-size: 2rem;
                font-weight: 700;
                color: var(--pure-white);
                margin-bottom: 1rem;
            }

            .empty-subtitle {
                font-size: 1.1rem;
                color: rgba(255, 255, 255, 0.7);
                margin-bottom: 2rem;
            }

            .start-shopping-btn {
                background: var(--pure-white);
                color: var(--primary-black);
                border: 2px solid var(--pure-white);
                padding: 1rem 2rem;
                border-radius: var(--border-radius-md);
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                text-decoration: none;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .start-shopping-btn:hover {
                background: transparent;
                color: var(--pure-white);
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }

            /* Section Header for Orders List */
            .section-header {
                margin: 3rem 0 2rem 0;
                padding: 0 1rem;
            }

            .section-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--pure-white);
                display: flex;
                align-items: center;
                gap: 0.75rem;
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

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            /* Stagger animation for order cards */
            .order-card:nth-child(1) { animation-delay: 0.1s; }
            .order-card:nth-child(2) { animation-delay: 0.2s; }
            .order-card:nth-child(3) { animation-delay: 0.3s; }
            .order-card:nth-child(4) { animation-delay: 0.4s; }
            .order-card:nth-child(5) { animation-delay: 0.5s; }

            /* Responsive Design */
            @media (max-width: 1024px) {
                .container-fluid {
                    padding: 0 1.5rem;
                }

                .order-card {
                    padding: 1.5rem;
                }
            }

            @media (max-width: 768px) {
                .container-fluid {
                    padding: 0 1rem;
                }

                .order-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }

                .order-total {
                    justify-content: center;
                    text-align: center;
                }

                .table thead th,
                .table tbody td,
                .table tbody th {
                    padding: 0.75rem;
                    font-size: 0.85rem;
                }

                .order-card {
                    padding: 1.25rem;
                }

                .page-header {
                    margin: 2rem 0;
                }
            }

            @media (max-width: 480px) {
                .order-table-container {
                    overflow-x: auto;
                }

                .table {
                    min-width: 500px;
                }

                .empty-state {
                    padding: 3rem 1rem;
                }

                .empty-icon {
                    font-size: 3rem;
                }

                .empty-title {
                    font-size: 1.5rem;
                }
            }

            /* Floating elements background */
            .order-history-container::after {
                content: '';
                position: absolute;
                top: 30%;
                right: -15%;
                width: 400px;
                height: 400px;
                background: rgba(255, 255, 255, 0.01);
                border-radius: 50%;
                animation: float 25s infinite linear;
            }

            @keyframes float {
                0%, 100% {
                    transform: translateY(0px) rotate(0deg);
                }
                50% {
                    transform: translateY(-30px) rotate(180deg);
                }
            }
        </style>
    </head>

    <body>

        <?php include "homeNav.php"; ?>

        <div class="order-history-container">
            <div class="container-fluid mt-5">

                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="page-title">Order History</h1>
                    <hr class="page-divider">
                    <p class="page-subtitle">Track your purchases and order details</p>
                </div>

                <div class="row">
                    <?php

                    $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
                    $num = $rs->num_rows;

                    if ($num > 0) {
                        // Not Empty
                    ?>
                        <div class="section-header">
                            <h3 class="section-title">
                                <i class="fas fa-receipt"></i>
                                Your Orders (<?php echo $num; ?>)
                            </h3>
                        </div>

                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <!-- order history card -->
                            <div class="col-12">
                                <div class="order-card">

                                    <div class="order-header">
                                        <div class="order-info">
                                            <div class="order-id">
                                                <i class="fas fa-hashtag"></i>
                                                Order ID:
                                                <span class="order-badge">#<?php echo $d["order_id"]; ?></span>
                                            </div>
                                            <div class="order-date">
                                                <i class="fas fa-calendar-alt"></i>
                                                <?php echo date('F j, Y - g:i A', strtotime($d["order_date"])); ?>
                                            </div>
                                        </div>
                                        <div class="order-status">
                                            <i class="fas fa-check-circle"></i>
                                            Completed
                                        </div>
                                    </div>

                                    <div class="order-table-container">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <i class="fas fa-tag me-2"></i>
                                                        Product Name
                                                    </th>
                                                    <th scope="col">
                                                        <i class="fas fa-sort-numeric-up me-2"></i>
                                                        Quantity
                                                    </th>
                                                    <th scope="col">
                                                        <i class="fas fa-dollar-sign me-2"></i>
                                                        Price
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rs2 =  Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id`=`stock`.`stock_id` INNER JOIN `product` ON
                                            `stock`.`product_id` = `product`.`id` WHERE `order_item`.`order_history_ohid` = '" . $d["ohid"] . "'");

                                                $num2 = $rs2->num_rows;

                                                for ($j = 0; $j < $num2; $j++) {
                                                    $d2 = $rs2->fetch_assoc();
                                                ?>
                                                    <tr>
                                                        <th scope="row" class="product-name"><?php echo $d2["name"]; ?></th>
                                                        <td>
                                                            <span class="quantity-badge"><?php echo $d2["oi_qty"]; ?></span>
                                                        </td>
                                                        <td class="price-value">Rs. <?php echo number_format(($d2["price"] * $d2["oi_qty"]), 2); ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="order-total">
                                        <span class="total-label">Net Total:</span>
                                        <span class="total-amount">
                                            <i class="fas fa-coins"></i>
                                            Rs. <?php echo number_format($d["amount"], 2); ?>
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <!-- order history card -->

                        <?php
                        }
                        ?>

                    <?php
                    } else {
                        // Empty
                    ?>
                        <div class="col-12">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <h2 class="empty-title">No Orders Yet</h2>
                                <p class="empty-subtitle">You haven't placed any orders. Start exploring our amazing collection!</p>
                                <a href="index.php" class="start-shopping-btn">
                                    <i class="fas fa-shopping-cart"></i>
                                    Start Shopping
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

        <?php include "homeFooter.php"; ?>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php

} else {
    header("location:signin.php");
}
?>