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
        <link rel="stylesheet" href="styles/profile.css">
        <link rel="stylesheet" href="modern-profile.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Horos | My Account</title>
        <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    </head>

    <body class="modern-profile-body">

        <?php include "homeNav.php"; ?>

        <div class="profile-wrapper">
            <div class="container">

                <div class="profile-content">
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

                    <div class="profile-form-section">
                        <div class="form-container">
                            <div class="form-header">
                                <h2 class="form-title">Account Information</h2>
                                <p class="form-subtitle">Keep your profile information up to date</p>
                            </div>

                            <form class="profile-form">
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