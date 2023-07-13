<!DOCTYPE html>
<html>

<head>
    <title>Stock</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        #contents {
            margin-left: 300px;
            padding-top: 80px;
            min-width: 700px; /* Adjust the min-width value as needed */
        }

        .content {
            min-width: 700px; /* Adjust the min-width value as needed */
            padding: 20px; /* Add padding to the content */
            margin-right: 320px; /* Add margin to the right to accommodate the sidebar */
            margin-left: 300px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            margin-left: 10px;
            justify-content: normal;
        }

        .card {
            width: calc(33.33% - 20px); /* Adjust the width of the cards as needed */
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-bottom: 20px;
        }

        .card-image {
            width: 100%;
            height: 180px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .card-details {
            margin-top: 10px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-quantity {
            font-size: 14px;
            color: #666666;
            margin-bottom: 10px;
        }

        .card-price {
            font-size: 14px;
            color: #666666;
        }

        .card-input {
            width: 80%;
        }

        .card-button {
            margin-top: 10px;
            width: 80%;
            margin-bottom: 10px;
        }

        .card-button button {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
        }

        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 300px; /* Add width for the sidebar */
            z-index: 999;
        }
    </style>
</head>

<body>
    <div id="navbar">
        <?php $this->load->view($navbar) ?>
    </div>
    <div id="contents">
        <div class="content">
            <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Stocks</h1>
            <h1 style="text-align: left; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Slippers</h1>
            <div class="card-container">
                <?php foreach ($Slippers as $item): ?>
                <div class="card">
                    <div class="card-image"
                        style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>);"></div>
                    <div class="card-details">
                        <div class="card-title"><?php echo $item->Product_name; ?></div>
                        <div class="card-quantity">Stock: <?php echo $item->Quantity; ?></div>
                        <div class="card-price" id="Price_<?php echo $item->Product_id; ?>">Price: <?php echo $item->Price; ?></div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>

            <h1 style="text-align: left; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Rubber Shoes</h1>
            <div class="card-container">
                <?php foreach ($RubberShoes as $item): ?>
                <div class="card">
                    <div class="card-image"
                        style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>);"></div>
                    <div class="card-details">
                        <div class="card-title"><?php echo $item->Product_name; ?></div>
                        <div class="card-quantity">Stock: <?php echo $item->Quantity; ?></div>
                        <div class="card-price" id="Price_<?php echo $item->Product_id; ?>">Price: <?php echo $item->Price; ?></div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>

            <h1 style="text-align: left; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Black Shoes</h1>
            <div class="card-container">
                <?php foreach ($BlackShoes as $item): ?>
                <div class="card">
                    <div class="card-image"
                        style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>);"></div>
                    <div class="card-details">
                        <div class="card-title"><?php echo $item->Product_name; ?></div>
                        <div class="card-quantity">Stock: <?php echo $item->Quantity; ?></div>
                        <div class="card-price" id="Price_<?php echo $item->Product_id; ?>">Price: <?php echo $item->Price; ?></div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>

</html>
