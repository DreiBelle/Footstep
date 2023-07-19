<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: "Arial", "Helvetica", sans-serif;
            /* margin: 0; */
            /* background-image: url("<?php echo base_url(); ?>assets/pc.jpg"); */
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("<?php echo base_url(); ?>assets/background.jpg"); /* Replace "background.jpg" with the filename of your background image */
            background-repeat: no-repeat;
            background-size: cover;
        }

        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 60px);
            margin-left: 240px;
            padding: 20px;
            padding: 10px;
            backdrop-filter: blur(5px)
        }

        .card {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: black; /* Set the background color with transparency */
            border-radius: 8px;
        
            padding: 30px;
            margin-top: -20px;
            justify-content: center;
            text-align: justify;
        }

        h1 {
            font-size: 30px;
            color: #333333;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 16px;
            color: #666666;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar); ?>
    <div id="container">
        <!-- <h2>Welcome to Dashboard!</h2> -->
        <div class="card">
            <img src="<?php echo base_url(); ?>assets/logo." alt="PC Image"
                style="width: 50%; max-width: 100%; height: auto; display: block; margin: 20px auto; margin-top: -20px;">
            <h1>Zenco Footstep</h1>
            <p>Zenco Footstep is owned by Yao Khaphu. In 1957, he established Zenith Commercial to engage in the distribution of sandals and rubber shoes. It began as a one-door establishment in San Fernando St., Binondo. In 1959, he transferred to Caloocan City where a bigger warehouse is located.</p>
            <p>On May 26, 1961, Zenco Footstep opened in Divisoria, and the expansion of Zenco Footstep in provincial areas was in 1967. Zenco Footstep is currently located at Session Road, Baguio City. It is engaged in selling rubber shoes, sandals, slippers, and sapatero products by category.</p>
            <p>With a solid marketing network, Zenco Footstep has the strongest foothold in the marketing and selling of footwear items in key marketplaces up north and down south—a competitive edge that remains unparalleled in the industry.</p>
        </div>
    </div>

</body>

</html>
