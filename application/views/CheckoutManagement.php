<!DOCTYPE html>
<html>

<head>
    <title>Checkout Management</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        #contents {
            margin-left: 300px;
            padding-left: 35px;
            padding-top: 70px;
            min-width: 700px;
            margin-bottom: 200px;
        }

        .content {
            margin-left: 240px;
            padding-left: 20px;
            margin-top: 20px;
            margin-right: 20px;
            margin-bottom: 20px;
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
            width: 290px;
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
            width: 90%;
            height: 290px;
            /* margin-top: 10px; */
            /* margin-bottom:-30px; */
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
            padding: 3px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .size-input {
            width: 100%;
            padding: 3px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .remove-button {
            background-color: #ff0000;
            color: #fff;
            border: none;
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

        .paymentModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .paymentmodal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 9px;
            width: 500px;
            text-align: center;
            font-size: 120%;
        }

        .payment-option {
            display: block;
            margin: 10px auto;
            padding: 10px;
            background-color: black;
            color: #FFC300;
            border: 1px solid black;

        }

        .navbar {
           margin-left: -530px;
            padding: 10px;
            max-width: 910px;
            display: flex;
            justify-content: flex-end;
        }

        .navbar a {
            margin-right: 10px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
            font-size: 16px;
        }

        .navbar a:first-child {
            margin-left: auto;
        }

        .navbar .icon {
            margin-left: 5px;
        }

        .navbar a:hover {
            text-decoration: none;
            color: orange;
        }

        .close-icon {
            margin-left: 400px;
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
                style="text-align: left; padding: 10px; font-size: 30px; max-width: 910px; font-weight: bold; margin: 0; ">
                Sales
            </h1>

            <div class="navbar">
                <a href="#slippers">Slippers <i class="fas fa-chevron-right icon"></i></a>
                <a href="#rubber-shoes">Rubber Shoes <i class="fas fa-chevron-right icon"></i></a>
                <a href="#black-shoes">Black Shoes <i class="fas fa-chevron-right icon"></i></a>
            </div>
            <div class="card-container">
                <h2 id="slippers"></h2>
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
                                <input type="hidden" name="ProductIdInput"
                                    id="ProductIdInput_<?php echo $item->Product_id; ?>"
                                    value="<?php echo $item->Product_id; ?>" disabled>
                                <input type="text" placeholder="Enter Euro Size" name="SizeInput"
                                    id="SizeInput_<?php echo $item->Product_id; ?>" class="size-input">
                                <input type="number" placeholder="Enter Quantity" name="QuantityInput"
                                    id="QuantityInput_<?php echo $item->Product_id; ?>" class="quantity-input">
                                <button style="margin-top: 15px;" class="card-button"
                                    onclick="addToCart(<?php echo $item->Product_id; ?>, '<?php echo $item->Product_name; ?>', '<?php echo $item->Quantity; ?>')">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <h2 id="rubber-shoes"></h2>
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
                                <input type="hidden" name="ProductIdInput"
                                    id="ProductIdInput_<?php echo $item->Product_id; ?>"
                                    value="<?php echo $item->Product_id; ?>" disabled>
                                <input type="text" placeholder="Enter Euro Size" name="SizeInput"
                                    id="SizeInput_<?php echo $item->Product_id; ?>" class="size-input">
                                <input type="number" placeholder="Enter Quantity" name="QuantityInput"
                                    id="QuantityInput_<?php echo $item->Product_id; ?>" class="quantity-input">
                                <button style="margin-top: 15px;" class="card-button"
                                    onclick="addToCart(<?php echo $item->Product_id; ?>, '<?php echo $item->Product_name; ?>', '<?php echo $item->Quantity; ?>')">
                                    <i class="fas fa-shopping-cart"></i>Add to Cart</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <h2 id="black-shoes"></h2>
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
                                <input type="hidden" name="ProductIdInput"
                                    id="ProductIdInput_<?php echo $item->Product_id; ?>"
                                    value="<?php echo $item->Product_id; ?>" disabled>
                                <input type="text" placeholder="Enter Euro Size" name="SizeInput"
                                    id="SizeInput_<?php echo $item->Product_id; ?>" class="size-input">
                                <input type="number" placeholder="Enter Quantity" name="QuantityInput"
                                    id="QuantityInput_<?php echo $item->Product_id; ?>" class="quantity-input">
                                <button style="margin-top: 15px;" class="card-button"
                                    onclick="addToCart(<?php echo $item->Product_id; ?>, '<?php echo $item->Product_name; ?>', '<?php echo $item->Quantity; ?>')">
                                    <i class="fas fa-shopping-cart"></i>Add
                                    to Cart</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <div id="paymentModal" class="paymentModal">
                <div class="paymentmodal-content">
                    <span class="close-icon">&times;</span> <!-- X button -->
                    <h4>Choose Payment Method</h4>
                    <label for="cashBtn">
                        <input type="radio" id="cashBtn" name="paymentMethod">
                        <i class="" style="margin-right: 5px;"></i>Cash
                    </label>
                    <br>
                    <label for="rbbiBtn">
                        <input type="radio" id="rbbiBtn" name="paymentMethod">
                        <i class="" style="margin-right: 5px;"></i>Card
                    </label>
                </div>
            </div>




            <table id="cartDisplay"
                style="position: fixed; bottom: 0; width: 75%; background-color: white; height: 10%; margin-right: 5%; display: none; overflow-y: auto;">
            </table>
        </div>
        <input type="hidden" id="latestid" value="<?php echo $LatestID ?>">
    </div>
    <script>

        var cashBtn = document.getElementById("cashBtn");
        cashBtn.addEventListener("change", function () {
            if (cashBtn.checked) {
                alert("Cash payment selected");
            }
        });

        var cartItems = [];
        var totalPrice = 0;

        function addToCart(Product_id, Product_name, MaxQuantityDatabase) {
            var display1 = document.getElementById('cartDisplay');
            display1.style.display = "block";
            var quantityInput = document.getElementById('QuantityInput_' + Product_id);
            var quantity = parseInt(quantityInput.value);
            var itemIdCounter = document.getElementById('latestid').value;

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

                var sizeInput = document.getElementById('SizeInput_' + Product_id);
                var size = sizeInput.value;

                if (quantity > 0) {
                    if (existingItemIndex !== -1) {
                        cartItems[existingItemIndex].quantity += quantity;
                        cartItems[existingItemIndex].price += itemPrice * quantity;
                    } else {
                        var addedItem = {
                            id: Product_id,
                            name: Product_name,
                            quantity: quantity,
                            price: itemPrice * quantity,
                            size: size
                        };
                        cartItems.push(addedItem);
                    }
                    updateCartDisplay();

                    insertSale(itemIdCounter, Product_name, quantity);

                    quantityInput.value = "";
                    sizeInput.value = "";
                }
            }
        }

        function insertSale(itemId, itemName, quantity) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo site_url('/CheckoutController/Insert'); ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    console.log("Response:", xhr.responseText);
                }
            };

            var data =
                "ItemID=" + encodeURIComponent(itemId) +
                "&ItemName=" + encodeURIComponent(itemName) +
                "&Quantity=" + encodeURIComponent(quantity);

            console.log("Data:", data);

            xhr.send(data);
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
                itemIdCell.width = '80%';
                itemIdCell.style.borderBottom = '1px solid black';
                itemIdCell.style.borderCollapse = 'collapse';
                itemIdCell.textContent = item.name;
                newRow.appendChild(itemIdCell);

                var quantityCell = document.createElement('td');
                quantityCell.textContent = item.quantity;
                quantityCell.style.borderBottom = '1px solid black';
                quantityCell.style.margin = '300px';
                quantityCell.width = '10%';
                newRow.appendChild(quantityCell);

                var priceCell = document.createElement('td');
                priceCell.textContent = item.price.toFixed(2);
                priceCell.style.borderBottom = '1px solid black';
                priceCell.width = '10%';
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
            var modal = document.getElementById("paymentModal");
            modal.style.display = "block";

            var cashBtn = document.getElementById("cashBtn");
            cashBtn.addEventListener("click", function () {
                processPayment("Cash");
            });

            var rbbiBtn = document.getElementById("rbbiBtn");
            rbbiBtn.addEventListener("click", function () {
                processPayment("Card");
            });
        }

        function processPayment(chosen) {
            var modal = document.getElementById("paymentModal");

            if (chosen == "Cash") {
                totalPrice = 0;

                for (var i = 0; i < cartItems.length; i++) {
                    totalPrice += cartItems[i].price;

                    var itemId = cartItems[i].id;
                    var quantity = cartItems[i].quantity;
                    var size = cartItems[i].size;

                    console.log(quantity);

                    // Send an AJAX request to reduce the stock for each item
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "<?php echo site_url('/CheckoutController/ReduceStock'); ?>", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    var data = "ProductIdInput=" + encodeURIComponent(itemId) + "& QuantityInput=" + encodeURIComponent(quantity);
                    xhr.send(data);

                    // Send an AJAX request to save the size for each item
                    var xhrSize = new XMLHttpRequest();
                    xhrSize.open("POST", "<?php echo site_url('/CheckoutController/SaveSize'); ?>", true);
                    xhrSize.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    var dataSize = "ProductIdInput=" + encodeURIComponent(itemId) + "& SizeInput=" + encodeURIComponent(size);
                    xhrSize.send(dataSize);
                }
            } else if (chosen == "Card") {

                for (var i = 0; i < cartItems.length; i++) {
                    totalPrice += cartItems[i].price;

                    var itemId = cartItems[i].id;
                    var quantity = cartItems[i].quantity;
                    var size = cartItems[i].size;
                }

                var url = "http://192.168.10.128/RBBI/index.php/access/index/83/" + totalPrice + "/?url=http://192.168.10.120/Footstep/index.php/CheckoutController&data=";
                window.location.href = url;
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