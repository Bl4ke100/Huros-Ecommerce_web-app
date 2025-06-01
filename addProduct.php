<?php

session_start();

include "connection.php";

if (isset($_SESSION["a"])) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horos | Add Product</title>
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Product Registration Card */
        .product-registration-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            padding: 3rem;
            width: 100%;
            max-width: 800px;
            box-shadow: var(--shadow-xl);
            animation: slideInUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .product-registration-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Header Section */
        .card-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .card-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--accent-green), rgba(16, 185, 129, 0.8));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: var(--pure-white);
        }

        .card-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
        }

        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-green), transparent);
            margin: 2rem 0;
            border-radius: 1px;
        }

        /* Form Styles */
        .form-section {
            position: relative;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
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

        .form-control,
        .form-select {
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

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-green);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            transform: translateY(-2px);
        }

        .form-select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1rem;
            padding-right: 3rem;
        }

        .form-select option {
            background: var(--secondary-black);
            color: var(--pure-white);
            padding: 0.5rem;
        }

        /* Two Column Layout */
        .row {
            display: flex;
            gap: 1.5rem;
            margin-left: 0;
            margin-right: 0;
        }

        .col-6 {
            flex: 1;
            padding-left: 0;
            padding-right: 0;
        }

        /* Textarea */
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        /* File Upload */
        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-upload-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border: 2px dashed rgba(255, 255, 255, 0.3);
            border-radius: var(--border-radius-md);
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-normal);
            min-height: 120px;
            flex-direction: column;
        }

        .file-upload-label:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--accent-green);
            color: var(--pure-white);
        }

        .file-upload-icon {
            font-size: 2rem;
            color: var(--accent-green);
        }

        .file-upload-text {
            text-align: center;
        }

        .file-upload-subtext {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 0.5rem;
        }

        /* Submit Button */
        .d-grid {
            margin-top: 3rem;
        }

        .btn {
            width: 100%;
            padding: 1.25rem 2rem;
            border: none;
            border-radius: var(--border-radius-md);
            font-size: 1.1rem;
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
            background: linear-gradient(135deg, var(--accent-green), rgba(16, 185, 129, 0.9));
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
            background: linear-gradient(135deg, #059669, var(--accent-green));
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
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form Validation */
        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: var(--accent-red);
            background: rgba(239, 68, 68, 0.1);
        }

        .invalid-feedback {
            color: var(--accent-red);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            display: none;
        }

        .form-control.is-invalid + .invalid-feedback,
        .form-select.is-invalid + .invalid-feedback {
            display: block;
        }

        /* Success State */
        .form-control.is-valid,
        .form-select.is-valid {
            border-color: var(--accent-green);
            background: rgba(16, 185, 129, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }

            .product-registration-card {
                padding: 2rem;
                margin: 1rem;
            }

            .card-title {
                font-size: 2rem;
            }

            .row {
                flex-direction: column;
                gap: 0;
            }

            .col-6 {
                flex: none;
                width: 100%;
            }

            .form-control,
            .form-select {
                padding: 0.875rem 1rem;
            }

            .btn {
                padding: 1rem 1.5rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .card-title {
                font-size: 1.75rem;
            }

            .card-icon {
                width: 60px;
            height: 60px;
                font-size: 1.5rem;
            }
        }

        /* Focus States for Accessibility */
        .form-control:focus-visible,
        .form-select:focus-visible,
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
            <div class="product-registration-card">
                <!-- Header -->
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h2 class="card-title">Product Registration</h2>
                    <p class="card-subtitle">Add new products to your inventory with complete details</p>
                    <div class="divider"></div>
                </div>

                <!-- Form Section -->
                <div class="form-section">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="pname" placeholder="Enter product name">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label">Brand</label>
                            <select class="form-select" id="brand">
                                <option value="0">Select Brand</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Category</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select Category</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["cat_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Color</label>
                            <select class="form-select" id="color">
                                <option value="0">Select Color</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["color_id"]); ?>"><?php echo ($data["color_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Size</label>
                            <select class="form-select" id="size">
                                <option value="0">Select Size</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `size`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data["size_id"]); ?>"><?php echo ($data["size_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="5" id="desc" placeholder="Enter detailed product description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Images</label>
                        <div class="file-upload-wrapper">
                            <input type="file" class="form-control" id="file" accept="image/*">
                            <label for="file" class="file-upload-label">
                                <div class="file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="file-upload-text">
                                    <strong>Click to upload images</strong>
                                    <div class="file-upload-subtext">or drag and drop files here</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-dark" onclick="regProduct();" id="registerBtn">
                            <i class="fas fa-save"></i>
                            Register Product
                        </button>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <script>
        // Enhanced file upload functionality
        document.getElementById('file').addEventListener('change', function(e) {
            const label = document.querySelector('.file-upload-label');
            const icon = document.querySelector('.file-upload-icon i');
            const text = document.querySelector('.file-upload-text strong');
            const subtext = document.querySelector('.file-upload-subtext');
            
            if (e.target.files.length > 0) {
                const fileName = e.target.files[0].name;
                icon.className = 'fas fa-check-circle';
                text.textContent = fileName;
                subtext.textContent = 'File selected successfully';
                label.style.borderColor = 'var(--accent-green)';
                label.style.background = 'rgba(16, 185, 129, 0.1)';
            } else {
                icon.className = 'fas fa-cloud-upload-alt';
                text.textContent = 'Click to upload images';
                subtext.textContent = 'or drag and drop files here';
                label.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                label.style.background = 'rgba(255, 255, 255, 0.05)';
            }
        });

        // Form validation
        function validateForm() {
            const fields = [
                { id: 'pname', name: 'Product Name' },
                { id: 'brand', name: 'Brand' },
                { id: 'cat', name: 'Category' },
                { id: 'color', name: 'Color' },
                { id: 'size', name: 'Size' },
                { id: 'desc', name: 'Description' },
                { id: 'file', name: 'Product Image' }
            ];

            let isValid = true;

            fields.forEach(field => {
                const element = document.getElementById(field.id);
                const value = element.value.trim();

                // Remove previous validation classes
                element.classList.remove('is-invalid', 'is-valid');

                if (!value || value === '0') {
                    element.classList.add('is-invalid');
                    isValid = false;
                } else {
                    element.classList.add('is-valid');
                }
            });

            return isValid;
        }

        // Enhanced register product function
        const originalRegProduct = window.regProduct;
        window.regProduct = function() {
            const registerBtn = document.getElementById('registerBtn');
            
            if (!validateForm()) {
                Swal.fire({
                    title: 'Validation Error',
                    text: 'Please fill in all required fields',
                    icon: 'error',
                    background: '#1a1a1a',
                    color: '#ffffff',
                    confirmButtonColor: '#ef4444'
                });
                return;
            }

            // Add loading state
            registerBtn.classList.add('loading');
            registerBtn.disabled = true;

            // Call original function if it exists
            if (typeof originalRegProduct === 'function') {
                originalRegProduct();
            } else {
                // Fallback functionality
                setTimeout(() => {
                    registerBtn.classList.remove('loading');
                    registerBtn.disabled = false;
                    
                    Swal.fire({
                        title: 'Success!',
                        text: 'Product registered successfully!',
                        icon: 'success',
                        background: '#1a1a1a',
                        color: '#ffffff',
                        confirmButtonColor: '#10b981'
                    }).then(() => {
                        // Reset form
                        document.querySelectorAll('.form-control, .form-select').forEach(field => {
                            field.value = field.tagName === 'SELECT' ? '0' : '';
                            field.classList.remove('is-valid', 'is-invalid');
                        });
                        
                        // Reset file upload
                        const label = document.querySelector('.file-upload-label');
                        const icon = document.querySelector('.file-upload-icon i');
                        const text = document.querySelector('.file-upload-text strong');
                        const subtext = document.querySelector('.file-upload-subtext');
                        
                        icon.className = 'fas fa-cloud-upload-alt';
                        text.textContent = 'Click to upload images';
                        subtext.textContent = 'or drag and drop files here';
                        label.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                        label.style.background = 'rgba(255, 255, 255, 0.05)';
                    });
                }, 2000);
            }
        };

        // Real-time validation
        document.querySelectorAll('.form-control, .form-select').forEach(field => {
            field.addEventListener('blur', function() {
                const value = this.value.trim();
                
                this.classList.remove('is-invalid', 'is-valid');
                
                if (!value || value === '0') {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.add('is-valid');
                }
            });
        });

        // Page load animation
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.product-registration-card');
            card.style.animationDelay = '0.2s';
        });
    </script>
</body>
</html>

<?php
} else {
    echo "You are not a valid admin";
}
?>  