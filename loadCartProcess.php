<?php
include "connection.php";

session_start();

$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_stock_id`=`stock`.`stock_id` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
INNER JOIN `color` ON `product`.`color_color_id` = `color`.`color_id`
INNER JOIN `size` ON `product`.`size_size_id` = `size`.`size_id` WHERE `cart`.`user_id` ='" . $user["id"] . "'");

$num = $rs->num_rows;
if ($num > 0) {

?>

    <div class="cart-grid-container">
        <style>
            .cart-grid-container {
                display: grid;
                grid-template-columns: 1fr 400px;
                gap: 3rem;
                align-items: start;
                width: 100%;
            }

            .modern-cart-items {
                display: flex;
                flex-direction: column;
                gap: 2rem;
            }

            .cart-item-card {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-lg);
                padding: 2rem;
                backdrop-filter: blur(20px);
                transition: var(--transition-normal);
                position: relative;
                overflow: hidden;
                width: 100%;
            }

            .cart-item-card:hover {
                background: rgba(255, 255, 255, 0.08);
                border-color: rgba(255, 255, 255, 0.2);
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }

            .cart-item-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05), transparent);
                transition: left 0.8s;
            }

            .cart-item-card:hover::before {
                left: 100%;
            }

            .item-main-content {
                display: grid;
                grid-template-columns: 150px 1fr auto;
                gap: 1.5rem;
                align-items: start;
            }

            .item-image-container {
                position: relative;
            }

            .item-image-wrapper {
                position: relative;
                border-radius: var(--border-radius-md);
                overflow: hidden;
                background: rgba(255, 255, 255, 0.05);
                aspect-ratio: 1;
            }

            .item-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: var(--transition-normal);
                filter: grayscale(20%);
            }

            .item-image-wrapper:hover .item-image {
                transform: scale(1.05);
                filter: grayscale(0%);
            }

            .image-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: var(--transition-normal);
            }

            .item-image-wrapper:hover .image-overlay {
                opacity: 1;
            }

            .quick-view-btn {
                background: var(--pure-white);
                color: var(--primary-black);
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .quick-view-btn:hover {
                transform: scale(1.1);
                background: var(--gray-100);
            }

            .item-details {
                flex: 1;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .item-header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                margin-bottom: 1rem;
            }

            .item-name {
                font-size: 1.1rem;
                font-weight: 700;
                color: var(--pure-white);
                margin: 0;
                line-height: 1.3;
            }

            .item-remove-btn {
                background: transparent;
                border: 1px solid rgba(220, 53, 69, 0.3);
                color: var(--danger-red);
                width: 32px;
                height: 32px;
                border-radius: 50%;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .item-remove-btn:hover {
                background: var(--danger-red);
                color: var(--pure-white);
                transform: scale(1.1);
            }

            .item-attributes {
                display: flex;
                gap: 1.5rem;
                margin-bottom: 1rem;
            }

            .attribute-group {
                display: flex;
                gap: 0.5rem;
                align-items: center;
            }

            .attribute-label {
                font-size: 0.85rem;
                color: rgba(255, 255, 255, 0.7);
                font-weight: 500;
            }

            .attribute-value {
                font-size: 0.85rem;
                color: var(--pure-white);
                font-weight: 600;
                padding: 0.25rem 0.75rem;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 12px;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .item-pricing {
                margin-bottom: 1rem;
            }

            .unit-price {
                display: flex;
                gap: 1rem;
                align-items: center;
            }

            .price-label {
                font-size: 0.85rem;
                color: rgba(255, 255, 255, 0.7);
            }

            .price-value {
                font-size: 1rem;
                color: var(--pure-white);
                font-weight: 700;
            }

            .quantity-section {
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .quantity-label {
                font-size: 0.85rem;
                color: rgba(255, 255, 255, 0.8);
                font-weight: 500;
                min-width: 70px;
            }

            .quantity-controls {
                display: flex;
                align-items: center;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: var(--border-radius-md);
                overflow: hidden;
            }

            .qty-btn {
                background: transparent;
                border: none;
                color: var(--pure-white);
                width: 32px;
                height: 32px;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.8rem;
            }

            .qty-btn:hover {
                background: rgba(255, 255, 255, 0.1);
            }

            .qty-btn:active {
                transform: scale(0.95);
            }

            .qty-input {
                background: transparent;
                border: none;
                color: var(--pure-white);
                text-align: center;
                font-size: 0.9rem;
                font-weight: 600;
                width: 50px;
                height: 32px;
                outline: none;
            }

            .item-total-section {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                gap: 0.75rem;
                min-width: 120px;
            }

            .total-label {
                font-size: 0.85rem;
                color: rgba(255, 255, 255, 0.7);
                font-weight: 500;
            }

            .total-amount {
                font-size: 1.25rem;
                color: var(--pure-white);
                font-weight: 800;
                text-align: right;
            }

            .item-actions {
                display: flex;
                gap: 0.5rem;
            }

            .action-btn {
                background: transparent;
                border: 1px solid rgba(255, 255, 255, 0.2);
                color: rgba(255, 255, 255, 0.8);
                padding: 0.4rem 0.6rem;
                border-radius: var(--border-radius-sm);
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                gap: 0.25rem;
                font-size: 0.75rem;
            }

            .action-btn:hover {
                background: rgba(255, 255, 255, 0.1);
                color: var(--pure-white);
                border-color: rgba(255, 255, 255, 0.4);
            }

            .save-later-btn:hover {
                color: #ff6b6b;
                border-color: rgba(255, 107, 107, 0.4);
            }

            .item-footer {
                margin-top: 1.5rem;
                padding-top: 1rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .item-meta {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 0.8rem;
            }

            .stock-status {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-weight: 500;
            }

            .stock-status.in-stock {
                color: var(--success-green);
            }

            .delivery-info {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: rgba(255, 255, 255, 0.7);
            }

            .cart-summary-enhanced {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                backdrop-filter: blur(20px);
                overflow: hidden;
                position: sticky;
                top: 2rem;
                height: fit-content;
            }

            .summary-header-enhanced {
                padding: 1.5rem 1.5rem 1rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .summary-title-enhanced {
                font-size: 1.25rem;
                font-weight: 700;
                color: var(--pure-white);
                display: flex;
                align-items: center;
                gap: 0.75rem;
                margin: 0;
            }

            .summary-badge {
                background: rgba(255, 255, 255, 0.1);
                color: var(--pure-white);
                padding: 0.4rem 0.8rem;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 600;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .summary-content-enhanced {
                padding: 1.5rem;
            }

            .order-breakdown {
                margin-bottom: 1.5rem;
            }

            .breakdown-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem 0;
                font-size: 0.9rem;
            }

            .breakdown-label {
                color: rgba(255, 255, 255, 0.8);
                font-weight: 500;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .breakdown-value {
                color: var(--pure-white);
                font-weight: 600;
            }

            .delivery-fee {
                color: var(--warning-orange);
            }

            .breakdown-divider {
                height: 1px;
                background: rgba(255, 255, 255, 0.1);
                margin: 1rem 0;
            }

            .total-row {
                font-size: 1.1rem;
                padding: 1rem 0;
                border-top: 2px solid rgba(255, 255, 255, 0.2);
                background: rgba(255, 255, 255, 0.02);
                margin: 0 -1.5rem;
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .total-label,
            .total-value {
                font-weight: 800;
                color: var(--pure-white);
            }

            .total-value {
                font-size: 1.3rem;
            }

            /* Savings Info */
            .savings-info {
                margin-bottom: 1.5rem;
                padding: 1rem;
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-md);
            }

            .savings-item {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: rgba(255, 255, 255, 0.8);
                font-size: 0.8rem;
                margin-bottom: 0.5rem;
            }

            .savings-item:last-child {
                margin-bottom: 0;
            }

            .savings-item.success {
                color: var(--success-green);
            }

            .savings-item i {
                width: 14px;
                text-align: center;
            }

            .checkout-section-enhanced {
                margin-bottom: 1.5rem;
            }

            .checkout-btn-enhanced {
                width: 100%;
                background: var(--pure-white);
                color: var(--primary-black);
                border: none;
                border-radius: var(--border-radius-md);
                cursor: pointer;
                transition: var(--transition-normal);
                position: relative;
                overflow: hidden;
                margin-bottom: 1rem;
                min-height: 50px;
            }

            .checkout-btn-enhanced:hover {
                background: var(--gray-100);
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }

            .btn-content {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 1rem 1.5rem;
                font-weight: 700;
                font-size: 1rem;
            }

            .btn-text {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .btn-amount {
                font-size: 1.1rem;
                font-weight: 800;
            }

            .btn-loader {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .loader-spinner {
                width: 20px;
                height: 20px;
                border: 2px solid rgba(0, 0, 0, 0.1);
                border-top: 2px solid var(--primary-black);
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }

            .payment-security {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 0.75rem;
                color: rgba(255, 255, 255, 0.7);
                margin-bottom: 1rem;
            }

            .security-text {
                display: flex;
                align-items: center;
                gap: 0.4rem;
            }

            .accepted-payments {
                display: flex;
                gap: 0.5rem;
                font-size: 1rem;
            }

            .additional-services {
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                padding-top: 1rem;
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }

            .service-item {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .service-item i {
                color: var(--success-green);
                width: 16px;
                text-align: center;
                font-size: 0.8rem;
            }

            .service-text {
                display: flex;
                flex-direction: column;
            }

            .service-text strong {
                color: var(--pure-white);
                font-size: 0.8rem;
                margin-bottom: 0.2rem;
            }

            .service-text small {
                color: rgba(255, 255, 255, 0.6);
                font-size: 0.7rem;
            }

            @media (max-width: 1200px) {
                .cart-grid-container {
                    grid-template-columns: 1fr 350px;
                    gap: 2rem;
                }

                .item-main-content {
                    grid-template-columns: 120px 1fr auto;
                    gap: 1rem;
                }
            }

            @media (max-width: 968px) {
                .cart-grid-container {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }

                .cart-summary-enhanced {
                    position: static;
                }

                .item-main-content {
                    grid-template-columns: 100px 1fr;
                    gap: 1rem;
                }

                .item-total-section {
                    grid-column: 1 / -1;
                    margin-top: 1rem;
                    align-items: flex-start;
                    flex-direction: row;
                    justify-content: space-between;
                }

                .item-attributes {
                    flex-direction: column;
                    gap: 0.5rem;
                }

                .quantity-section {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 0.5rem;
                }
            }

            @media (max-width: 768px) {
                .cart-item-card {
                    padding: 1.25rem;
                }

                .item-main-content {
                    grid-template-columns: 80px 1fr;
                    gap: 0.75rem;
                }

                .item-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 0.75rem;
                }

                .summary-content-enhanced {
                    padding: 1.25rem;
                }

                .btn-content {
                    flex-direction: column;
                    gap: 0.5rem;
                    text-align: center;
                }
            }

            @media (max-width: 480px) {
                .cart-item-card {
                    padding: 1rem;
                }

                .item-name {
                    font-size: 1rem;
                }
            }
        </style>

        <div class="modern-cart-items">
            <?php

            for ($i = 0; $i < $num; $i++) {
                $d = $rs->fetch_assoc();
                $total = $d["price"] * $d["cart_qty"];
                $netTotal += $total;

            ?>

                <div class="cart-item-card" data-cart-id="<?php echo $d['cart_id']; ?>">
                    <div class="item-main-content">
                        <div class="item-image-container">
                            <div class="item-image-wrapper">
                                <img src="<?php echo $d["path"]; ?>" alt="<?php echo $d["name"]; ?>" class="item-image">
                                <div class="image-overlay">
                                    <button class="quick-view-btn" title="Quick View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="item-details">
                            <div class="item-header">
                                <h4 class="item-name"><?php echo $d["name"]; ?></h4>

                            </div>
                            <div class="item-attributes">
                                <div class="attribute-group">
                                    <span class="attribute-label">Color:</span>
                                    <span class="attribute-value"><?php echo $d["color_name"]; ?></span>
                                </div>
                                <div class="attribute-group">
                                    <span class="attribute-label">Size:</span>
                                    <span class="attribute-value"><?php echo $d["size_name"]; ?></span>
                                </div>
                            </div>

                            <div class="item-pricing">
                                <div class="unit-price">
                                    <span class="price-label">Price:</span>
                                    <span class="price-value">Rs.<?php echo $d["price"]; ?>.00</span>
                                </div>
                            </div>

                            <div class="quantity-section">
                                <div class="quantity-label">Qty:</div>
                                <div class="quantity-controls">
                                    <button class="qty-btn qty-decrease" onclick="decrementCartQty('<?php echo $d['cart_id']; ?>');" title="Decrease Quantity">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="qty-input" id="qty<?php echo $d['cart_id']; ?>" value="<?php echo $d["cart_qty"]; ?>" readonly>
                                    <button class="qty-btn qty-increase" onclick="incrementCartQty('<?php echo $d['cart_id']; ?>');" title="Increase Quantity">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>



                            <div class="item-pricing">
                                <div class="unit-price">
                                    <span class="price-label">Total:</span>
                                    <span class="total-amount">Rs.<?php echo $total; ?>.00</span>
                                </div>
                            </div>
                        </div>

                        <button class="item-remove-btn" onclick="removeCart(<?php echo $d['cart_id']; ?>);" title="Remove Item">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>




                </div>

            <?php
            }
            ?>
        </div>

        <div class="cart-summary-enhanced">
            <div class="summary-header-enhanced">
                <h3 class="summary-title-enhanced">
                    <i class="fas fa-calculator"></i>
                    Order Summary
                </h3>
                <div class="summary-badge">
                    <?php echo $num; ?> <?php echo $num === 1 ? 'item' : 'items'; ?>
                </div>
            </div>

            <div class="summary-content-enhanced">
                <div class="order-breakdown">
                    <div class="breakdown-row">
                        <span class="breakdown-label">
                            <i class="fas fa-shopping-bag"></i>
                            Subtotal
                        </span>
                        <span class="breakdown-value">Rs.<?php echo $netTotal; ?>.00</span>
                    </div>

                    <div class="breakdown-row">
                        <span class="breakdown-label">
                            <i class="fas fa-truck"></i>
                            Delivery
                        </span>
                        <span class="breakdown-value delivery-fee">Rs.250.00</span>
                    </div>

                    <div class="breakdown-divider"></div>

                    <div class="breakdown-row total-row">
                        <span class="breakdown-label total-label">
                            <i class="fas fa-receipt"></i>
                            Total
                        </span>
                        <span class="breakdown-value total-value">Rs.<?php echo ($netTotal + 250); ?>.00</span>
                    </div>
                </div>



                <div class="checkout-section-enhanced">
                    <button class="checkout-btn-enhanced" onclick="checkOut();">
                        <div class="btn-content">
                            <span class="btn-text">
                                <i class="fas fa-lock"></i>
                                Checkout
                            </span>
                            <span class="btn-amount">Rs.<?php echo ($netTotal + 250); ?>.00</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php
} else {
?>
    <div class="empty-cart-enhanced">
        <style>
            .empty-cart-enhanced {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 4rem 2rem;
                text-align: center;
                min-height: 60vh;
            }

            .empty-cart-animation {
                position: relative;
                margin-bottom: 3rem;
            }

            .cart-icon-large {
                font-size: 5rem;
                color: rgba(255, 255, 255, 0.3);
                position: relative;
            }

            .cart-pulse {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 120px;
                height: 120px;
                border: 2px solid rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% {
                    transform: translate(-50%, -50%) scale(0.8);
                    opacity: 1;
                }

                100% {
                    transform: translate(-50%, -50%) scale(1.2);
                    opacity: 0;
                }
            }

            .empty-cart-content {
                max-width: 500px;
            }

            .empty-title {
                font-size: 2.5rem;
                font-weight: 800;
                color: var(--pure-white);
                margin-bottom: 1rem;
            }

            .empty-description {
                font-size: 1.1rem;
                color: rgba(255, 255, 255, 0.7);
                margin-bottom: 3rem;
                line-height: 1.6;
            }

            .empty-cart-actions {
                display: flex;
                gap: 1rem;
                justify-content: center;
                margin-bottom: 3rem;
            }

            .continue-shopping-enhanced,
            .view-wishlist-btn {
                padding: 1rem 2rem;
                border-radius: var(--border-radius-md);
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                gap: 0.75rem;
                text-decoration: none;
                border: none;
            }

            .continue-shopping-enhanced {
                background: var(--pure-white);
                color: var(--primary-black);
            }

            .continue-shopping-enhanced:hover {
                background: var(--gray-100);
                transform: translateY(-2px);
                text-decoration: none;
                color: var(--primary-black);
            }

            .view-wishlist-btn {
                background: transparent;
                color: var(--pure-white);
                border: 2px solid var(--pure-white);
            }

            .view-wishlist-btn:hover {
                background: var(--pure-white);
                color: var(--primary-black);
            }

            .shopping-suggestions {
                margin-top: 2rem;
            }

            .shopping-suggestions h4 {
                color: var(--pure-white);
                margin-bottom: 1rem;
                font-weight: 600;
            }

            .suggestion-tags {
                display: flex;
                gap: 0.75rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .suggestion-tag {
                padding: 0.5rem 1rem;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 20px;
                color: rgba(255, 255, 255, 0.8);
                text-decoration: none;
                font-size: 0.9rem;
                transition: var(--transition-normal);
            }

            .suggestion-tag:hover {
                background: rgba(255, 255, 255, 0.1);
                color: var(--pure-white);
                text-decoration: none;
                transform: translateY(-2px);
            }

            @media (max-width: 768px) {
                .empty-cart-actions {
                    flex-direction: column;
                    align-items: center;
                }

                .continue-shopping-enhanced,
                .view-wishlist-btn {
                    width: 100%;
                    max-width: 300px;
                    justify-content: center;
                }

                .empty-title {
                    font-size: 2rem;
                }

                .suggestion-tags {
                    flex-direction: column;
                    align-items: center;
                }

                .suggestion-tag {
                    width: 200px;
                    text-align: center;
                }
            }
        </style>

        <div class="empty-cart-animation">
            <div class="cart-icon-large">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>

        <div class="empty-cart-content">
            <h2 class="empty-title">Your Cart is Empty</h2>
            <p class="empty-description">
                Looks like you haven't added any items to your cart yet.
                Start shopping to fill it up with amazing products!
            </p>
           
        </div>
    </div>

<?php
}
?>