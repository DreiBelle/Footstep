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
            font-family: "Poppins", Arial, sans-serif;
        }

        .content {
            margin-left: 290px;
            padding: 20px;
            color: #000;
            margin-top: 80px;
        }

        .sidebar {
            height: calc(100vh - 80px);
            width: 290px;
            background-color: #000;
            color: #ffc107;
            position: fixed;
            top: 80px;
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
            height: 80px;
            background-color: #000;
            color: #ffc107;
            display: flex;
            justify-content: space-between;
            font-family: "Poppins", monospace;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            
        }

        .logo-text {
            font-size: 20px;
            color: #ffc107;
            font-family: "Poppins", monospace, sans-serif;
            margin-left: 10px;
        }

        .user-label {
            font-size: 14px;
            margin-right: 5px;
            display: flex;
            align-items: center;
        }

        .user-icon {
            margin-right: 5px; /* Adjust margin to increase space */
        }

        .logo {
        height: 90px; /* Adjust height to make it bigger */
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
            <img src="<?php echo base_url(); ?>assets/logo.png" alt="Logo" class="logo">
            <!-- <span class="logo-text">ZENCO FOOTSTEP</span> -->
        </div>
        <span class="user-label"><i class="fas fa-user user-icon"></i> User: <?php echo $user['role']; ?></span>
    </header>

    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Inventory Management</h2>
        </div>
        <ul>
            <li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <div class="section-divider"></div>
            <li><a href="<?php echo site_url('InventoryController/ViewProducts'); ?>"><i
                        class="fas fa-cube"></i> Product</a></li>
            <div class="section-divider"></div>
            <li><a href="<?php echo site_url('StockController'); ?>"><i class="fas fa-people-carry"></i> Stock</a></li>
            <div class="section-divider"></div>
            <li><a href="<?php echo site_url('Dashboard/Logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>


</body>

</html>