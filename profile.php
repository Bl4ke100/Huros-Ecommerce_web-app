<?php

include "connection.php";

session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="modern-profile.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Horos | My Account</title>
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    </head>

    <body class="modern-profile-body">

        <style>
            /* modern-profile.css */

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

            body.modern-profile-body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: var(--gradient-primary);
                color: var(--pure-white);
                line-height: 1.6;
                overflow-x: hidden;
                min-height: 100vh;
            }

            /* Background Effects */
            .bg-effects-profile {
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
                animation: float 25s infinite linear;
            }

            .shape-1 {
                width: 120px;
                height: 120px;
                top: 15%;
                left: 10%;
                animation-delay: 0s;
            }

            .shape-2 {
                width: 80px;
                height: 80px;
                top: 70%;
                right: 15%;
                animation-delay: 8s;
            }

            .shape-3 {
                width: 100px;
                height: 100px;
                bottom: 20%;
                left: 20%;
                animation-delay: 15s;
            }

            .shape-4 {
                width: 60px;
                height: 60px;
                top: 30%;
                right: 30%;
                animation-delay: 20s;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) rotate(0deg);
                    opacity: 0.1;
                }

                50% {
                    transform: translateY(-20px) rotate(180deg);
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

            /* Profile Wrapper */
            .profile-wrapper {
                padding: 6rem 0 4rem;
                min-height: 100vh;
            }

            /* Profile Header */
            .profile-header {
                text-align: center;
                margin-bottom: 4rem;
            }

            .profile-badge {
                display: inline-block;
                padding: 0.5rem 1.5rem;
                background: var(--pure-white);
                color: var(--primary-black);
                border-radius: 50px;
                font-size: 0.85rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 1.5rem;
            }

            .profile-title {
                font-size: 3rem;
                font-weight: 800;
                margin-bottom: 1rem;
                color: var(--pure-white);
            }

            .profile-subtitle {
                font-size: 1.1rem;
                color: rgba(255, 255, 255, 0.7);
                max-width: 600px;
                margin: 0 auto;
            }

            /* Profile Content */
            .profile-content {
                display: grid;
                grid-template-columns: 350px 1fr;
                gap: 4rem;
                align-items: start;
            }

            /* Profile Image Section */
            .profile-image-section {
                position: sticky;
                top: 2rem;
            }

            .image-container {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                padding: 2rem;
                backdrop-filter: blur(20px);
                margin-bottom: 2rem;
            }

            .profile-image-wrapper {
                position: relative;
                width: 200px;
                height: 200px;
                margin: 0 auto 2rem;
                border-radius: 50%;
                overflow: hidden;
                border: 4px solid rgba(255, 255, 255, 0.1);
                transition: var(--transition-normal);
            }

            .profile-image-wrapper:hover {
                border-color: rgba(255, 255, 255, 0.3);
                transform: scale(1.02);
            }

            .profile-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: var(--transition-normal);
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
                cursor: pointer;
            }

            .profile-image-wrapper:hover .image-overlay {
                opacity: 1;
            }

            .overlay-icon {
                color: var(--pure-white);
            }

            .upload-info {
                text-align: center;
                margin-bottom: 1.5rem;
            }

            .upload-title {
                font-size: 1.1rem;
                font-weight: 600;
                color: var(--pure-white);
                margin-bottom: 0.5rem;
            }

            .upload-description {
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.7);
            }

            .upload-controls {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .file-input {
                display: none;
            }

            .file-label {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                padding: 0.875rem 1.5rem;
                background: transparent;
                border: 2px dashed rgba(255, 255, 255, 0.3);
                border-radius: var(--border-radius-md);
                color: var(--pure-white);
                cursor: pointer;
                transition: var(--transition-normal);
                font-size: 0.9rem;
                font-weight: 500;
            }

            .file-label:hover {
                border-color: var(--pure-white);
                background: rgba(255, 255, 255, 0.05);
            }

            .upload-btn {
                background: var(--pure-white);
                color: var(--primary-black);
                border: none;
                padding: 0.875rem 1.5rem;
                border-radius: var(--border-radius-md);
                font-size: 0.9rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
            }

            .upload-btn:hover {
                background: var(--gray-100);
                transform: translateY(-2px);
            }

            .signOut-btn {
                background:rgb(240, 72, 72);
                color: white;
                border: none;
                padding: 0.875rem 1.5rem;
                border-radius: var(--border-radius-md);
                font-size: 0.9rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
            }

            .signOut-btn:hover {
                background: rgb(243, 27, 27);
                transform: translateY(-2px);
            }

            /* User Stats */
            .user-stats {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .stat-item {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 1rem;
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-md);
                backdrop-filter: blur(10px);
            }

            .stat-icon {
                width: 40px;
                height: 40px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--pure-white);
            }

            .stat-label {
                font-size: 0.8rem;
                color: rgba(255, 255, 255, 0.7);
                margin-bottom: 0.25rem;
            }

            .stat-value {
                font-size: 0.9rem;
                font-weight: 600;
                color: var(--pure-white);
            }

            /* Profile Form Section */
            .profile-form-section {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: var(--border-radius-xl);
                backdrop-filter: blur(20px);
                overflow: hidden;
            }

            .form-container {
                padding: 3rem;
            }

            .form-header {
                margin-bottom: 3rem;
            }

            .form-title {
                font-size: 2rem;
                font-weight: 700;
                color: var(--pure-white);
                margin-bottom: 0.5rem;
            }

            .form-subtitle {
                font-size: 1rem;
                color: rgba(255, 255, 255, 0.7);
            }

            /* Form Sections */
            .form-section {
                margin-bottom: 3rem;
                padding-bottom: 2rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .form-section:last-of-type {
                border-bottom: none;
                margin-bottom: 2rem;
            }

            .section-title {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                font-size: 1.25rem;
                font-weight: 600;
                color: var(--pure-white);
                margin-bottom: 2rem;
            }

            /* Form Elements */
            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .address-grid {
                grid-template-columns: 120px 1fr;
            }

            .address-line {
                grid-column: span 1;
            }

            .form-group {
                display: flex;
                flex-direction: column;
            }

            .form-label {
                font-size: 0.9rem;
                font-weight: 500;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 0.5rem;
            }

            .form-input {
                width: 100%;
                padding: 1rem 1.25rem;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: var(--border-radius-md);
                color: var(--pure-white);
                font-size: 1rem;
                transition: var(--transition-normal);
                font-family: inherit;
            }

            .form-input:focus {
                outline: none;
                border-color: var(--pure-white);
                background: rgba(255, 255, 255, 0.08);
                box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
            }

            .form-input::placeholder {
                color: rgba(255, 255, 255, 0.5);
            }

            .form-input.disabled {
                background: rgba(255, 255, 255, 0.02);
                border-color: rgba(255, 255, 255, 0.1);
                color: rgba(255, 255, 255, 0.6);
                cursor: not-allowed;
            }

            .input-helper {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                margin-top: 0.5rem;
                font-size: 0.8rem;
                color: rgba(255, 255, 255, 0.6);
            }

            .input-helper svg {
                opacity: 0.7;
            }

            /* Password Wrapper */
            .password-wrapper {
                position: relative;
                display: flex;
                align-items: center;
            }

            .password-wrapper .form-input {
                padding-right: 3rem;
            }

            .password-toggle {
                position: absolute;
                right: 1rem;
                background: transparent;
                border: none;
                color: rgba(255, 255, 255, 0.6);
                cursor: pointer;
                padding: 0.25rem;
                border-radius: 4px;
                transition: var(--transition-normal);
            }

            .password-toggle:hover {
                color: var(--pure-white);
                background: rgba(255, 255, 255, 0.1);
            }

            /* Form Actions */
            .form-actions {
                display: flex;
                gap: 1rem;
                padding-top: 2rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .btn-update {
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
                flex: 1;
                justify-content: center;
            }

            .btn-update:hover {
                background: var(--gray-100);
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }

            .btn-cancel {
                background: transparent;
                color: var(--pure-white);
                border: 2px solid rgba(255, 255, 255, 0.3);
                padding: 1rem 2rem;
                border-radius: var(--border-radius-md);
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: var(--transition-normal);
                display: flex;
                align-items: center;
                gap: 0.5rem;
                justify-content: center;
            }

            .btn-cancel:hover {
                background: rgba(255, 255, 255, 0.1);
                border-color: rgba(255, 255, 255, 0.5);
            }

            /* Responsive Design */
            @media (max-width: 1200px) {
                .profile-content {
                    grid-template-columns: 320px 1fr;
                    gap: 3rem;
                }

                .profile-image-wrapper {
                    width: 160px;
                    height: 160px;
                }
            }

            @media (max-width: 968px) {
                .container {
                    padding: 0 1.5rem;
                }

                .profile-content {
                    grid-template-columns: 1fr;
                    gap: 3rem;
                }

                .profile-image-section {
                    position: static;
                }

                .image-container {
                    display: grid;
                    grid-template-columns: auto 1fr auto;
                    gap: 2rem;
                    align-items: center;
                    padding: 2rem;
                }

                .profile-image-wrapper {
                    width: 120px;
                    height: 120px;
                    margin: 0;
                }

                .upload-info {
                    text-align: left;
                    margin-bottom: 0;
                }

                .upload-controls {
                    flex-direction: row;
                }

                .user-stats {
                    grid-column: 1 / 4;
                    flex-direction: row;
                    margin-top: 1rem;
                }

                .form-grid {
                    grid-template-columns: 1fr;
                }

                .address-grid {
                    grid-template-columns: 1fr;
                }

                .form-actions {
                    flex-direction: column;
                }
            }

            @media (max-width: 768px) {
                .container {
                    padding: 0 1rem;
                }

                .profile-wrapper {
                    padding: 4rem 0 2rem;
                }

                .profile-title {
                    font-size: 2.5rem;
                }

                .form-container {
                    padding: 2rem;
                }

                .image-container {
                    grid-template-columns: 1fr;
                    text-align: center;
                    gap: 1.5rem;
                }

                .upload-info {
                    text-align: center;
                }

                .upload-controls {
                    flex-direction: column;
                }

                .user-stats {
                    flex-direction: column;
                }

                .profile-image-wrapper {
                    width: 140px;
                    height: 140px;
                    margin: 0 auto;
                }
            }

            @media (max-width: 480px) {
                .profile-badge {
                    padding: 0.4rem 1rem;
                    font-size: 0.8rem;
                }

                .profile-title {
                    font-size: 2rem;
                }

                .form-container {
                    padding: 1.5rem;
                }

                .section-title {
                    font-size: 1.1rem;
                }

                .form-input {
                    padding: 0.875rem 1rem;
                }
            }

            /* Loading Animation */
            .modern-profile-body {
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

            /* Custom Scrollbar */
            .profile-form-section::-webkit-scrollbar {
                width: 8px;
            }

            .profile-form-section::-webkit-scrollbar-track {
                background: rgba(255, 255, 255, 0.1);
                border-radius: 4px;
            }

            .profile-form-section::-webkit-scrollbar-thumb {
                background: rgba(255, 255, 255, 0.3);
                border-radius: 4px;
            }

            .profile-form-section::-webkit-scrollbar-thumb:hover {
                background: rgba(255, 255, 255, 0.5);
            }
        </style>

        <!-- Background Effects -->
        <div class="bg-effects-profile">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
        </div>

        <!-- Navbar -->
        <?php include "homeNav.php"; ?>

        <!-- Profile Section -->
        <div class="profile-wrapper">
            <div class="container">
                <div class="profile-header">
                    <div class="profile-badge">My Account</div>
                    <h1 class="profile-title">Personal Profile</h1>
                    <p class="profile-subtitle">Manage your account information and preferences</p>
                </div>

                <div class="profile-content">
                    <!-- Profile Image Section -->
                    <div class="profile-image-section">
                        <div class="image-container">
                            <div class="profile-image-wrapper">
                                <img src="<?php
                                            if (!empty($d["img_path"])) {
                                                echo $d["img_path"];
                                            } else {
                                                echo ("Resources/img/profile.png");
                                            }
                                            ?>" id="i" class="profile-image" alt="Profile Picture">
                                <div class="image-overlay">
                                    <div class="overlay-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                                            <circle cx="12" cy="13" r="4" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="image-upload-section">
                            <div class="upload-info">
                                <h3 class="upload-title">Profile Photo</h3>
                                <p class="upload-description">Upload a professional photo that represents you</p>
                            </div>

                            <div class="upload-controls">
                                <input type="file" id="imgUploader" class="file-input" accept="image/*">
                                <label for="imgUploader" class="file-label">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                        <polyline points="14,2 14,8 20,8" />
                                        <line x1="16" y1="13" x2="8" y2="13" />
                                        <line x1="12" y1="17" x2="12" y2="9" />
                                    </svg>
                                    Choose Photo
                                </label>
                                <button class="upload-btn" onclick="uploadImg();">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <polyline points="7,10 12,15 17,10" />
                                        <line x1="12" y1="15" x2="12" y2="3" />
                                    </svg>
                                    Upload
                                </button>
                                <button class="upload-btn" onclick="window.location.href='orderHistory.php';">
            
                                    Order History
                                </button>
                                <button class="signOut-btn" onclick="signOut(); window.location.href='index.php';">
                                    
                                    Sign Out
                                </button>
                            </div>
                        </div>

                    </div>

                    <!-- Profile Form Section -->
                    <div class="profile-form-section">
                        <div class="form-container">
                            <div class="form-header">
                                <h2 class="form-title">Account Information</h2>
                                <p class="form-subtitle">Keep your profile information up to date</p>
                            </div>

                            <form class="profile-form">
                                <!-- Personal Information -->
                                <div class="form-section">
                                    <h3 class="section-title">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                        Personal Information
                                    </h3>

                                    <div class="form-grid">
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-input" value="<?php echo $d["fname"]; ?>" id="fname" placeholder="Enter your first name">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-input" value="<?php echo $d["lname"]; ?>" id="lname" placeholder="Enter your last name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-input" value="<?php echo $d["email"]; ?>" id="email" placeholder="Enter your email">
                                        <div class="input-helper">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                                <polyline points="22,6 12,13 2,6" />
                                            </svg>
                                            <span>We'll never share your email with anyone else</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-input" value="<?php echo $d["mobile"]; ?>" id="mobile" placeholder="Enter your mobile number">
                                    </div>
                                </div>

                                <!-- Account Credentials -->
                                <div class="form-section">
                                    <h3 class="section-title">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                            <circle cx="12" cy="16" r="1" />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                        Account Credentials
                                    </h3>

                                    <div class="form-grid">
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-input disabled" value="<?php echo $d["username"]; ?>" disabled>
                                            <div class="input-helper">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <line x1="12" y1="8" x2="12" y2="12" />
                                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                                </svg>
                                                <span>Username cannot be changed</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <div class="password-wrapper">
                                                <input type="password" class="form-input" value="<?php echo $d["password"]; ?>" id="pw" placeholder="Enter your password">
                                                <button type="button" class="password-toggle" onclick="togglePasswordVisibility()">
                                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Shipping Information -->
                                <div class="form-section">
                                    <h3 class="section-title">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                            <polyline points="9,22 9,12 15,12 15,22" />
                                        </svg>
                                        Shipping Information
                                    </h3>

                                    <div class="form-grid address-grid">
                                        <div class="form-group">
                                            <label class="form-label">House No.</label>
                                            <input type="text" class="form-input" id="no" value="<?php echo $d["no"]; ?>" placeholder="No.">
                                        </div>

                                        <div class="form-group address-line">
                                            <label class="form-label">Address Line 1</label>
                                            <input type="text" class="form-input" id="line1" value="<?php echo $d["line_1"]; ?>" placeholder="Street address, P.O. box">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Address Line 2</label>
                                        <input type="text" class="form-input" id="line2" value="<?php echo $d["line_2"]; ?>" placeholder="Apartment, suite, unit, building, floor, etc.">
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="form-actions">
                                    <button type="button" class="btn-update" onclick="updateData();">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z" />
                                        </svg>
                                        Update Profile
                                    </button>

                                    <button type="button" class="btn-cancel" onclick="resetForm();">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        </svg>
                                        Reset Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "homeFooter.php"; ?>

        <script src="bootstrap.bundle.min.js"></script>
        <script src="modern-profile.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>
<?php

} else {
    header("location: signin.php");
}

?>