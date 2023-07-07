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
        .sidebar {
            height: 100vh;
            width: 290px;
            background-color: black;
            color: #ffc107;
            position: fixed;
            margin-top: -35px;
            z-index: 2;
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
            margin-left: 270px; 
            padding: -20px;
            color: #000;
            display: inline;
         
        }

        .section-divider {
            margin-top: 5px;
            border-top: 1px solid #ffc107;
        }

        .sidebar-header {
            padding: 20px;
            background-color: #ffc107;
            text-align: center;
            margin-top: 100px;
        }

        .sidebar-header h2 {
            margin: 0;
            font-size: 20px;
            color: #000;
            font-family: "Poppins", monospace;
        }

        header {
            /* margin-left: 250px; */
            height: 65px; 
            width: 100vw;
            background-color: black;
            color: #ffc107;
            display: flex; 
            justify-content: space-between;
            font-family: "Poppins", monospace;
            position: fixed;
            align-items: center; 
            top: 0;
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
            display: block;
        }

        .user-icon {
            margin-right: 3px; 
        }

        .sidebar li i {
            margin-right: 10px;
        }

        .logo {
            position: absolute;
            top: -10px;
            left: 10px;
            height: 150px; /* Adjust the height as needed */
            padding: 10px;
        }

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


        #imageContainer {
            display: block;
            padding: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 100%; /* Adjust the max-width as needed */
            max-height: 300px; 
        }

        .picFootstep {
            height: 65px; /* Adjust the height as needed to make the logo bigger */
            position: fixed;
            top: 0;
            margin-top: 1px;
            margin-left: 20px;
        }
        .about {
            margin-left: 300px; 
            font-family: "Poppins", monospace; 
            font-size: 15px; 
            text-align: justify;
        }
    </style>
</head>
<body>
<header>
    <div class="logo-container">
    </div>
    <span class="user-label"><i class="fas fa-user user-icon"></i>User: <?php echo $user['role']; ?></span>
</header>

<div class="sidebar">
    <div class="sidebar-header">
        <h2>Zenco Foostep</h2>
    </div>
    <ul>
        <li class="dashboard-link"><a href="<?php echo site_url('Dashboard'); ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
        <div class="section-divider"></div>
        <li><a href="<?php echo site_url('CheckoutController'); ?>"><i class="fas fa-shopping-cart"></i>Checkout Management</a></li>
        <div class="section-divider"></div>
        <li class="dropdown">
            <a href="javascript:void(0)"><i class="fas fa-file-invoice"></i>Accounting Management </a>
            <div class="dropdown-content">
                <a href="#"><i class="fas fa-chart-line"></i>Sales</a>
                <a href="#"><i class="fas fa-receipt"></i>Expenses</a>
            </div>
        </li>
                <div class="section-divider"></div>
        <li class="dropdown">
        <a href="#"><i class="fas fa-box"></i>Inventory Management </a>
            <div class="dropdown-content">
                <a href="<?php echo site_url('InventoryController/ViewProducts'); ?>"><i class="fas fa-cube"></i>Product</a>
                <a href="#"><i class="fas fa-box-open"></i>Stock</a>
            </div> 
        </li>
        <div class="section-divider"></div>
        <li><a href="<?php echo site_url('HRController'); ?>"><i class="fas fa-users"></i>Human Resource Management</a></li>
        <div class="section-divider"></div>
        <li><a href="#"><i class="fas fa-chart-bar"></i>Data Analytics</a></li>
        <div class="section-divider"></div>
        <li><a href="#"><i class="fas fa-cog"></i>Settings</a></li>
        <div class="section-divider"></div>
        <li><a href="<?php echo site_url('Dashboard/Logout'); ?>"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
</div>

<img style="z-index: 3;" class="picFootstep" src="<?php echo base_url();?>assets/logo.png" alt="Logo" class="logo">

<script>
    function showDashboardImage() {
        var imageContainer = document.getElementById('imageContainer');
        imageContainer.style.display ='flex';
    }
    showDashboardImage();
</script>

</body>
</html>
