<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #fff;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #000;
            color: #ffc107;
            position: fixed;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            padding: 11px;
        }

        .sidebar li a {
            color: #ffc107;
            text-decoration: none;
            font-family: monospace;
        }

        .sidebar li a:hover {
            color: #fff;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
            color: #000;
        }

        .section-divider {
            margin-top: 5px;
            border-top: 1px solid #ffc107;
        }

        .sidebar-header {
            padding: 20px;
            background-color: #ffc107;
            text-align: center;
        }

        .sidebar-header h2 {
            margin: 0;
            font-size: 20px;
            color: #000;
            font-family: monospace;
        }

        header {
            padding: 10px;
            height: 30px;
            background-color: #000;
            color: #ffc107;
            text-align: right;
            font-family: monospace;
            position: relative;
        }

        .logo-container {
            display: flex;
            align-items: center;
    
        }
        .logo-text {
            font-size: 18px;
            color: #ffc107;
            font-family: monospace, sans-serif;
            margin-left: 50px;
        }

        .user-label {
            font-size: 14px;
            margin-right: 20px;
        }
        
        .user-icon {
            margin-right: 5px;
        }

        .sidebar li i {
            margin-right: 10px;
        }

        .logo {
            position: absolute;
            top: 0;
            left: 0;
            height: 35px;
            padding: 10px;
        }

    </style>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="<?php echo base_url();?>assets/logo.png" alt="Logo" class="logo">
        <span class="logo-text">Zenco Footstep</span>
    </div>
    <span class="user-label"><i class="fas fa-user user-icon"></i>User: Admin</span>
</header>

    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Navigation</h2>
        </div>
        <ul>
            <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
            <div class="section-divider"></div>
            <li><a href="#"><i class="fas fa-shopping-cart"></i>Checkout Management</a></li>
            <li><a href="#"><i class="fas fa-file-invoice"></i>Accounting Management</a></li>
            <li><a href="#"><i class="fas fa-box"></i>Inventory Management</a></li>
            <li><a href="#"><i class="fas fa-users"></i>Human Resource Management</a></li>
            <div class="section-divider"></div>
            <li><a href="#"><i class="fas fa-chart-bar"></i>Data Analytics</a></li>
            <div class="section-divider"></div>
            <li><a href="#"><i class="fas fa-cog"></i>Settings</a></li>
            <div class="section-divider"></div>
        </ul>
    </div>


</body>
</html>
