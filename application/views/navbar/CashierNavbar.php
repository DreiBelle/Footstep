<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #fff;
            font-family: "Poppins", Arial, sans-serif; /* Updated font-family */
        }
        .sidebar {
            height: 100vh;
            width: 290px;
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
            font-family: "Poppins", monospace;
        }

        .sidebar li a:hover {
            color: #fff;
        }

        .content {
            margin-left: 290px; /* Adjusted to match sidebar width */
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
            font-family: "Poppins", monospace;
        }

        header {
            padding: 10px;
            height: 65px; /* Increased height to accommodate the logo */
            background-color: #000;
            color: #ffc107;
            display: flex; /* Added to enable aligning items */
            justify-content: space-between; /* Added to align items */
            font-family: "Poppins", monospace;
            position: relative;
            align-items: center; /* Center align items vertically */
        }

        .logo-container {
            display: flex;
            align-items: center;
        }
        .logo-text {
            font-size: 20px; /* Increased font size */
            color: #ffc107;
            font-family: "Poppins", monospace, sans-serif;
            margin-left: 10px; /* Adjusted margin for better alignment */
        }

        .user-label {
            font-size: 14px;
            margin-right: 5px; /* Adjusted margin for better alignment */
            display: flex; /* Added to enable aligning items */
            align-items: center; /* Added to align items */
        }

        .user-icon {
            margin-right: 3px; /* Adjusted margin for better alignment */
        }

        .sidebar li i {
            margin-right: 10px;
        }

        .logo {
            position: absolute;
            top: -10px;
            left: 10px;
            height: 85px; /* Increased height for a bigger logo */
            padding: 10px;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 280px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: #ffc107;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #444;
        }

    </style>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="<?php echo base_url();?>assets/logo.png" alt="Logo" class="logo">
        <!-- <span class="logo-text">ZENCO FOOTSTEP</span> -->
    </div>
    <span class="user-label"><i class="fas fa-user user-icon"></i>User: <?php echo $user['role']; ?></span>
</header>

<div class="sidebar">
    <div class="sidebar-header">
        <h2>Checkout Management</h2>
    </div>
    <ul>
        <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
        <div class="section-divider"></div>
        <li class="dropdown">
            <a href="#"><i class="fas fa-money-bill"></i>Payments</a>
            <div class="dropdown-content">
                <a href="#"><i class="fas fa-plus"></i>Add Payment</a>
                <a href="#"><i class="fas fa-eye"></i>View Payment</a>
                <a href="#"><i class="fas fa-edit"></i>Edit Payment</a>
                <a href="#"><i class="fas fa-trash"></i>Delete Payment</a>
            </div>
        </li>
        <div class="section-divider"></div>
        <li><a href="<?php echo site_url('Dashboard/Logout'); ?>"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
</div>

</body>
</html>
