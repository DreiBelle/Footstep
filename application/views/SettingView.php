<!DOCTYPE html>
<html>

<head>
    <title>Setting</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial", "Helvetica", sans-serif;
            background-color: #f9f9f9;
            color: black;
        }

        #contents {
            margin-left: 300px;
            padding-top: 80px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 cards per row */
            grid-gap: 20px;
            /* Spacing between cards */
        }

        .card {
            position: relative;
            /* Add relative positioning */
            background-color: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem;
            box-sizing: border-box;
            z-index: -1;
            /* Set the z-index to -1 to position them behind other elements */
        }

        .card-content {
            flex-grow: 1;
        }

        .text-blue-500 {
            color: #3b82f6;
        }

        .text-blue-500:hover {
            text-decoration: underline;
        }

        /* Style for the Zenco Footstep card */
        #zenco-card {
            margin-left: 300px;
            background-color: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1rem;
            box-sizing: border-box;
            display: flex; /* Use flexbox */
            flex-direction: column; /* Stack items vertically */
            align-items: center; /* Center items horizontally */
            text-align: justify;
        }

        #zenco-card h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        #zenco-card p {
            margin: 0;
        }

        /* Style for the logo */
        #zenco-logo {
            display: block;
            max-width: 200px;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <?php $this->load->view($navbar); ?>

    <div id="contents">
        <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0; margin-top: 20px;">PROJECT URL</h1>
        <!-- Inserted code starts -->
        <?php foreach ($records as $record): ?>
            <div class="card">
                <div class="card-content">
                    <strong>No:</strong>
                    <?php echo $record['No']; ?><br>
                    <strong>Student Name:</strong>
                    <?php echo $record['Student Name']; ?><br>
                    <?php if (!empty($record['URL'])): ?>
                        <strong>URL:</strong>
                        <a href="http://<?php echo $record['URL']; ?>" class="text-blue-500" target="_blank">
                            <?php echo $record['URL']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div> <br>

    <!-- Zenco Footstep Card -->
    <div id="zenco-card">
    
        <img src="<?php echo base_url(); ?>assets/logo.png" id="zenco-logo"  alt="Zenco Footstep Logo">
        <h2>About Zenco Footstep</h2>
        <p>Zenco Footstep is owned by Yao Khaphu. In 1957, he established Zenith Commercial to engage in the distribution of sandals and rubber shoes. He began as a one-door establishment at San Fernando St., Binondo, then in 1959, he transferred to Caloocan City where a bigger warehouse is located. On May 26, 1961, Zenco Footstep opened in Divisoria, and the expansion of Zenco Footstep in provincial areas was in the year 1967. Zenco Footstep is located at Session Road, Baguio City. Zenco Footstep is engaged in selling rubber shoes, sandals, slippers, and sapatero products by category. With a solid marketing network, Zenco Footstep has the strongest foothold in the marketing and selling of footwear items in key market places up north and down south—a competitive edge that remains unequaled in the industry.</p>
    </div>
</body>

</html>
