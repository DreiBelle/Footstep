<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: "Arial", "Helvetica", sans-serif;
            background-repeat: no-repeat;
            background-image: url("<?php echo base_url(); ?>assets/bg.jpg");
            /* Replace "background.jpg" with the filename of your background image */
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
        }
        #container::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url("<?php echo base_url(); ?>assets/bg.jpg"); /* Same background image as body */
            /* Replace "bg.jpg" with the filename of your background image */
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(5px); /* Adjust the blur intensity as needed */
            z-index: -1; /* Place the pseudo-element behind the content */
        }

        .cards {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: rgba(0, 0, 0, 0.8);
            /* Set the background color with transparency */
            border-radius: 9px;
            color: #FFD700;
            /* box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); */
            padding: 30px;
            margin-top: -20px;
            justify-content: center;
            text-align: justify;
            color: #ffffff;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bolder;
            color: #FFD700;
        }

        p {
            font-size: 20px;
            color: #FFD700;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar); ?>
    <div id="container">
        <!-- <h2>Welcome to Dashboard!</h2> -->
        <div class="cards">
            <img src="<?php echo base_url(); ?>assets/logo." alt="PC Image"
                style="width: 40%; max-width: 90%; height: auto; display: block; margin: 20px auto; margin-top: -20px;">
            <div class="carda">
                <h1>Zenco Footstep</h1> <br>
                <p>Our Vision: We Believe in EXCELLENCE as the constant call of our hearts, minds and strength in the
                    attainment of needed PROFIT AND GROWTH THROUGH QUALITY AND LOYALTY
                </p>
            </div>
        </div>
        <!-- Add the new picture here -->
       
    </div>
    

</body>

</html>
