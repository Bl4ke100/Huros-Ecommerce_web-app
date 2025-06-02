<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Admin Navigation</title>
</head>
<body>

<div class="admin-header">
    <style>
        /* Admin Navigation Styles */
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
            --accent-blue: #3b82f6;
            --accent-green: #10b981;
            --accent-red: #ef4444;
            --accent-purple: #8b5cf6;
            --accent-orange: #f97316;
        }

        * {
            box-sizing: border-box;
        }

        .admin-header {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Main Admin Header Navigation */
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
            height: 70px;
        }

        /* Logo Section */
        .nav-left {
            display: flex;
            align-items: center;
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
            text-decoration: none;
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

        .admin-badge {
            background: var(--accent-red);
            color: var(--header-white);
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.2rem 0.5rem;
            border-radius: 12px;
            margin-left: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Main Navigation - Centered */
        .main-navigation {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            gap: 3rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.75rem 1.5rem;
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

        .nav-link.active {
            color: var(--header-white);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-link i {
            font-size: 1rem;
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
            margin-left: auto;
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

        .mobile-nav-link.active {
            color: var(--header-white);
            background: rgba(255, 255, 255, 0.05);
            padding-left: 1rem;
        }

        .mobile-nav-link:last-child {
            border-bottom: none;
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .main-navigation {
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
        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        /* Focus States for Accessibility */
        .nav-link:focus {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        /* Admin-specific styles */
        .dashboard-icon {
            color: var(--accent-blue);
        }

        .products-icon {
            color: var(--accent-green);
        }

        .users-icon {
            color: var(--accent-purple);
        }

        .nav-link.active .dashboard-icon {
            color: var(--header-white);
        }

        .nav-link.active .products-icon {
            color: var(--header-white);
        }

        .nav-link.active .users-icon {
            color: var(--header-white);
        }
    </style>

    <nav class="header-nav">
        <div class="nav-container">
            <!-- Left Side - Logo -->
            <div class="nav-left">
                <a href="admindashboard.php" class="brand-logo">
                    <img src="Resources/img/white.png" alt="Horos" class="logo-icon">
                    <span class="brand-text">Horos</span>
                    <span class="admin-badge">Admin</span>
                </a>
            </div>

            <!-- Center - Main Navigation -->
            <div class="main-navigation">
                <a href="admindashboard.php" class="nav-link active" onclick="setActiveNav(this)">
                    <i class="fas fa-tachometer-alt dashboard-icon"></i>
                    <span>Dashboard</span>
                </a>

                <a href="manageProducts.php" class="nav-link" onclick="setActiveNav(this)">
                    <i class="fas fa-box products-icon"></i>
                    <span>Manage Products</span>
                </a>

                <a href="manageUsers.php" class="nav-link" onclick="setActiveNav(this)">
                    <i class="fas fa-users users-icon"></i>
                    <span>Manage Users</span>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-menu-content">
                <!-- Mobile Navigation -->
                <div class="mobile-nav">
                    <a href="admindashboard.php" class="mobile-nav-link active" onclick="setActiveMobileNav(this)">
                        <i class="fas fa-tachometer-alt dashboard-icon"></i>
                        Dashboard
                    </a>

                    <a href="manage-products.php" class="mobile-nav-link" onclick="setActiveMobileNav(this)">
                        <i class="fas fa-box products-icon"></i>
                        Manage Products
                    </a>

                    <a href="manage-users.php" class="mobile-nav-link" onclick="setActiveMobileNav(this)">
                        <i class="fas fa-users users-icon"></i>
                        Manage Users
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // Toggle mobile menu
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            const toggle = document.querySelector('.mobile-menu-toggle');
            
            mobileMenu.classList.toggle('show');
            toggle.classList.toggle('active');
        }

        // Set active navigation link
        function setActiveNav(clickedLink) {
            // Remove active class from all nav links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to clicked link
            clickedLink.classList.add('active');
        }

        // Set active mobile navigation link
        function setActiveMobileNav(clickedLink) {
            // Remove active class from all mobile nav links
            document.querySelectorAll('.mobile-nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to clicked link
            clickedLink.classList.add('active');
            
            // Close mobile menu
            toggleMobileMenu();
        }

        // Add scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.header-nav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const toggle = document.querySelector('.mobile-menu-toggle');
            const nav = document.querySelector('.header-nav');
            
            if (!nav.contains(event.target) && mobileMenu.classList.contains('show')) {
                mobileMenu.classList.remove('show');
                toggle.classList.remove('active');
            }
        });
    </script>
</div>

</body>
</html>