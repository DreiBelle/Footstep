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
            background-color: #000;
            color: #ffc107;
            position: fixed;
            margin-top: -35px;
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
            padding: 10px;
            height: 65px; 
            width: 100vw;
            background-color: #000;
            color: #ffc107;
            display: flex; 
            justify-content: space-between;
            font-family: "Poppins", monospace;
            position: fixed;
            align-items: center; 
            top: 0;
        }

        .logo-container {
            display: inline;
            align-items: left;
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
            height: 85px;
            padding: 0px;
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

        .picFootstep{
            height: 50px; 
            position: fixed;
            top: 0;
            margin-top: 10px;
            margin-left: 7px;
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
        <img src="<?php echo base_url();?>assets/logo.png" alt="Logo" class="logo">
        <!-- <span class="logo-text">ZENCO FOOTSTEP</span> -->
    </div>
    <span class="user-label"><i class="fas fa-user user-icon"></i>User: <?php echo $user['role']; ?></span>
</header>

<div class="sidebar">
    <div class="sidebar-header">
        <h2>Zenco Foostep</h2>
    </div>
    <ul>
        <li class="dashboard-link"><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('CheckoutController'); ?>"><i class="fas fa-shopping-cart"></i>Checkout Management</a></li>
        <li><a href="<?php echo site_url('AccountingController'); ?>"><i class="fas fa-file-invoice"></i>Accounting Management</a></li>
        <li><a href="<?php echo site_url('InventoryController'); ?>"><i class="fas fa-box"></i>Inventory Management</a></li>
        <li><a href="<?php echo site_url('HRController'); ?>"><i class="fas fa-users"></i>Human Resource Management</a></li>
        <li><a href="#"><i class="fas fa-chart-bar"></i>Data Analytics</a></li>
        <li><a href="#"><i class="fas fa-cog"></i>Settings</a></li>
        <div class="section-divider"></div>
        <li><a href="<?php echo site_url('Dashboard/Logout'); ?>"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
</div>

    <!-- <div class="content" id="imageContainer">
         <img src="<?php echo base_url();?>assets/pc.jpg" alt="Dashboard Image">
     </div>
    <div class="about">
    <h2>About</h2>
        <p>ZENCO FOOTSTEP has a reputation for being the country’s leading footwear trader based on outstanding sales performance through the past fifty (50) years that has put ZSI consistently on the top 200 corporations in the Philippines.
        With a solid marketing network, Zenco Footstep has the strongest foothold in the marketing and selling of footwear items in key market areas – a competitive edge which remains unequaled in the industry.
        Footwear, being an indispensable commodity among a broad range of consumers, has greatly contributed to the growth of our stores to be able to supply an equally growing market demand for quality footwear.</p>
    
        <h2>Vision</h2>
        <p>We Believe in EXCELLENCE as the constant call of our hearts, minds and strength in the attainment of needed PROFIT AND GROWTH THROUGH QUALITY AND LOYALTY</p>
    </div> -->
        <img class="picFootstep" src="<?php echo base_url();?>assets/logo.png" alt="Logo" class="logo">

<script>
    // Function to display the image when the page loads
    function showDashboardImage() {
        var imageContainer = document.getElementById('imageContainer');
        // Show the image container
        imageContainer.style.display = 'flex';
    }

    // Call the function to show the image on page load
    showDashboardImage();
</script>

</body>
</html>



