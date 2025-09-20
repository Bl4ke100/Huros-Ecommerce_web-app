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
        
        <link rel="stylesheet" href="styles/cart.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <title>Horos | My Cart</title>
    </head>

    <body onload="loadCart();" class="modern-cart-body">


        <?php include "homeNav.php"; ?>

        <div class="cart-wrapper">
            <div class="container">
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

                <div class="cart-content" style="width: 100%;">
                    <div class="cart-main">
                        <div class="cart-items-section">
                            <div class="section-header">
                                <h3 class="section-title">
                                    <i class="fas fa-shopping-bag"></i>
                                    Cart Items
                                </h3>
                                
                            </div>

                            

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

                            <div class="cart-items-list" id="cartBody">
                            </div>
                        </div>

                        
                    </div>

                    
            </div>
        </div>

        <?php include "homeFooter.php"; ?>

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