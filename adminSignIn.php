<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    <title>Celeste | Admin Signin</title>

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

            --accent-blue: #3b82f6;
            --accent-green: #10b981;
            --accent-red: #ef4444;
            --accent-gold: #ffd700;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.signinup.animation {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            background: var(--primary-black);
            color: var(--pure-white);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Admin Signin Container */
        .admin-signin-container {
            min-height: 100vh;
            width: 100%;
            background: var(--gradient-primary);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
            overflow: hidden;
        }

        .admin-signin-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.03) 0%, transparent 50%),
                       radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.02) 0%, transparent 50%);
            pointer-events: none;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        /* Brand Header */
        .brand-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
            text-decoration: none;
            color: var(--pure-white);
            transition: var(--transition-normal);
        }

        .brand-logo:hover {
            color: var(--pure-white);
            transform: scale(1.02);
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--border-radius-sm);
        }

        .brand-text {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Main Sign-in Card */
        .signin-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            max-width: 500px;
            margin: 0 auto;
            animation: slideInUp 0.8s ease-out;
        }

        .signin-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 600px;
        }

        /* Form Section */
        .signin-form {
            padding: 3rem;
            width: 100%;
        }

        .form-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input-group {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.08);
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
            border-color: var(--pure-white);
            background: rgba(255, 255, 255, 0.12);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .form-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.1rem;
            transition: var(--transition-normal);
        }

        .form-control:focus + .form-icon {
            color: var(--pure-white);
        }

        /* Alert Messages */
        .alert-container {
            margin: 1.5rem 0;
        }

        .alert {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--accent-red);
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius-md);
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideInUp 0.3s ease-out;
        }

        .alert i {
            font-size: 1.1rem;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--accent-red);
        }

        /* Sign-in Button */
        .signin-btn, .btn-dark {
            width: 100%;
            background: var(--pure-white);
            color: var(--primary-black);
            border: none;
            padding: 1rem 2rem;
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
            margin-top: 2rem;
        }

        .signin-btn:hover, .btn-dark:hover {
            background: var(--gray-100);
            color: var(--primary-black);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .signin-btn:active, .btn-dark:active {
            transform: translateY(-1px);
        }

        /* Security Notice */
        .security-notice {
            margin-top: 2rem;
            padding: 1rem;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: var(--border-radius-md);
            color: var(--accent-blue);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .security-notice i {
            font-size: 1rem;
        }

        /* Modern Animated Background */
        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.02);
            animation: floatShapes 20s infinite linear;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 70%;
            left: 80%;
            animation-delay: 5s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 20%;
            left: 90%;
            animation-delay: 10s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 80%;
            left: 20%;
            animation-delay: 15s;
        }

        .shape:nth-child(5) {
            width: 140px;
            height: 140px;
            top: 40%;
            left: 5%;
            animation-delay: 8s;
        }

        @keyframes floatShapes {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.2;
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.4;
            }
        }

        /* Footer */
        .admin-footer {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
            z-index: 3;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .signin-card {
                margin: 1rem;
                max-width: 100%;
            }

            .signin-form {
                padding: 2rem 1.5rem;
            }

            .form-title {
                font-size: 1.75rem;
            }

            .brand-text {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 480px) {
            .signin-content {
                min-height: auto;
            }

            .form-title {
                font-size: 1.5rem;
                text-align: center;
            }

            .brand-header {
                margin-bottom: 2rem;
            }

            .signin-form {
                padding: 1.5rem;
            }
        }

        /* Loading Animation for Button */
        .signin-btn.loading, .btn-dark.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .signin-btn.loading::after, .btn-dark.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid var(--primary-black);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 0.5rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Focus States for Accessibility */
        .form-control:focus,
        .signin-btn:focus,
        .btn-dark:focus {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        /* Bootstrap compatibility */
        .d-none {
            display: none !important;
        }

        .col-12 {
            width: 100%;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-5 {
            margin-top: 3rem;
        }

        .mb-5 {
            margin-bottom: 3rem;
        }
    </style>
</head>

<body class="signinup animation">
    <div class="admin-signin-container">
        <!-- Animated Background Shapes -->
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <div class="container">

            <!-- Brand Header -->
            <div class="brand-header">
                <a href="#" class="brand-logo">
                    <img src="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" alt="Celeste" class="logo-icon">
                    <span class="brand-text">Celeste</span>
                </a>
                <div class="brand-subtitle">Admin Portal</div>
            </div>

            <!-- Main Sign-in Card -->
            <div class="signin-card" id="signInBox">
                <div class="signin-content">
                    
                    <!-- Form Section -->
                    <div class="signin-form">
                        <div class="form-header">
                            <h2 class="form-title">Administrator Access</h2>
                            <p class="form-subtitle">Secure sign-in to Celeste admin dashboard</p>
                        </div>

                        <form>
                            <div class="form-group mt-5">
                                <label class="form-label">Admin Username</label>
                                <div class="form-input-group">
                                    <input type="text" class="form-control" id="un" placeholder="Enter your username" autocomplete="username">
                                    <i class="fas fa-user form-icon"></i>
                                </div>
                            </div>

                            <div class="form-group mt-2 mb-5">
                                <label class="form-label">Admin Password</label>
                                <div class="form-input-group">
                                    <input type="password" class="form-control" id="pw" placeholder="Enter your password" autocomplete="current-password">
                                    <i class="fas fa-lock form-icon"></i>
                                </div>
                            </div>

                            <!-- Alert Messages -->
                            <div class="alert-container">
                                <div class="d-none" id="msgDiv3">
                                    <div class="alert alert-danger" id="msg3">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <span id="alertText"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="button" class="btn btn-dark col-12" onclick="adminSignIn();" id="signinButton">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Sign in</span>
                                </button>
                            </div>

                            <!-- Security Notice -->
                            <div class="security-notice">
                                <i class="fas fa-shield-alt"></i>
                                <span>This is a secure admin area. All access is logged and monitored.</span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <script>
        // Enhanced form validation and UX
        document.addEventListener('DOMContentLoaded', function() {
            const usernameInput = document.getElementById('un');
            const passwordInput = document.getElementById('pw');
            
            // Add enter key support
            [usernameInput, passwordInput].forEach(input => {
                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        adminSignIn();
                    }
                });
            });
            
            // Focus username field on load
            usernameInput.focus();
        });
    </script>
</body>

</html>