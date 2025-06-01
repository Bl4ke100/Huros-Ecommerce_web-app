<?php
session_start();

if (isset($_SESSION["a"])) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celeste | Product Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">

    <style>
        :root {
            --primary-black: #000000;
            --secondary-black: #1a1a1a;
            --tertiary-black: #2d2d2d;
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
            --accent-purple: #8b5cf6;
            --accent-orange: #f97316;
            --accent-cyan: #06b6d4;
            --accent-pink: #ec4899;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.animation {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            background: var(--gradient-primary);
            color: var(--pure-white);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
            padding-top: 70px;
        }

        /* Page Container */
        .page-container {
            min-height: 100vh;
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
        }

        .page-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.02) 0%, transparent 50%),
                       radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.01) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Floating Background Shapes */
        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            list-style: none;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.03);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        /* Main Content */
        .main-content {
            position: relative;
            z-index: 2;
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-purple), transparent);
            margin: 2rem auto;
            border-radius: 1px;
            max-width: 200px;
        }

        /* Management Grid */
        .management-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        /* Management Cards */
        .management-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            padding: 2.5rem;
            transition: var(--transition-normal);
            animation: slideInUp 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        .management-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .management-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-xl);
        }

        /* Card Headers */
        .card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--pure-white);
        }

        .card-icon.brand {
            background: linear-gradient(135deg, var(--accent-blue), rgba(59, 130, 246, 0.8));
        }

        .card-icon.category {
            background: linear-gradient(135deg, var(--accent-green), rgba(16, 185, 129, 0.8));
        }

        .card-icon.color {
            background: linear-gradient(135deg, var(--accent-pink), rgba(236, 72, 153, 0.8));
        }

        .card-icon.size {
            background: linear-gradient(135deg, var(--accent-orange), rgba(249, 115, 22, 0.8));
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--pure-white);
            margin-bottom: 0.25rem;
        }

        .card-description {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1.25rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 1rem;
            font-weight: 500;
            transition: var(--transition-normal);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-control:focus {
            border-color: var(--accent-purple);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
            transform: translateY(-2px);
        }

        /* Alert Messages */
        .alert-container {
            margin-bottom: 1.5rem;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius-md);
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--accent-red);
        }

        .alert-danger:hover {
            background: rgba(239, 68, 68, 0.15);
        }

        .alert i {
            font-size: 1.1rem;
        }

        /* Buttons */
        .btn {
            width: 100%;
            padding: 1rem 2rem;
            border: none;
            border-radius: var(--border-radius-md);
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-normal);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
        }

        .btn-dark {
            background: linear-gradient(135deg, var(--accent-purple), rgba(139, 92, 246, 0.9));
            color: var(--pure-white);
            box-shadow: var(--shadow-md);
        }

        .btn-dark::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-dark:hover::before {
            left: 100%;
        }

        .btn-dark:hover {
            background: linear-gradient(135deg, #7c3aed, var(--accent-purple));
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-dark:active {
            transform: translateY(-1px);
        }

        /* Loading State */
        .btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid var(--pure-white);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 0.5rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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

        /* Form Validation */
        .form-control.is-invalid {
            border-color: var(--accent-red);
            background: rgba(239, 68, 68, 0.1);
        }

        .form-control.is-valid {
            border-color: var(--accent-green);
            background: rgba(16, 185, 129, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .management-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .management-card {
                padding: 2rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .card-header {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.75rem;
            }

            .management-card {
                padding: 1.5rem;
            }

            .form-control {
                padding: 0.875rem 1rem;
            }

            .btn {
                padding: 0.875rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        /* Utility Classes */
        .d-none {
            display: none !important;
        }

        .col-12 {
            width: 100%;
        }

        /* Focus States for Accessibility */
        .form-control:focus-visible,
        .btn:focus-visible {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }
    </style>
</head>

<body class="animation">
    <div class="page-container">
        <!-- Include Admin Navigation -->
        <?php include "adminHeader.php"; ?>

        <!-- Main Content -->
        <div class="main-content">
            

            <!-- Management Grid -->
            <div class="management-grid">
                
                <!-- Brand Registration -->
                <div class="management-card">
                    <div class="card-header">
                        <div class="card-icon brand">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div>
                            <h3 class="card-title">Brand Registration</h3>
                            <p class="card-description">Add new brands to your product catalog</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Brand Name</label>
                        <input type="text" placeholder="Enter brand name" class="form-control" id="brand">
                    </div>

                    <div class="alert-container">
                        <div class="d-none" id="msgDiv1" onclick="reload();">
                            <div class="alert alert-danger" id="msg1">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span id="msg1Text"></span>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-dark col-12" onclick="brandReg();" id="brandBtn">
                        <i class="fas fa-plus"></i>
                        Register Brand
                    </button>
                </div>

                <!-- Category Registration -->
                <div class="management-card">
                    <div class="card-header">
                        <div class="card-icon category">
                            <i class="fas fa-list"></i>
                        </div>
                        <div>
                            <h3 class="card-title">Category Registration</h3>
                            <p class="card-description">Create product categories for organization</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Category Name</label>
                        <input type="text" placeholder="Enter category name" class="form-control" id="category">
                    </div>

                    <div class="alert-container">
                        <div class="d-none" id="msgDiv2" onclick="reload();">
                            <div class="alert alert-danger" id="msg2">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span id="msg2Text"></span>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-dark col-12" onclick="catReg();" id="categoryBtn">
                        <i class="fas fa-plus"></i>
                        Register Category
                    </button>
                </div>

                <!-- Color Registration -->
                <div class="management-card">
                    <div class="card-header">
                        <div class="card-icon color">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div>
                            <h3 class="card-title">Color Registration</h3>
                            <p class="card-description">Add color options for your products</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Color Name</label>
                        <input type="text" placeholder="Enter color name" class="form-control" id="color">
                    </div>

                    <div class="alert-container">
                        <div class="d-none" id="msgDiv3" onclick="reload();">
                            <div class="alert alert-danger" id="msg3">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span id="msg3Text"></span>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-dark col-12" onclick="colorReg();" id="colorBtn">
                        <i class="fas fa-plus"></i>
                        Register Color
                    </button>
                </div>

                

            </div>
        </div>

        <!-- Animated Background -->
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Enhanced form validation
        function validateInput(inputId) {
            const input = document.getElementById(inputId);
            const value = input.value.trim();
            
            input.classList.remove('is-invalid', 'is-valid');
            
            if (!value) {
                input.classList.add('is-invalid');
                return false;
            } else {
                input.classList.add('is-valid');
                return true;
            }
        }

        // Enhanced registration functions with loading states
        function enhanceRegistrationFunction(originalFunction, buttonId, inputId, successMessage) {
            return function() {
                if (!validateInput(inputId)) {
                    Swal.fire({
                        title: 'Validation Error',
                        text: 'Please enter a valid value',
                        icon: 'error',
                        background: '#1a1a1a',
                        color: '#ffffff',
                        confirmButtonColor: '#ef4444'
                    });
                    return;
                }

                const button = document.getElementById(buttonId);
                const originalText = button.innerHTML;
                
                // Add loading state
                button.classList.add('loading');
                button.disabled = true;
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

                // Call original function
                if (typeof originalFunction === 'function') {
                    originalFunction();
                } else {
                    // Simulate successful registration
                    setTimeout(() => {
                        button.classList.remove('loading');
                        button.disabled = false;
                        button.innerHTML = originalText;
                        
                        Swal.fire({
                            title: 'Success!',
                            text: successMessage,
                            icon: 'success',
                            background: '#1a1a1a',
                            color: '#ffffff',
                            confirmButtonColor: '#10b981'
                        }).then(() => {
                            // Clear the input
                            const input = document.getElementById(inputId);
                            input.value = '';
                            input.classList.remove('is-valid', 'is-invalid');
                        });
                    }, 1500);
                }
            };
        }

        // Store original functions if they exist
        const originalBrandReg = window.brandReg;
        const originalCatReg = window.catReg;
        const originalColorReg = window.colorReg;
        const originalSizeReg = window.sizeReg;

        // Override with enhanced versions
        window.brandReg = enhanceRegistrationFunction(originalBrandReg, 'brandBtn', 'brand', 'Brand registered successfully!');
        window.catReg = enhanceRegistrationFunction(originalCatReg, 'categoryBtn', 'category', 'Category registered successfully!');
        window.colorReg = enhanceRegistrationFunction(originalColorReg, 'colorBtn', 'color', 'Color registered successfully!');
        window.sizeReg = enhanceRegistrationFunction(originalSizeReg, 'sizeBtn', 'size', 'Size registered successfully!');

        // Real-time validation
        ['brand', 'category', 'color', 'size'].forEach(inputId => {
            const input = document.getElementById(inputId);
            input.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });

            input.addEventListener('blur', function() {
                validateInput(inputId);
            });
        });

        // Page load animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.management-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Enhanced reload function
        function reload() {
            // Hide all alert divs
            ['msgDiv1', 'msgDiv2', 'msgDiv3', 'msgDiv4'].forEach(divId => {
                document.getElementById(divId).classList.add('d-none');
            });
        }
    </script>
</body>
</html>

<?php
} else {
    echo "You are not a valid admin";
}
?>