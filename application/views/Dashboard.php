<!DOCTYPE html>
<html>
<head>
    <title>CheckoutManagement</title>
    <style>
        #contents {
            margin-left: 50px; /* Adjust the margin left as needed */
            padding-top: 80px;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #fff;
            font-family: "Poppins", Arial, sans-serif;
        }

        .content {
            margin-left: 110px; /* Adjust the margin left as needed */
            padding: 20px;
            margin-top: -45px;
            color: #000;
            display: inline;
        }

        .section-divider {
            margin-top: 5px;
            border-top: 1px solid #ffc107;
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

        .about {
            margin-left: 50px; /* Adjust the margin left as needed */
            font-family: "Poppins", monospace; 
            font-size: 15px; 
            text-align: justify;
        }

        .user-label {
            margin-left: 980px; /* Adjust the margin right as needed */
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>
    <div id="contents">
        <header>
            <!-- <div class="logo-container">
                <img src="<?php echo base_url();?>assets/logo.png" alt="Logo" class="logo">
            </div> -->
            <span class="user-label"><i class="fas fa-user user-icon"></i>User: <?php echo $user['role']; ?></span>
        </header>

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
    </div>
</body>

</html>
