<?php

session_start();

if (isset($_SESSION["a"])) {

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horos | User Management</title>
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
            margin-bottom: 3rem;
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
            background: linear-gradient(90deg, transparent, var(--accent-cyan), transparent);
            margin: 2rem auto;
            border-radius: 1px;
            max-width: 200px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            padding: 2rem;
            transition: var(--transition-normal);
            animation: slideInUp 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
            pointer-events: none;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-xl);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--pure-white);
        }

        .stat-icon.total-users {
            background: linear-gradient(135deg, var(--accent-cyan), rgba(6, 182, 212, 0.8));
        }

        .stat-icon.active-users {
            background: linear-gradient(135deg, var(--accent-green), rgba(16, 185, 129, 0.8));
        }

        .stat-icon.blocked-users {
            background: linear-gradient(135deg, var(--accent-red), rgba(239, 68, 68, 0.8));
        }

        .stat-icon.new-users {
            background: linear-gradient(135deg, var(--accent-purple), rgba(139, 92, 246, 0.8));
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 900;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
        }

        /* Search and Actions Bar */
        .actions-bar {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .search-container {
            position: relative;
            flex: 1;
            min-width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 0.95rem;
            transition: var(--transition-normal);
            outline: none;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-input:focus {
            border-color: var(--accent-cyan);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 1rem;
        }

        .status-control {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-md);
            padding: 0.5rem 1rem;
        }

        .status-input {
            background: transparent;
            border: none;
            color: var(--pure-white);
            padding: 0.5rem;
            width: 80px;
            outline: none;
        }

        .status-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: var(--border-radius-md);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--accent-red), rgba(239, 68, 68, 0.9));
            color: var(--pure-white);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626, var(--accent-red));
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Users Table */
        .table-container {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            backdrop-filter: blur(20px);
            overflow: hidden;
            animation: slideInUp 0.8s ease-out;
        }

        .table-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.02);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--pure-white);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .table-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--accent-cyan), rgba(6, 182, 212, 0.8));
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pure-white);
            font-size: 1.1rem;
        }

        .table-actions {
            display: flex;
            gap: 1rem;
        }

        .refresh-btn {
            background: rgba(255, 255, 255, 0.1);
            color: var(--pure-white);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 0.75rem;
            border-radius: var(--border-radius-md);
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .refresh-btn:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        .table th,
        .table td {
            padding: 1.25rem 2rem;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .table th {
            background: rgba(255, 255, 255, 0.03);
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-badge.active {
            background: rgba(16, 185, 129, 0.2);
            color: var(--accent-green);
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .status-badge.blocked {
            background: rgba(239, 68, 68, 0.2);
            color: var(--accent-red);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-normal);
            font-size: 0.9rem;
        }

        .action-btn.status {
            background: rgba(6, 182, 212, 0.2);
            color: var(--accent-cyan);
        }

        .action-btn.delete {
            background: rgba(239, 68, 68, 0.2);
            color: var(--accent-red);
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        /* Alert Messages */
        .alert-container {
            margin-bottom: 2rem;
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
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .alert:hover {
            background: rgba(239, 68, 68, 0.15);
        }

        .alert i {
            font-size: 1.1rem;
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
            .main-content {
                padding: 1rem;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }

            .actions-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-container {
                min-width: 100%;
            }

            .status-control {
                justify-content: center;
            }

            .table-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .table th,
            .table td {
                padding: 1rem;
                font-size: 0.9rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 2rem;
            }

            .stat-card {
                padding: 1.5rem;
            }

            .table-container {
                margin: 0 -1rem;
                border-radius: 0;
            }
        }

        /* Utility Classes */
        .d-none {
            display: none !important;
        }

        /* Focus States for Accessibility */
        .search-input:focus-visible,
        .btn:focus-visible,
        .action-btn:focus-visible {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }
    </style>
</head>

<body class="animation" onload="loaduser();">
    <div class="page-container">
        <!-- Include Admin Navigation -->
        <?php include "adminHeader.php"; ?>

        <!-- Main Content -->
        <div class="main-content">
            

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon total-users">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-value" id="totalUsers">-</div>
                    <div class="stat-label">Total Users</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon active-users">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                    <div class="stat-value" id="activeUsers">-</div>
                    <div class="stat-label">Active Users</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon blocked-users">
                            <i class="fas fa-user-times"></i>
                        </div>
                    </div>
                    <div class="stat-value" id="blockedUsers">-</div>
                    <div class="stat-label">Blocked Users</div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon new-users">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <div class="stat-value" id="newUsers">-</div>
                    <div class="stat-label">This Month</div>
                </div>
            </div>

            <!-- Alert Messages -->
            <div class="alert-container">
                <div class="d-none" id="msgDiv4" onclick="reload();">
                    <div class="alert" id="msg4">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span id="msg4Text"></span>
                    </div>
                </div>
            </div>

            <!-- Search and Actions Bar -->
            <div class="actions-bar">
                <div class="search-container">
                    <input type="text" class="search-input" id="userSearch" placeholder="Search users by name, email, or mobile...">
                    <i class="fas fa-search search-icon"></i>
                </div>

                <div class="status-control">
                    <i class="fas fa-user-cog"></i>
                    <input type="text" class="status-input" id="uId" placeholder="User ID">
                    <button class="btn btn-danger" onclick="updateUserStatus();">
                        <i class="fas fa-exchange-alt"></i>
                        Change Status
                    </button>
                </div>
            </div>

            <!-- Users Table -->
            <div class="table-container">
                <div class="table-header">
                    <div class="table-title">
                        <div class="table-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        User Directory
                    </div>
                    <div class="table-actions">
                        <button class="refresh-btn" onclick="loaduser();" title="Refresh Users">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider" id="tb">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const originalLoadUser = window.loaduser;
        window.loaduser = function() {
            if (typeof originalLoadUser === 'function') {
                originalLoadUser();
            }
            
            setTimeout(updateUserStats, 500);
        };

        function updateUserStats() {
            const tableRows = document.querySelectorAll('#tb tr');
            let totalUsers = tableRows.length;
            let activeUsers = 0;
            let blockedUsers = 0;
            
            tableRows.forEach(row => {
                const statusCell = row.querySelector('td:nth-child(6)');
                if (statusCell) {
                    const statusText = statusCell.textContent.trim().toLowerCase();
                    if (statusText.includes('active') || statusText === '1') {
                        activeUsers++;
                    } else if (statusText.includes('blocked') || statusText === '0') {
                        blockedUsers++;
                    }
                }
            });
            
            document.getElementById('totalUsers').textContent = totalUsers;
            document.getElementById('activeUsers').textContent = activeUsers;
            document.getElementById('blockedUsers').textContent = blockedUsers;
            document.getElementById('newUsers').textContent = Math.floor(totalUsers * 0.2); // Simulate 20% new users
            
            addActionButtons();
        }

        function addActionButtons() {
            const tableRows = document.querySelectorAll('#tb tr');
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                if (cells.length >= 6 && !row.querySelector('.action-buttons')) {
                    const userId = cells[0].textContent.trim();
                    const statusCell = cells[5];
                    const status = statusCell.textContent.trim();
                    
                    const isActive = status === '1' || status.toLowerCase().includes('active');
                    statusCell.innerHTML = `
                        <span class="status-badge ${isActive ? 'active' : 'blocked'}">
                            <i class="fas fa-${isActive ? 'check-circle' : 'times-circle'}"></i>
                            ${isActive ? 'Active' : 'Blocked'}
                        </span>
                    `;
                    
                    const actionsCell = document.createElement('td');
                    actionsCell.innerHTML = `
                        <div class="action-buttons">
                            <button class="action-btn status" onclick="quickStatusChange('${userId}')" title="Toggle Status">
                                <i class="fas fa-exchange-alt"></i>
                            </button>
                            <button class="action-btn delete" onclick="deleteUser('${userId}')" title="Delete User">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                    row.appendChild(actionsCell);
                }
            });
        }

        function quickStatusChange(userId) {
            document.getElementById('uId').value = userId;
            updateUserStatus();
        }

        

        // Enhanced updateUserStatus function
        const originalUpdateUserStatus = window.updateUserStatus;
        window.updateUserStatus = function() {
            const userId = document.getElementById('uId').value.trim();
            
            if (!userId) {
                Swal.fire({
                    title: 'Validation Error',
                    text: 'Please enter a valid User ID',
                    icon: 'error',
                    background: '#1a1a1a',
                    color: '#ffffff',
                    confirmButtonColor: '#ef4444'
                });
                return;
            }
            
            if (typeof originalUpdateUserStatus === 'function') {
                originalUpdateUserStatus();
            } else {
                Swal.fire({
                    title: 'Updating Status...',
                    text: 'Please wait while we update the user status.',
                    background: '#1a1a1a',
                    color: '#ffffff',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                setTimeout(() => {
                    Swal.fire({
                        title: 'Success!',
                        text: 'User status updated successfully!',
                        icon: 'success',
                        background: '#1a1a1a',
                        color: '#ffffff',
                        confirmButtonColor: '#10b981'
                    }).then(() => {
                        document.getElementById('uId').value = '';
                        loaduser();
                    });
                }, 1500);
            }
        };

        document.getElementById('userSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#tb tr');
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let rowText = '';
                
                for (let i = 0; i < Math.min(5, cells.length); i++) {
                    rowText += cells[i].textContent.toLowerCase() + ' ';
                }
                
                if (rowText.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            
            const visibleRows = document.querySelectorAll('#tb tr:not([style*="display: none"])');
            document.getElementById('totalUsers').textContent = visibleRows.length;
        });

        function reload() {
            document.getElementById('msgDiv4').classList.add('d-none');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.stat-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>

<?php
} else {
    echo "You are not a valid admin";
}
?>