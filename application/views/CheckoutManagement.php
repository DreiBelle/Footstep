<!DOCTYPE html>
<html>

<head>
    <title>Checkout Management</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        #contents {
            margin-left: 300px;
            padding-left: 35px;
            padding-top: 80px;
            min-width: 700px;
            margin-bottom: 200px;
        }

        .content {
            min-width: 700px;
        }

        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: flex-start;
            margin-top: 20px;
        }

        .card {
            width: 300px;
            height: 400px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-right: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-image {
            width: 80%;
            height: 250px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
        }

        .card-content {
            flex-grow: 1;
        }

        .card-button {
            width: 100%;
            padding: 10px;
            background-color: #ffc107;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .card-button:hover {
            background-color: #FFD700;
        }

        .quantity-input {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .remove-button {
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .remove-button:hover {
            background-color: #cc0000;
        }

        .pay-now-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .pay-now-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div id="navbar">
        <?php $this->load->view($navbar) ?>
    </div>
    <div id="contents">
        <div class="content">
            <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Products</h1>
            <div class="card-container">
                <?php foreach ($Slippers as $item): ?>
                    <div class="card">
                        <div class="card-image"
                            style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>);"></div>
                        <div class="card-content">
                            <div>
                                <p style="color: gray;">Name:
                                    <?php echo $item->Product_name; ?>
                                </p>
                                <p style="color: gray;">Quantity:
                                    <?php echo $item->Quantity; ?>
                                </p>
                                <p style="color: gray;" id="Price_<?php echo $item->Product_id; ?>">Price: <?php echo $item->Price; ?></p>
                            </div>
                            <div>
                                <input type="hidden" name="ProductIdInput" id="ProductIdInput"
                                    value="<?php echo $item->Product_id; ?>" disabled>
                                <input type="number" placeholder="Enter Quantity" name="QuantityInput"
                                    id="QuantityInput_<?php echo $item->Product_id; ?>" class="quantity-input">
                                <button style="margin-top: 15px;" class="card-button"
                                    onclick="addToCart(<?php echo $item->Product_id; ?>, '<?php echo $item->Product_name; ?>', '<?php echo $item->Quantity; ?>')">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <?php foreach ($RubberShoes as $item): ?>
                    <div class="card">
                        <div class="card-image"
                            style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>);"></div>
                        <div class="card-content">
                            <div>
                                <p style="color: gray;">Name:
                                    <?php echo $item->Product_name; ?>
                                </p>
                                <p style="color: gray;">Quantity:
                                    <?php echo $item->Quantity; ?>
                                </p>
                                <p style="color: gray;" id="Price_<?php echo $item->Product_id; ?>">Price: <?php echo $item->Price; ?></p>
                            </div>
                            <div>
                                <input type="hidden" name="ProductIdInput" id="ProductIdInput"
                                    value="<?php echo $item->Product_id; ?>" disabled>
                                <input type="number" placeholder="Enter Quantity" name="QuantityInput" style="color: gray;"
                                    id="QuantityInput_<?php echo $item->Product_id; ?>" class="quantity-input">
                                <button style="margin-top: 15px;" class="card-button"
                                    onclick="addToCart(<?php echo $item->Product_id; ?>, '<?php echo $item->Product_name; ?>', '<?php echo $item->Quantity; ?>')">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <?php foreach ($BlackShoes as $item): ?>
                    <div class="card">
                        <div class="card-image"
                            style="background-image: url(<?php echo MAIN_BASE_URL . $item->Product_image; ?>);"></div>
                        <div class="card-content">
                            <div>
                                <p style="color: gray;">Name:
                                    <?php echo $item->Product_name; ?>
                                </p>
                                <p style="color: gray;">Quantity:
                                    <?php echo $item->Quantity; ?>
                                </p>
                                <p style="color: gray;" id="Price_<?php echo $item->Product_id; ?>">Price: <?php echo $item->Price; ?></p>
                            </div>
                            <div>
                                <input type="hidden" name="ProductIdInput" id="ProductIdInput"
                                    value="<?php echo $item->Product_id; ?>" disabled>
                                <input type="number" placeholder="Enter Quantity" name="QuantityInput"
                                    id="QuantityInput_<?php echo $item->Product_id; ?>" class="quantity-input">
                                <button style="margin-top: 15px;" class="card-button"
                                    onclick="addToCart(<?php echo $item->Product_id; ?>, '<?php echo $item->Product_name; ?>', '<?php echo $item->Quantity; ?>')">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <table id="cartDisplay"
                style="position: fixed; bottom: 0; width: 75%; background-color: white; height: 10%; margin-right: 5%; display: none; overflow-y: auto;">
            </table>
        </div>
    </div>
    <script>
        var cartItems = [];
        var totalPrice = 0;

        function addToCart(Product_id, Product_name, MaxQuantityDatabase) {
            var display1 = document.getElementById('cartDisplay');
            display1.style.display = "block";
            var quantityInput = document.getElementById('QuantityInput_' + Product_id);
            var quantity = parseInt(quantityInput.value);

            if (quantityInput.value !== "") {
                var existingItemIndex = cartItems.findIndex(function (item) {
                    return item.id === Product_id;
                });

                var itemPriceElement = document.getElementById('Price_' + Product_id);
                var itemPrice = parseFloat(itemPriceElement.innerText.split(' ')[1]);

                var maxQuantity = MaxQuantityDatabase;

                if (quantity > maxQuantity) {
                    // Limit the quantity to the maximum available
                    quantity = maxQuantity;
                    quantityInput.value = maxQuantity;
                }

                if (existingItemIndex !== -1) {
                    cartItems[existingItemIndex].quantity += quantity;
                    cartItems[existingItemIndex].price += itemPrice * quantity;
                } else {
                    var addedItem = {
                        id: Product_id,
                        name: Product_name,
                        quantity: quantity,
                        price: itemPrice * quantity
                    };
                    cartItems.push(addedItem);
                }
                updateCartDisplay();

                quantityInput.value = "";
            } else {

            }
        }


        function createRemoveHandler(itemId) {
            return function () {
                var removeIndex = cartItems.findIndex(function (item) {
                    return item.id === itemId;
                });

                if (removeIndex !== -1) {
                    var removedItem = cartItems.splice(removeIndex, 1)[0];
                    totalPrice -= removedItem.price;
                    updateCartDisplay();
                }
            };
        }

        function updateCartDisplay() {
            var cartDisplay = document.getElementById('cartDisplay');
            cartDisplay.innerHTML = '';

            for (var i = 0; i < cartItems.length; i++) {
                var item = cartItems[i];

                var newRow = document.createElement('tr');

                var itemIdCell = document.createElement('td');
                itemIdCell.width = '90%';
                itemIdCell.style.borderBottom = '1px solid black';
                itemIdCell.style.borderCollapse = 'collapse';
                itemIdCell.textContent = item.name;
                newRow.appendChild(itemIdCell);

                var quantityCell = document.createElement('td');
                quantityCell.textContent = item.quantity;
                quantityCell.style.borderBottom = '1px solid black';
                newRow.appendChild(quantityCell);

                var priceCell = document.createElement('td');
                priceCell.textContent = item.price.toFixed(2);
                priceCell.style.borderBottom = '1px solid black';
                newRow.appendChild(priceCell);

                var removeButton = document.createElement('td');
                var removeButtonElement = document.createElement('button');
                removeButtonElement.textContent = 'Remove';
                removeButtonElement.addEventListener('click', createRemoveHandler(item.id));
                removeButtonElement.classList.add('remove-button'); // Add custom CSS class
                removeButton.appendChild(removeButtonElement);
                removeButton.style.borderBottom = '1px solid black';
                newRow.appendChild(removeButton);

                cartDisplay.appendChild(newRow);
            }

            var buttonRow = document.getElementById('buttonRow');
            if (!buttonRow && cartItems.length > 0) {
                buttonRow = document.createElement('tr');
                buttonRow.id = 'buttonRow';
                var buttonCell = document.createElement('td');
                buttonCell.colSpan = 4;
                var payNowButton = document.createElement('button');
                payNowButton.innerText = 'Pay Now';
                payNowButton.style.width = '100%';
                payNowButton.addEventListener('click', calculateTotal);
                payNowButton.classList.add('pay-now-button'); // Add custom CSS class
                buttonCell.appendChild(payNowButton);
                buttonRow.appendChild(buttonCell);
                buttonRow.style.marginBottom = '20px'; // Add margin-bottom for spacing
                cartDisplay.appendChild(buttonRow);
            } else if (buttonRow && cartItems.length === 0) {
                buttonRow.parentNode.removeChild(buttonRow);
            }
        }

        function updateTotalPrice() {
            var totalDisplay = document.getElementById('totalDisplay');
            totalDisplay.textContent = totalPrice.toFixed(2);
        }

        function calculateTotal() {
            var totalPrice = 0;

            for (var i = 0; i < cartItems.length; i++) {
                totalPrice += cartItems[i].price;

                var itemId = cartItems[i].id;
                var quantity = cartItems[i].quantity;

                // Send an AJAX request to reduce the stock for each item
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "<?php echo site_url('/CheckoutController/ReduceStock'); ?>", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                var data = "ProductIdInput=" + encodeURIComponent(itemId) + "&QuantityInput=" + encodeURIComponent(quantity);
                xhr.send(data);
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo site_url('/CheckoutController/InsertTotalExpense'); ?>", true);
            xhr.setRequestHeader("Content-Type", "application/json");

            // Create an object with additional data
            var additionalData = {
                totalPrice: totalPrice,
                additionalProperty: "additional value",
            };

            // Merge additionalData with the existing data object
            var data = JSON.stringify(Object.assign({}, additionalData));

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    cartItems = [];
                    updateCartDisplay();

                    var buttonRow = document.getElementById('buttonRow');
                    location.reload();
                    if (buttonRow && buttonRow.parentNode) { // Check if buttonRow exists and its parentNode exists
                        buttonRow.parentNode.removeChild(buttonRow); // Remove the buttonRow from the DOM
                    }
                }
            };

            xhr.send(data);
        }
    </script>
</body>

</html>