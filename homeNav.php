<div class="modern-header">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="modern-header.css">

    <style>
        /* modern-header.css */

        :root {
            --header-black: #000000;
            --header-white: #ffffff;
            --header-gray: #f8f9fa;
            --header-dark-gray: #6c757d;
            --header-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            --header-border: rgba(255, 255, 255, 0.1);
            --transition-fast: 0.2s ease;
            --transition-normal: 0.3s ease;
            --z-header: 1000;
        }

        * {
            box-sizing: border-box;
        }

        .modern-header {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Main Header Navigation */
        .header-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: var(--header-black);
            border-bottom: 1px solid var(--header-border);
            backdrop-filter: blur(20px);
            z-index: var(--z-header);
            transition: var(--transition-normal);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
        }

        /* Left Side - Logo & Navigation */
        .nav-left {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--header-white);
            font-weight: 700;
            font-size: 1.5rem;
            transition: var(--transition-normal);
        }

        .brand-logo:hover {
            color: var(--header-white);
            transform: scale(1.02);
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            border-radius: 4px;
        }

        .brand-text {
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .main-navigation {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: var(--transition-normal);
            position: relative;
            cursor: pointer;
        }

        .nav-link:hover {
            color: var(--header-white);
            background: rgba(255, 255, 255, 0.05);
            text-decoration: none;
        }

        .nav-link i {
            font-size: 1rem;
        }

        .dropdown-trigger .dropdown-arrow {
            font-size: 0.8rem;
            margin-left: 0.25rem;
            transition: var(--transition-normal);
        }

        .dropdown-trigger.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--header-black);
            border: 1px solid var(--header-border);
            border-radius: 12px;
            padding: 1.5rem;
            min-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition-normal);
            z-index: 1001;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .dropdown-section h4 {
            color: var(--header-white);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .dropdown-link {
            display: block;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            padding: 0.5rem 0;
            font-size: 0.9rem;
            transition: var(--transition-normal);
        }

        .dropdown-link:hover {
            color: var(--header-white);
            text-decoration: none;
            padding-left: 0.5rem;
        }

        /* Right Side - User Actions */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        /* Search Container */
        .search-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 300px;
            padding: 0.75rem 1rem 0.75rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--header-border);
            border-radius: 25px;
            color: var(--header-white);
            font-size: 0.9rem;
            transition: var(--transition-normal);
            outline: none;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-input:focus {
            width: 350px;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        .search-btn {
            position: absolute;
            right: 0.5rem;
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: var(--transition-normal);
        }

        .search-btn:hover {
            color: var(--header-white);
            background: rgba(255, 255, 255, 0.1);
        }

        .filter-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--header-border);
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .filter-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--header-white);
        }

        /* User Actions */
        .user-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .action-btn {
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 0.75rem;
            border-radius: 8px;
            transition: var(--transition-normal);
        }

        .action-btn:hover {
            color: var(--header-white);
            background: rgba(255, 255, 255, 0.05);
            text-decoration: none;
        }

        .action-text {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .action-badge {
            position: absolute;
            top: 0.25rem;
            right: 0.25rem;
            background: #dc3545;
            color: var(--header-white);
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.2rem 0.4rem;
            border-radius: 10px;
            min-width: 18px;
            text-align: center;
            line-height: 1;
        }

        /* User Menu */
        .user-menu {
            position: relative;
        }

        .user-menu-trigger {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            padding: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .user-menu-trigger:hover {
            color: var(--header-white);
            background: rgba(255, 255, 255, 0.05);
        }

        .user-avatar {
            font-size: 1.5rem;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--header-black);
            border: 1px solid var(--header-border);
            border-radius: 12px;
            min-width: 250px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition-normal);
            z-index: 1001;
            overflow: hidden;
        }

        .user-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-info {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.03);
        }

        .user-name {
            color: var(--header-white);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .user-email {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
        }

        .dropdown-divider {
            height: 1px;
            background: var(--header-border);
        }

        .user-dropdown .dropdown-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition-normal);
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .user-dropdown .dropdown-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--header-white);
            padding-left: 1.5rem;
        }

        .sign-out-btn {
            color: #dc3545 !important;
        }

        .sign-out-btn:hover {
            background: rgba(220, 53, 69, 0.1) !important;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            gap: 3px;
            background: transparent;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
        }

        .hamburger-line {
            width: 24px;
            height: 2px;
            background: var(--header-white);
            transition: var(--transition-normal);
            transform-origin: center;
        }

        .mobile-menu-toggle.active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .mobile-menu-toggle.active .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-toggle.active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        /* Mobile Menu */
        .mobile-menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: var(--header-black);
            border-top: 1px solid var(--header-border);
            transform: translateY(-100%);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition-normal);
            z-index: 999;
        }

        .mobile-menu.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .mobile-menu-content {
            padding: 2rem;
            max-height: calc(100vh - 70px);
            overflow-y: auto;
        }

        .mobile-search {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .mobile-search .search-wrapper {
            flex: 1;
        }

        .mobile-search .search-input {
            width: 100%;
        }

        .mobile-nav {
            margin-bottom: 2rem;
        }

        .mobile-nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 1rem 0;
            border-bottom: 1px solid var(--header-border);
            font-weight: 500;
            transition: var(--transition-normal);
        }

        .mobile-nav-link:hover {
            color: var(--header-white);
            text-decoration: none;
            padding-left: 1rem;
        }

        .mobile-nav-link:last-child {
            border-bottom: none;
        }

        .mobile-nav-section {
            margin-top: 1.5rem;
        }

        .mobile-nav-section h4 {
            color: var(--header-white);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .mobile-nav-sublink {
            display: block;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            padding: 0.75rem 0 0.75rem 1rem;
            font-size: 0.9rem;
            transition: var(--transition-normal);
        }

        .mobile-nav-sublink:hover {
            color: var(--header-white);
            text-decoration: none;
            padding-left: 1.5rem;
        }

        .mobile-user-actions {
            border-top: 1px solid var(--header-border);
            padding-top: 2rem;
        }

        .mobile-action-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 1rem 0;
            border-bottom: 1px solid var(--header-border);
            font-weight: 500;
            transition: var(--transition-normal);
            background: transparent;
            border-left: none;
            border-right: none;
            border-top: none;
            cursor: pointer;
            text-align: left;
        }

        .mobile-action-btn:hover {
            color: var(--header-white);
            text-decoration: none;
            padding-left: 1rem;
        }

        .mobile-action-btn:last-child {
            border-bottom: none;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .nav-container {
                padding: 0 1.5rem;
            }

            .search-input {
                width: 250px;
            }

            .search-input:focus {
                width: 300px;
            }

            .action-text {
                display: none;
            }
        }

        @media (max-width: 968px) {

            .main-navigation,
            .search-container,
            .user-actions {
                display: none;
            }

            .mobile-menu-toggle {
                display: flex;
            }

            .nav-container {
                padding: 0 1rem;
            }
        }

        @media (max-width: 480px) {
            .brand-text {
                font-size: 1.25rem;
            }

            .logo-icon {
                width: 28px;
                height: 28px;
            }

            .mobile-menu-content {
                padding: 1.5rem;
            }
        }

        /* Scroll Effect */
        .header-nav.scrolled {
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: var(--header-shadow);
        }

        /* Smooth Animations */
        .nav-link,
        .action-btn,
        .dropdown-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::before,
        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .nav-link:hover::before,
        .action-btn:hover::before {
            left: 100%;
        }

        /* Focus States for Accessibility */
        .nav-link:focus,
        .action-btn:focus,
        .search-input:focus,
        .filter-btn:focus,
        .user-menu-trigger:focus {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        /* Loading State for Search */
        .search-wrapper.loading .search-btn {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <nav class="header-nav">
        <div class="nav-container">
            <!-- Left Side - Logo & Main Navigation -->
            <div class="nav-left">
                <a href="index.php" class="brand-logo">
                    <img src="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" alt="Horos" class="logo-icon">
                    <span class="brand-text">Horos</span>
                </a>

                <div class="main-navigation">
                    <a href="shop.php" class="nav-link">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Shop</span>
                    </a>

                </div>
            </div>

            <!-- Right Side - User Actions -->
            <div class="nav-right">
                <!-- Search -->
                <div class="search-container">
                    <div class="search-wrapper">
                        <input type="search" class="search-input" placeholder="Search products..." id="product" onkeyup="searchProduct(0);">
                        <button class="search-btn" type="button">
                        </button>
                    </div>
                    <button class="filter-btn" type="button" onclick="viewFilter();" title="Advanced Filters">
                        <i class="fas fa-sliders-h"></i>
                    </button>
                </div>

                <!-- User Actions -->
                <div class="user-actions">

                    <a href="cart.php" class="action-btn cart-btn" title="Shopping Cart">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    <a href="profile.php" class="action-btn profile-btn" title="My Account">
                        <i class="fas fa-user"></i>
                    </a>

                </div>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-menu-content">
                <!-- Mobile Search -->
                <div class="mobile-search">
                    <div class="search-wrapper">
                        <input type="search" class="search-input" placeholder="Search products..." id="productMobile" onkeyup="searchProduct(0);">
                        <button class="search-btn" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <button class="filter-btn" type="button" onclick="viewFilter();">
                        <i class="fas fa-sliders-h"></i>
                    </button>
                </div>

                <!-- Mobile Navigation -->
                <div class="mobile-nav">
                    <a href="shop.php" class="mobile-nav-link">
                        <i class="fas fa-shopping-bag"></i>
                        Shop
                    </a>

                </div>

                <!-- Mobile User Actions -->
                <div class="mobile-user-actions">
                    <a href="profile.php" class="mobile-action-btn">
                        <i class="fas fa-user"></i>
                        My Account
                    </a>
                    <a href="wishlist.php" class="mobile-action-btn">
                        <i class="fas fa-heart"></i>
                        Wishlist
                        <span class="action-badge">3</span>
                    </a>
                    <a href="cart.php" class="mobile-action-btn">
                        <i class="fas fa-shopping-cart"></i>
                        Cart
                        <span class="action-badge">2</span>
                    </a>
                    <a href="orderHistory.php" class="mobile-action-btn">
                        <i class="fas fa-scroll"></i>
                        Order History
                    </a>
                    <button class="mobile-action-btn sign-out-btn" onclick="signOut();">
                        <i class="fas fa-power-off"></i>
                        Sign Out
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>