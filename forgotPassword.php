<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celeste | Forgot Password</title>
    <link rel="stylesheet" href="styles.css">
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

        /* Forgot Password Specific Styles */
        .forgot-password-card {
            max-width: 1000px;
        }

        .recovery-steps {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 1rem;
            opacity: 0.8;
        }

        .step-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.2);
            color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .step span {
            font-size: 0.9rem;
            color: #333333;
        }

        .input-helper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .input-helper svg {
            opacity: 0.7;
        }

        .security-note {
            margin-top: 2rem;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.02);
            display: flex;
            gap: 1rem;
        }

        .security-icon {
            color: rgba(255, 255, 255, 0.8);
            flex-shrink: 0;
        }

        .security-text strong {
            color: #ffffff;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 0.25rem;
        }

        .security-text p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
            margin: 0;
            line-height: 1.4;
        }

        /* Button with icons */
        .btn-primary svg,
        .btn-outline svg {
            margin-right: 0.5rem;
        }

        .btn-primary {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-outline {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        /* Enhanced alert styles for forgot password */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            border: 1px solid rgba(40, 167, 69, 0.3);
            color: #28a745;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #dc3545;
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

            .recovery-steps {
                flex-direction: column;
                gap: 0.75rem;
            }

            .security-note {
                padding: 1rem;
                flex-direction: column;
                gap: 0.75rem;
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

        /* SweetAlert2 Custom Styling */
        .swal2-popup {
            background: rgba(0, 0, 0, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-radius: 16px !important;
            backdrop-filter: blur(20px) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5) !important;
            color: #ffffff !important;
            font-family: 'Inter', sans-serif !important;
        }

        .swal2-title {
            color: #ffffff !important;
            font-size: 1.5rem !important;
            font-weight: 600 !important;
            margin-bottom: 1rem !important;
        }

        .swal2-html-container {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 1rem !important;
            line-height: 1.5 !important;
        }

        .swal2-confirm {
            background: #ffffff !important;
            color: #000000 !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 0.75rem 2rem !important;
            font-weight: 600 !important;
            font-size: 0.95rem !important;
            transition: all 0.3s ease !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
        }

        .swal2-confirm:hover {
            background: rgba(255, 255, 255, 0.9) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.3) !important;
        }

        .swal2-cancel {
            background: transparent !important;
            color: rgba(255, 255, 255, 0.8) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 8px !important;
            padding: 0.75rem 2rem !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
        }

        .swal2-cancel:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
            color: #ffffff !important;
        }

        .swal2-icon {
            border: none !important;
            margin: 1.5rem auto 1rem !important;
        }

        .swal2-icon.swal2-success {
            border-color: #ffffff !important;
            color: #ffffff !important;
        }

        .swal2-icon.swal2-success .swal2-success-ring {
            border-color: rgba(255, 255, 255, 0.3) !important;
        }

        .swal2-icon.swal2-success .swal2-success-fix {
            background-color: rgba(0, 0, 0, 0.95) !important;
        }

        .swal2-icon.swal2-success [class^='swal2-success-line'] {
            background-color: #ffffff !important;
        }

        .swal2-icon.swal2-error {
            border-color: #ff4757 !important;
            color: #ff4757 !important;
        }

        .swal2-icon.swal2-error .swal2-x-mark {
            color: #ff4757 !important;
        }

        .swal2-icon.swal2-warning {
            border-color: #ffa502 !important;
            color: #ffa502 !important;
        }

        .swal2-icon.swal2-info {
            border-color: #3742fa !important;
            color: #3742fa !important;
        }

        .swal2-icon.swal2-question {
            border-color: #ffffff !important;
            color: #ffffff !important;
        }

        /* SweetAlert2 backdrop */
        .swal2-container {
            backdrop-filter: blur(5px) !important;
        }

        .swal2-backdrop-show {
            background: rgba(0, 0, 0, 0.8) !important;
        }

        /* SweetAlert2 animations */
        .swal2-show {
            animation: swal2SlideInUp 0.4s ease-out !important;
        }

        .swal2-hide {
            animation: swal2SlideOutDown 0.3s ease-in !important;
        }

        @keyframes swal2SlideInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 50px, 0) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0) scale(1);
            }
        }

        @keyframes swal2SlideOutDown {
            from {
                opacity: 1;
                transform: translate3d(0, 0, 0) scale(1);
            }

            to {
                opacity: 0;
                transform: translate3d(0, 30px, 0) scale(0.95);
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

        <!-- Forgot Password Start -->
        <div class="auth-container" id="signInBox">
            <div class="auth-card forgot-password-card">
                <div class="auth-visual">
                    <div class="visual-content">
                        <div class="brand-icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <circle cx="12" cy="16" r="1" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                        </div>
                        <h3>Password Recovery</h3>
                        <p>Don't worry, we'll help you get back into your account securely</p>

                        <div class="recovery-steps">
                            <div class="step">
                                <div class="step-number">1</div>
                                <span>Enter your email</span>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <span>Check your inbox</span>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <span>Reset password</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="auth-form">
                    <div class="form-header">
                        <h2>Forgot Password</h2>
                        <p>Enter your email address and we'll send you a link to reset your password</p>
                    </div>

                    <form class="auth-form-fields">
                        <div class="form-group">
                            <label for="e">Email Address</label>
                            <input type="email" id="e" class="form-input" placeholder="Enter your registered email">
                            <div class="input-helper">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                                <span>We'll send reset instructions to this email</span>
                            </div>
                        </div>

                        <div class="d-none" id="msgDiv">
                            <div class="alert" id="msg"></div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-primary" onclick="forgotPassword();">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 12h-20" />
                                    <path d="M15 5l7 7-7 7" />
                                </svg>
                                Send Reset Link
                            </button>

                            <a href="signin.php" class="btn-outline">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M19 12H5" />
                                    <path d="M12 19l-7-7 7-7" />
                                </svg>
                                Back to Sign In
                            </a>
                        </div>
                    </form>

                    <div class="security-note">
                        <div class="security-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                <path d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        <div class="security-text">
                            <strong>Secure & Private</strong>
                            <p>Your account security is our priority. The reset link will expire in 24 hours.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Forgot Password End -->

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="modern-auth.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>