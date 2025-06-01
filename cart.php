<?php

session_start();
include "connection.php";

$user = $_SESSION["u"];

if (isset($user)) {
    // load cart

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="modern-cart.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <title>Horos | My Cart</title>
    </head>

    <body onload="loadCart();" class="modern-cart-body">

        <style>
            /* modern-cart.css */

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

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
                --success-green: #28a745;
                --danger-red: #dc3545;
                --warning-orange: #fd7e14;

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

            body.modern-cart-body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: var(--gradient-primary);
                color: var(--pure-white);
                line-height: 1.6;
                overflow-x: hidden;
                min-height: 100vh;
            }

            /* Background Effects */
            .bg-effects-cart {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                pointer-events: none;
                z-index: 1;
            }

            .floating-shape {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.02);
                animation: float 30s infinite linear;
            }

            .shape-1 {
                width: 150px;
                height: 150px;
                top: 10%;
                left: 5%;
                animation-delay: 0s;
            }

            .shape-2 {
                width: 100px;
                height: 100px;
                top: 60%;
                right: 10%;
                animation-delay: 10s;
            }

            .shape-3 {
                width: 80px;
                height: 80px;
                bottom: 20%;
                left: 15%;
                animation-delay: 20s;
            }

            .shape-4 {
                width: 120px;
                height: 120px;
                top: 30%;
                right: 30%;
                animation-delay: 15s;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) rotate(0deg);
                    opacity: 0.1;
                }

                50% {
                    transform: translateY(-30px) rotate(180deg);
                    opacity: 0.05;
                }
            }

            /* Container */
            .container {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0 2rem;
                position: relative;
                z-index: 2;
            }

            /* Cart Wrapper */
            .cart-wrapper {
                padding: 6rem 0 4rem;
                min-height: 100vh;
                width: 100%;
            }

            /* Cart Header */
            .cart-header {
                margin-bottom: 3rem;
            }

            .header-content {
                display: flex;
                flex-direction: column;
                gap: 2rem;
            }

            .breadcrumb {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                font-size: 0.9rem;
            }

            .breadcrumb-link {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: rgba(255, 255, 255, 0.7);
                text-decoration: none;
                transition: var(--transition-normal);
            }

            .breadcrumb-link:hover {
                color: var(--pure-white);
                text-decoration: none;
            }

            .breadcrumb i {
                font-size: 0.8rem;
                color: rgba(255, 255, 255, 0.5);
            }

            .breadcrumb-current {
                color: var(--pure-white);
                font-weight: 500;
            }

            .cart-title-section {
                text-align: center;
            }

            .cart-title {
                font-size: 3rem;
                font-weight: 800;
                margin-bottom: 0.5rem;
                color: var(--pure-white);
            }

            .cart-subtitle {
                font-size: 1.1rem;
                color: rgba(255, 255, 255, 0.7);
            }

            .cart-actions-header {
                display: flex;
                justify-content: center;
                gap: 1rem;
            }

            .continue-shopping-btn,
            .clear-cart-btn {
                padding: 0.875rem 1.5rem;
                border-radius: var(--border-radius-md);
                font-size: 0.95rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                gap: 0.5rem;
                text-decoration: none;
                border: none;
            }

            .continue-shopping-btn {
                background: transparent;
                color: var(--pure-white);
                border: 2px solid var(--pure-white);
            }

            .continue-shopping-btn:hover {
                background: var(--pure-white);
                color: var(--primary-black);
                text-decoration: none;
            }

            .clear-cart-btn {
                background: transparent;
                color: var(--danger-red);
                border: 2px solid var(--danger-red);
            }

            .clear-cart-btn:hover {
                background: var(--danger-red);
                color: var(--pure-white);
            }

            /* Cart Content */
            .cart-content {
                display: grid;
                grid-template-columns: 1fr 400px;
                gap: 3rem;
                align-items: start;
            }

            .cart-main {
                display: flex;
                flex-direction: column;
                gap: 3rem;
            }

            /* Section Styling */
            .section-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 2rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .section-title {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--pure-white);
            }

            .section-title i {
                font-size: 1.25rem;
            }

            .items-count {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 1rem;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 20px;
                backdrop-filter: blur(10px);
            }

            .count-number {
                font-size: 1.1rem;
                font-weight: 700;
                color: var(--pure-white);
            }

            .count-text {
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.7);
            }

            /* Cart Items Section */
            .cart-items-section {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                padding: 2rem;
                backdrop-filter: blur(20px);
            }

            /* Loading State */
            .cart-loading {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 4rem 2rem;
                text-align: center;
            }

            .loading-spinner {
                margin-bottom: 1.5rem;
            }

            .spinner {
                width: 50px;
                height: 50px;
                border: 3px solid rgba(255, 255, 255, 0.1);
                border-top: 3px solid var(--pure-white);
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            .loading-text {
                font-size: 1.1rem;
                color: rgba(255, 255, 255, 0.8);
            }

            /* Empty Cart State */
            .empty-cart {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 4rem 2rem;
                text-align: center;
            }

            .empty-cart-icon {
                width: 100px;
                height: 100px;
                background: rgba(255, 255, 255, 0.05);
                border: 2px solid rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 2rem;
                font-size: 2.5rem;
                color: rgba(255, 255, 255, 0.6);
            }

            .empty-cart-title {
                font-size: 1.75rem;
                font-weight: 700;
                color: var(--pure-white);
                margin-bottom: 1rem;
            }

            .empty-cart-text {
                font-size: 1.1rem;
                color: rgba(255, 255, 255, 0.7);
                margin-bottom: 2rem;
                max-width: 400px;
            }

            .start-shopping-btn {
                background: var(--pure-white);
                color: var(--primary-black);
                border: none;
                padding: 1rem 2rem;
                border-radius: var(--border-radius-md);
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .start-shopping-btn:hover {
                background: var(--gray-100);
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }

            /* Cart Items List */
            .cart-items-list {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
            }

            /* Individual cart item styling (for loaded items) */
            .cart-items-list .card {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-lg);
                backdrop-filter: blur(10px);
                transition: var(--transition-normal);
            }

            .cart-items-list .card:hover {
                background: rgba(255, 255, 255, 0.08);
                border-color: rgba(255, 255, 255, 0.2);
                transform: translateY(-2px);
            }

            /* Recommended Products */
            .recommended-section {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                padding: 2rem;
                backdrop-filter: blur(20px);
            }

            .recommended-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1.5rem;
            }

            /* Cart Sidebar */
            .cart-sidebar {
                position: sticky;
                top: 2rem;
                display: flex;
                flex-direction: column;
                gap: 2rem;
            }

            .summary-card,
            .saved-items-card {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                backdrop-filter: blur(20px);
                overflow: hidden;
            }

            .summary-header,
            .card-header {
                padding: 2rem 2rem 1rem;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .summary-title,
            .card-title {
                font-size: 1.25rem;
                font-weight: 700;
                color: var(--pure-white);
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .security-badge {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 0.75rem;
                background: rgba(40, 167, 69, 0.1);
                border: 1px solid rgba(40, 167, 69, 0.3);
                border-radius: 20px;
                font-size: 0.8rem;
                color: var(--success-green);
            }

            .summary-content {
                padding: 0 2rem 2rem;
            }

            /* Price Breakdown */
            .price-breakdown {
                margin-bottom: 2rem;
            }

            .price-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem 0;
                font-size: 0.95rem;
            }

            .price-label {
                color: rgba(255, 255, 255, 0.8);
                font-weight: 500;
            }

            .price-value {
                color: var(--pure-white);
                font-weight: 600;
            }

            .shipping-free {
                color: var(--success-green);
            }

            .price-divider {
                height: 1px;
                background: rgba(255, 255, 255, 0.1);
                margin: 1rem 0;
            }

            .total-row {
                font-size: 1.1rem;
                padding: 1rem 0;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .total-row .price-label,
            .total-row .price-value {
                font-weight: 700;
                color: var(--pure-white);
            }

            .total-price {
                font-size: 1.25rem;
            }

            /* Promo Code Section */
            .promo-section {
                margin-bottom: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-md);
                overflow: hidden;
            }

            .promo-header {
                padding: 1rem;
                background: rgba(255, 255, 255, 0.02);
                cursor: pointer;
                display: flex;
                justify-content: between;
                align-items: center;
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.8);
                transition: var(--transition-normal);
            }

            .promo-header:hover {
                background: rgba(255, 255, 255, 0.05);
            }

            .promo-arrow {
                margin-left: auto;
                transition: var(--transition-normal);
            }

            .promo-header.active .promo-arrow {
                transform: rotate(180deg);
            }

            .promo-content {
                max-height: 0;
                overflow: hidden;
                transition: max-height var(--transition-normal);
            }

            .promo-content.show {
                max-height: 100px;
            }

            .promo-input-group {
                padding: 1rem;
                display: flex;
                gap: 0.5rem;
            }

            .promo-input {
                flex: 1;
                padding: 0.75rem;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: var(--border-radius-sm);
                color: var(--pure-white);
                font-size: 0.9rem;
            }

            .promo-input::placeholder {
                color: rgba(255, 255, 255, 0.5);
            }

            .promo-input:focus {
                outline: none;
                border-color: var(--pure-white);
                background: rgba(255, 255, 255, 0.08);
            }

            .promo-apply-btn {
                background: var(--pure-white);
                color: var(--primary-black);
                border: none;
                padding: 0.75rem 1rem;
                border-radius: var(--border-radius-sm);
                font-size: 0.9rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
            }

            .promo-apply-btn:hover {
                background: var(--gray-100);
            }

            /* Checkout Actions */
            .checkout-actions {
                margin-bottom: 2rem;
            }

            .checkout-btn {
                width: 100%;
                background: var(--pure-white);
                color: var(--primary-black);
                border: none;
                padding: 1.25rem 2rem;
                border-radius: var(--border-radius-md);
                font-size: 1.1rem;
                font-weight: 700;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
                position: relative;
                overflow: hidden;
                margin-bottom: 1.5rem;
            }

            .checkout-btn:hover {
                background: var(--gray-100);
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }

            .checkout-btn:disabled {
                background: var(--gray-400);
                cursor: not-allowed;
                transform: none;
            }

            .btn-loading {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .btn-spinner {
                width: 20px;
                height: 20px;
                border: 2px solid rgba(0, 0, 0, 0.1);
                border-top: 2px solid var(--primary-black);
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }

            .payment-methods {
                text-align: center;
            }

            .payment-label {
                font-size: 0.8rem;
                color: rgba(255, 255, 255, 0.6);
                display: block;
                margin-bottom: 0.75rem;
            }

            .payment-icons {
                display: flex;
                justify-content: center;
                gap: 1rem;
                font-size: 1.5rem;
                color: rgba(255, 255, 255, 0.7);
            }

            /* Trust Indicators */
            .trust-indicators {
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                padding-top: 1.5rem;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .trust-item {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.8);
            }

            .trust-item i {
                color: var(--success-green);
                width: 16px;
            }

            /* Saved Items */
            .saved-items-list {
                padding: 0 2rem 2rem;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            /* Responsive Design */
            @media (max-width: 1200px) {
                .cart-content {
                    grid-template-columns: 1fr 350px;
                    gap: 2rem;
                }
            }

            @media (max-width: 968px) {
                .container {
                    padding: 0 1.5rem;
                }

                .cart-content {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }

                .cart-sidebar {
                    position: static;
                }

                .cart-actions-header {
                    flex-direction: column;
                    align-items: center;
                }

                .continue-shopping-btn,
                .clear-cart-btn {
                    width: 100%;
                    max-width: 300px;
                    justify-content: center;
                }
            }

            @media (max-width: 768px) {
                .container {
                    padding: 0 1rem;
                }

                .cart-wrapper {
                    padding: 4rem 0 2rem;
                }

                .cart-title {
                    font-size: 2.5rem;
                }

                .cart-items-section,
                .recommended-section,
                .summary-card {
                    padding: 1.5rem;
                }

                .summary-header,
                .card-header {
                    padding: 1.5rem 1.5rem 1rem;
                }

                .summary-content {
                    padding: 0 1.5rem 1.5rem;
                }

                .section-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }

                .recommended-grid {
                    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                    gap: 1rem;
                }
            }

            @media (max-width: 480px) {
                .cart-title {
                    font-size: 2rem;
                }

                .cart-items-section,
                .summary-card {
                    padding: 1rem;
                }

                .summary-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }

                .trust-indicators {
                    gap: 0.75rem;
                }

                .trust-item {
                    font-size: 0.8rem;
                }
            }

            /* Loading Animation */
            .modern-cart-body {
                animation: fadeIn 0.8s ease-out;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            /* Smooth entrance animations */
            .cart-items-section,
            .summary-card,
            .recommended-section {
                animation: slideInUp 0.6s ease-out;
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

            /* Utility Classes */
            .d-none {
                display: none !important;
            }
        </style>

        <!-- Background Effects -->
        <div class="bg-effects-cart">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
        </div>

        <?php include "homeNav.php"; ?>

        <!-- Cart Section -->
        <div class="cart-wrapper">
            <div class="container">
                <!-- Cart Header -->
                <div class="cart-header">
                    <div class="header-content">
                       

                        <div class="cart-title-section">
                            <h1 class="cart-title">My Shopping Cart</h1>
                            <p class="cart-subtitle">Rerview your items and proceed to checkout</p>
                        </div>

                        <div class="cart-actions-header">
                            <button class="continue-shopping-btn" onclick="window.location.href='index.php'">
                                <i class="fas fa-arrow-left"></i>
                                Continue Shopping
                            </button>
                            
                        </div>
                    </div>
                </div>

                <!-- Cart Content -->
                <div class="cart-content">
                    <div class="cart-main">
                        <!-- Cart Items Container -->
                        <div class="cart-items-section">
                            <div class="section-header">
                                <h3 class="section-title">
                                    <i class="fas fa-shopping-bag"></i>
                                    Cart Items
                                </h3>
                                
                            </div>

                            

                            <!-- Empty Cart State -->
                            <div class="empty-cart" id="emptyCart" style="display: none;">
                                <div class="empty-cart-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <h3 class="empty-cart-title">Your cart is empty</h3>
                                <p class="empty-cart-text">Looks like you haven't added any items to your cart yet.</p>
                                <button class="start-shopping-btn" onclick="window.location.href='index.php'">
                                    <i class="fas fa-plus"></i>
                                    Start Shopping
                                </button>
                            </div>

                            <!-- Cart Items List -->
                            <div class="cart-items-list" id="cartBody">
                                <!-- Cart Items loaded here via loadCart() -->
                            </div>
                        </div>

                        <!-- Recommended Products -->
                        <div class="recommended-section" id="recommendedSection" style="display: none;">
                            <div class="section-header">
                                <h3 class="section-title">
                                    <i class="fas fa-star"></i>
                                    You might also like
                                </h3>
                            </div>
                            <div class="recommended-grid" id="recommendedProducts">
                                <!-- Recommended products loaded here -->
                            </div>
                        </div>
                    </div>

                    
            </div>
        </div>

        <?php include "homeFooter.php"; ?>

        <script src="modern-cart.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
} else {
    header("location:signin.php");
}
?>