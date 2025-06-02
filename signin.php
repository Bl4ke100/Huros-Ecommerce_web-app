<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horos | Signin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="modern-auth.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="modern-auth-body">


    <style>
        /* modern-auth.css */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.modern-auth-body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 50%, #000000 100%);
            min-height: 100vh;
            color: #ffffff;
            overflow-x: hidden;
            position: relative;
        }

        /* Background Effects */
        .bg-effects {
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
            animation: float 20s infinite linear;
        }

        .shape-1 {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 60px;
            height: 60px;
            top: 60%;
            left: 80%;
            animation-delay: 5s;
        }

        .shape-3 {
            width: 80px;
            height: 80px;
            top: 80%;
            left: 20%;
            animation-delay: 10s;
        }

        .shape-4 {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 70%;
            animation-delay: 15s;
        }

        .shape-5 {
            width: 40px;
            height: 40px;
            top: 40%;
            left: 50%;
            animation-delay: 8s;
        }

        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.1;
            }

            100% {
                transform: translateY(0px) rotate(360deg);
                opacity: 0.3;
            }
        }

        /* Container */
        .container {
            position: relative;
            z-index: 2;
        }

        /* Auth Container */
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            overflow: hidden;
            backdrop-filter: blur(20px);
            width: 100%;
            max-width: 900px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 600px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.4);
        }

        .signup-card {
            max-width: 1100px;
        }

        /* Visual Side */
        .auth-visual {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }

        .auth-visual::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(0, 0, 0, 0.02) 100%);
        }

        .visual-content {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .brand-icon {
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .visual-content h3 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #000000;
        }

        .visual-content p {
            font-size: 1.1rem;
            opacity: 0.7;
            line-height: 1.6;
            color: #333333;
        }

        /* Form Side */
        .auth-form {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .form-header h2 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #ffffff;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        /* Form Fields */
        .auth-form-fields {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .form-input {
            padding: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-input:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        /* Checkbox */
        .checkbox-group {
            flex-direction: row !important;
            align-items: center;
            gap: 0;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .checkbox-input {
            display: none;
        }

        .checkbox-custom {
            width: 18px;
            height: 18px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            margin-right: 0.75rem;
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .checkbox-input:checked+.checkbox-custom {
            background: #ffffff;
            border-color: #ffffff;
        }

        .checkbox-input:checked+.checkbox-custom::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #000000;
            font-size: 12px;
            font-weight: bold;
        }

        /* Buttons */
        .btn-primary {
            background: #ffffff;
            color: #000000;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
        }

        .btn-secondary {
            background: transparent;
            color: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: block;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            text-decoration: none;
        }

        .btn-outline {
            background: transparent;
            color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            color: #ffffff;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .alert-error {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ff6b6b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .auth-card {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .auth-visual {
                display: none;
            }

            .auth-form {
                padding: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-header h2 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 480px) {
            .auth-container {
                padding: 1rem;
            }

            .auth-form {
                padding: 1.5rem;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }
        }

        /* Utility Classes */
        .d-none {
            display: none !important;
        }

        /* Animation for smooth transitions */
        .auth-container {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container">

        <!-- Background Effects -->
        <div class="bg-effects">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
            <div class="floating-shape shape-5"></div>
        </div>

        <!-- Sign in Start -->
        <div class="auth-container" id="signInBox">
            <div class="auth-card">
                <div class="auth-visual">
                    <div class="visual-content">
                        <div class="brand-icon">
                            <img src="Resources/img/black.ico" alt="">
                        </div>
                        <h3>Welcome Back</h3>
                        <p>Sign in to continue your journey with Horos</p>
                    </div>
                </div>

                <div class="auth-form">
                    <div class="form-header">
                        <h2>Sign In</h2>
                        <p>Enter your credentials to access your account</p>
                    </div>

                    <?php
                    $username = "";
                    $password = "";

                    if (isset($_COOKIE["username"])) {
                        $username = $_COOKIE["username"];
                    }

                    if (isset($_COOKIE["password"])) {
                        $password = $_COOKIE["password"];
                    }
                    ?>

                    <form class="auth-form-fields">
                        <div class="form-group">
                            <label for="un">Username</label>
                            <input type="text" id="un" class="form-input" placeholder="Enter your username">
                        </div>

                        <div class="form-group">
                            <label for="pw">Password</label>
                            <input type="password" id="pw" class="form-input" placeholder="Enter your password">
                        </div>

                        <div class="form-group checkbox-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="rm" class="checkbox-input">
                                <span class="checkbox-custom"></span>
                                Remember me
                            </label>
                        </div>

                        <div class="d-none" id="msgDiv2">
                            <div class="alert alert-error" id="msg2"></div>
                        </div>

                        <button type="button" class="btn-primary" onclick="signIn();">Sign In</button>

                        <a href="forgotPassword.php" class="btn-secondary">Forgot Password?</a>

                        <button type="button" class="btn-outline" onclick="changeView();">
                            New to Horos? Sign Up
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign in End -->

        <!-- Sign up Start -->
        <div class="auth-container d-none" id="signUpBox">
            <div class="auth-card signup-card">
                <div class="auth-visual">
                    <div class="visual-content">
                        <div class="brand-icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <h3>Join Horos</h3>
                        <p>Create your account and start your beauty journey</p>
                    </div>
                </div>

                <div class="auth-form">
                    <div class="form-header">
                        <h2>Sign Up</h2>
                        <p>Create your account to get started</p>
                    </div>

                    <form class="auth-form-fields">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" class="form-input" placeholder="John">
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-input" placeholder="Doe">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-input" placeholder="john@example.com">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" id="mobile" class="form-input" placeholder="07********">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-input" placeholder="@johndoe">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-input" placeholder="Create a strong password">
                        </div>

                        <div class="d-none" id="msgDiv1">
                            <div class="alert alert-error" id="msg1"></div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-primary" onclick="signUp();">Create Account</button>
                            <button type="button" class="btn-outline" onclick="changeView();">
                                Already have an account? Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign up End -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="modern-auth.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>