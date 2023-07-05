<!DOCTYPE html>
<html>

<head>
    <title>Checkout Management</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        #contents {
            margin-left: 300px;
            padding-top: 80px;
            min-width: 700px;
            /* Adjust the min-width value as needed */
        }

        .content {
            min-width: 700px;
            /* Adjust the min-width value as needed */
        }

        .card {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-bottom: 20px;
            margin-right: 20px;
        }

        .card-image {
            width: 200px;
            height: 180px;
            object-fit: fill;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .card-details {
            width: 200px;
            margin-left: 50px;
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
            right: 0;
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
            <h1
                style="text-align: center; text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">
                Products</h1>
            <!-- <h1 style="text-align: left; text-align: left; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Slippers</h1> -->
            <div style="width: 100%; overflow-x: auto;">
                <div style="display: flex; flex-wrap: nowrap;">
                    <div style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                        <?php foreach ($Slippers as $item): ?>
                            <div style="flex: 0 0 20%; padding: 5px; box-sizing: border-box;">
                                <div
                                    style="width: 100%; border: 1px solid #ccc; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                                    <div class="card-image"
                                        style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>); height: 150px; background-size: contain;">
                                    </div>

                                    <div class="card-details">
                                        <div class="card-title" style="margin-bottom: 10px; font-size: 14px;">
                                            <?php echo $item->Product_name; ?>
                                        </div>
                                        <div class="card-quantity" style="font-size: 12px;">
                                            Quantity:
                                            <?php echo $item->Quantity; ?>
                                        </div>
                                        <div class="card-price" id="Price_<?php echo $item->Product_id; ?>"
                                            style="font-size: 12px;">
                                            Price: <?php echo $item->Price; ?>
                                        </div>
                                        <div style="margin-top: 10px; ">
                                            <label for="Size"  style="margin-bottom: 10px; font-size: 12px; color: gray"> Size:</label>
                                            <select name="Size" id="Size" required
                                            style="margin-bottom: 10px; font-size: 12px; color: gray; width: 110px;">
                                                <option>Select size</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                            </select>

                                            <input class="card-input" type="number" placeholder="Enter Quantity"
                                                name="QuantityInput" id="QuantityInput_<?php echo $item->Product_id; ?>"
                                                style="width: 70%; padding: 5px; font-size: 12px;">
                                            <div class="card-button" style="margin-top: 10px;">
                                                <button onclick="addToCart(<?php echo $item->Product_id; ?>)"
                                                    style="padding: 5px 10px; font-size: 12px; width: 85%;">Add to
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

            </div>
        </div>

        <!-- <h1 style="text-align: left; text-align: left; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Rubber Shoes</h1> -->
        <div style="width: 100%; overflow-x: auto;">
            <div style="display: flex; flex-wrap: nowrap;">
                <div style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                    <?php foreach ($RubberShoes as $item): ?>
                        <div style="flex: 0 0 25%; padding: 10px; box-sizing: border-box;">
                            <div
                                style="width: 100%; border: 1px solid #ccc; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                                <div class="card-image"
                                    style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>);">
                                </div>

                                <div class="card-details">
                                    <div class="card-title" style="margin-bottom: 10px;">
                                        <?php echo $item->Product_name; ?>
                                    </div>
                                    <div class="card-quantity">
                                        Quantity:
                                        <?php echo $item->Quantity; ?>
                                    </div>
                                    <div class="card-price" id="Price_<?php echo $item->Product_id; ?>">
                                        Price: <?php echo $item->Price; ?>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <input class="card-input" type="number" placeholder="Enter Quantity"
                                            name="QuantityInput" id="QuantityInput_<?php echo $item->Product_id; ?>">
                                        <div class="card-button">
                                            <button onclick="addToCart(<?php echo $item->Product_id; ?>)">Add to
                                                Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        </div>

        <!-- <h1 style="text-align: left; text-align: left; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Black Shoes</h1> -->
        <div style="width: 100%; overflow-x: auto;">
            <div style="display: flex; flex-wrap: nowrap;">
                <div style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                    <?php foreach ($BlackShoes as $item): ?>
                        <div style="flex: 0 0 25%; padding: 10px; box-sizing: border-box;">
                            <div
                                style="width: 100%; border: 1px solid #ccc; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                                <div class="card-image"
                                    style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>);">
                                </div>

                                <div class="card-details">

                                    <div class="card-title" style="margin-bottom: 10px;">
                                        <?php echo $item->Product_name; ?>
                                    </div>
                                    <div class="card-quantity">
                                        Quantity:
                                        <?php echo $item->Quantity; ?>
                                    </div>
                                    <div class="card-price" id="Price_<?php echo $item->Product_id; ?>">
                                        Price: <?php echo $item->Price; ?>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <input class="card-input" type="number" placeholder="Enter Quantity"
                                            name="QuantityInput" id="QuantityInput_<?php echo $item->Product_id; ?>">
                                        <div class="card-button">
                                            <button onclick="addToCart(<?php echo $item->Product_id; ?>)">Add to
                                                Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        </div>
</body>

</html>