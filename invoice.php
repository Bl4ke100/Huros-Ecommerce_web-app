<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];

$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid`='" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <title>Horo | Invoice</title>
        
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            :root {
                --primary: #000000;
                --secondary: #ffffff;
                --gray-50: #fafafa;
                --gray-100: #f5f5f5;
                --gray-200: #e5e5e5;
                --gray-300: #d4d4d4;
                --gray-400: #a3a3a3;
                --gray-500: #737373;
                --gray-600: #525252;
                --gray-700: #404040;
                --gray-800: #262626;
                --gray-900: #171717;
                --border-radius: 8px;
                --transition: all 0.2s ease;
                --shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.15);
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
                background: var(--gray-50);
                color: var(--primary);
                line-height: 1.6;
                font-weight: 400;
                min-height: 100vh;
            }

            .invoice-container {
                max-width: 900px;
                margin: 0 auto;
                padding: 24px;
            }

            .invoice-actions {
                display: flex;
                justify-content: flex-end;
                gap: 12px;
                margin-bottom: 24px;
            }

            .btn-modern {
                padding: 12px 24px;
                border: none;
                border-radius: var(--border-radius);
                font-family: inherit;
                font-size: 14px;
                font-weight: 500;
                cursor: pointer;
                transition: var(--transition);
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .btn-outline {
                background: var(--secondary);
                color: var(--primary);
                border: 1px solid var(--gray-300);
            }

            .btn-outline:hover {
                background: var(--gray-100);
                border-color: var(--gray-400);
                transform: translateY(-1px);
            }

            .btn-primary {
                background: var(--primary);
                color: var(--secondary);
            }

            .btn-primary:hover {
                background: var(--gray-800);
                transform: translateY(-1px);
            }

            .invoice-card {
                background: var(--secondary);
                border-radius: 12px;
                box-shadow: var(--shadow-lg);
                overflow: hidden;
                border: 1px solid var(--gray-200);
            }

            .invoice-header {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 32px;
                padding: 48px;
                border-bottom: 1px solid var(--gray-200);
            }

            .order-info h3 {
                font-size: 24px;
                font-weight: 600;
                margin-bottom: 8px;
                letter-spacing: -0.01em;
            }

            .order-id {
                color: #dc2626;
                font-weight: 700;
            }

            .order-date {
                font-size: 16px;
                color: var(--gray-600);
                font-weight: 400;
            }

            .company-info {
                text-align: right;
            }

            .company-logo {
                display: flex;
                align-items: center;
                justify-content: flex-end;
                gap: 12px;
                margin-bottom: 16px;
            }

            .company-logo img {
                width: 40px;
                height: 40px;
            }

            .company-name {
                font-size: 28px;
                font-weight: 700;
                letter-spacing: -0.02em;
                margin: 0;
            }

            .invoice-title {
                font-size: 36px;
                font-weight: 700;
                margin: 16px 0;
                letter-spacing: -0.02em;
            }

            .company-address {
                font-size: 14px;
                color: var(--gray-600);
                line-height: 1.5;
            }

            .customer-info {
                padding: 32px 48px;
                background: var(--gray-50);
                border-bottom: 1px solid var(--gray-200);
            }

            .customer-info h4 {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 12px;
            }

            .customer-details {
                font-size: 14px;
                color: var(--gray-600);
                line-height: 1.6;
            }

            .invoice-table {
                padding: 0 48px 32px;
            }

            .table-container {
                margin-top: 32px;
                border: 1px solid var(--gray-200);
                border-radius: var(--border-radius);
                overflow: hidden;
            }

            .modern-table {
                width: 100%;
                border-collapse: collapse;
                background: var(--secondary);
            }

            .modern-table thead {
                background: var(--gray-100);
            }

            .modern-table th {
                padding: 16px 12px;
                text-align: left;
                font-weight: 600;
                font-size: 14px;
                color: var(--gray-700);
                border-bottom: 1px solid var(--gray-200);
            }

            .modern-table td {
                padding: 16px 12px;
                font-size: 14px;
                color: var(--gray-800);
                border-bottom: 1px solid var(--gray-100);
            }

            .modern-table tbody tr:hover {
                background: var(--gray-50);
            }

            .modern-table tbody tr:last-child td {
                border-bottom: none;
            }

            .price-cell {
                font-weight: 600;
                color: var(--primary);
            }

            .invoice-summary {
                padding: 32px 48px;
                background: var(--gray-50);
                border-top: 1px solid var(--gray-200);
            }

            .summary-content {
                text-align: right;
                max-width: 300px;
                margin-left: auto;
            }

            .summary-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 12px;
                font-size: 14px;
            }

            .summary-row.total {
                font-size: 18px;
                font-weight: 600;
                padding-top: 12px;
                border-top: 1px solid var(--gray-300);
                margin-top: 16px;
            }

            .summary-label {
                color: var(--gray-600);
            }

            .summary-value {
                color: var(--primary);
                font-weight: 500;
            }

            .summary-value.total {
                font-weight: 700;
                font-size: 20px;
            }

            /* Print Styles */
            @media print {
                body {
                    background: white;
                    font-size: 12px;
                }
                
                .invoice-actions {
                    display: none;
                }
                
                .invoice-card {
                    box-shadow: none;
                    border: 1px solid #000;
                }
                
                .invoice-header,
                .customer-info,
                .invoice-table,
                .invoice-summary {
                    padding: 24px;
                }
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .invoice-container {
                    padding: 16px;
                }
                
                .invoice-header {
                    grid-template-columns: 1fr;
                    gap: 24px;
                    padding: 32px 24px;
                    text-align: center;
                }
                
                .company-info {
                    text-align: center;
                }
                
                .company-logo {
                    justify-content: center;
                }
                
                .customer-info,
                .invoice-table,
                .invoice-summary {
                    padding: 24px;
                }
                
                .modern-table {
                    font-size: 12px;
                }
                
                .modern-table th,
                .modern-table td {
                    padding: 12px 8px;
                }
                
                .invoice-actions {
                    flex-direction: column;
                }
                
                .btn-modern {
                    justify-content: center;
                }
            }

            @media (max-width: 480px) {
                .modern-table th,
                .modern-table td {
                    padding: 8px 4px;
                    font-size: 11px;
                }
                
                .invoice-title {
                    font-size: 28px;
                }
                
                .company-name {
                    font-size: 24px;
                }
            }
        </style>
    </head>

    <body>
        <div class="invoice-container">
            <!-- Action Buttons -->
            <div class="invoice-actions">
                <a href="index.php" class="btn-modern btn-outline">
                    ← Back to Home
                </a>
                <button class="btn-modern btn-primary" onclick="window.print();">
                    🖨️ Print Invoice
                </button>
            </div>

            <!-- Invoice Card -->
            <div class="invoice-card">
                <!-- Invoice Header -->
                <div class="invoice-header">
                    <div class="order-info">
                        <h3>Order ID #<span class="order-id"><?php echo $d["order_id"] ?></span></h3>
                        <div class="order-date"><?php echo $d["order_date"] ?></div>
                    </div>
                    
                    <div class="company-info">
                        <div class="company-logo">
                            <img src="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" alt="Horo Logo">
                            <h4 class="company-name">Horo</h4>
                        </div>
                        <h1 class="invoice-title">INVOICE</h1>
                        <div class="company-address">
                            Kandy Road,<br>
                            Kadawatha,<br>
                            Sri Lanka
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="customer-info">
                    <h4>Bill To:</h4>
                    <div class="customer-details">
                        <strong><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></strong><br>
                        <?php echo $user["mobile"] ?><br>
                        <?php echo $user["no"] ?><br>
                        <?php echo $user["line_1"] ?><br>
                        <?php echo $user["line_2"] ?>
                    </div>
                </div>

                <!-- Order Items Table -->
                <div class="invoice-table">
                    <div class="table-container">
                        <table class="modern-table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rs2 = Database::search("SELECT * FROM order_item INNER JOIN stock ON 
                                order_item.stock_stock_id = stock.stock_id INNER JOIN
                                product ON stock.product_id=product.id INNER JOIN 
                                brand ON product.brand_brand_id = brand.brand_id INNER JOIN
                                color ON product.color_color_id=color.color_id INNER JOIN
                                category ON product.category_cat_id=category.cat_id INNER JOIN
                                size ON product.size_size_id=size.size_id WHERE order_item.order_history_ohid = '" . $orderHistoryId . "'");

                                $num2 = $rs2->num_rows;

                                for ($i = 0; $i < $num2; $i++) {
                                    $d2 = $rs2->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?php echo $d2["name"]; ?></td>
                                        <td><?php echo $d2["brand_name"]; ?></td>
                                        <td><?php echo $d2["cat_name"]; ?></td>
                                        <td><?php echo $d2["color_name"]; ?></td>
                                        <td><?php echo $d2["size_name"]; ?></td>
                                        <td><?php echo $d2["oi_qty"]; ?></td>
                                        <td class="price-cell">Rs. <?php echo ($d2["price"] * $d2["oi_qty"]); ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Invoice Summary -->
                <div class="invoice-summary">
                    <div class="summary-content">
                        <div class="summary-row">
                            <span class="summary-label">Number of Items:</span>
                            <span class="summary-value"><?php echo $num2; ?></span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">Delivery Fee:</span>
                            <span class="summary-value">Rs. 250</span>
                        </div>
                        <div class="summary-row total">
                            <span class="summary-label">Net Total:</span>
                            <span class="summary-value total">Rs. <?php echo $d["amount"]; ?>.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    header("location: index.php");
}
?>