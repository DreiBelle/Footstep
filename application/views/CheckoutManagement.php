<!DOCTYPE html>
<html>

<head>
    <title>CheckoutManagement</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: black;
        }

        #contents {
            margin-left: 300px;
            padding-top: 80px;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            color: black;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .add-btn,
        .search-form button {
            cursor: pointer;
        }

        .add-btn {
            margin-left: 0px;
            margin-top: -50px;
        }

        .add-btn button {
            background: linear-gradient(45deg, #f1c40f, #e0b832);
            /* Gradient background for the "Add Payment" button */
            color: black;
            /* Font color for the "Add Payment" button */
            border: 2px solid #f1c40f;
            /* Yellow border for the "Add Payment" button */
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .search-form {
            display: flex;
            align-items: center;
            height: 50px;
            margin-left: 550px;
        }

        .search-input-container {
            position: relative;
        }

        .search-input {
            width: 300px;
            padding: 10px;
            border: 2px solid #f1c40f;
            border-radius: 4px;
            font-size: 12px;
            outline: none;
        }

        .search-input::placeholder {
            color: #aaa;
        }

        .search-button {
            background: #f1c40f;
            color: black;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 13px;
        }

        .search-button:hover {
            background-color: #e0b832;
        }

        .fa-search {
            margin-right: 5px;
        }


        table {
            background-color: #f9f9f9;
            color: black;
            margin-top: 20px;
        }

        th {
            background-color: #f1c40f;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #f9f9f9;
            transition: background-color 0.3s;
            color: #fff;
        }

        .action-btn.edit-btn {
            background-color: #3498db;
        }

        .action-btn.delete-btn {
            background-color: #e74c3c;
            margin-left: 5px;
        }

        .action-btn.edit-btn:hover,
        .action-btn.delete-btn:hover {
            background-color: #2980b9;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            background-color: green;
            border: 1px solid #888;
            color: white;
            3 display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 450px;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            color: black;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        .form-container input[type="text"],
        .form-container input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        .form-container input[type="submit"] {
            background-color: #f1c40f;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .form-container input[type="submit"]:hover {
            background-color: #e0b832;
        }

        .form-container .close {
            position: absolute;
            top: 10px;
            right: 100px;
            font-size: 20px;
            cursor: pointer;
        }

        span {
            margin-right: -380px;
        }

        .form-container select {
            height: 7%;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>
    <div id="contents">
    <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Accounting Management</h1>
        <div class="search-form">
            <form method="get" action="<?php echo site_url('CheckoutController/viewCheckout'); ?>">
                <div class="search-input-container">
                    <input type="text" name="asd" placeholder="Search by ID" class="search-input">
                    <button type="submit" class="search-button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="add-btn">
            <button id="AddCheckoutbtn">
                <i class="fas fa-plus-circle"></i> Add Payment
            </button>


            <div id="AddCheckoutModal" class="modal">
                <div class="flex-center">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="<?php echo site_url('CheckoutController/addCheckout'); ?>"
                            class="form-container">
                            <h2>Add Payment</h2>
                            <label for="PaymentId"><i class="fas fa-id-badge"></i> Payment ID:</label>
                            <input type="text" name="PaymentId" id="PaymentId" required>
                            <label for="Product"><i class="fas fa-box"></i> Product:</label>
                            <input type="text" name="Product" id="Product" required>
                            <label for="Description"><i class="fas fa-file-alt"></i> Description:</label>
                            <input type="text" name="Description" id="Description" required>
                            <label for="TotalPayment"><i class="fas fa-dollar-sign"></i> Total Payment:</label>
                            <input type="text" name="TotalPayment" id="TotalPayment" required>
                            <label for="PaymentMethod"><i class="fas fa-credit-card"></i> Payment Method:</label>
                            <select name="PaymentMethod" id="PaymentMethod" required>
                                <option>Please select</option>
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="PayPal">PayPal</option>
                                <!-- Add more payment method options as needed -->
                            </select>
                            <label for="PaymentDate"><i class="fas fa-calendar-alt"></i> Payment Date:</label>
                            <input type="date" name="PaymentDate" id="PaymentDate" required>
                            <div>
                                <input type="submit" value="SAVE">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Total Payment</th>
                        <th>Payment Method</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($check as $data) { ?>
                        <tr>
                            <td>
                                <?php echo $data['Payment_id']; ?>
                            </td>
                            <td>
                                <?php echo $data['Product']; ?>
                            </td>
                            <td>
                                <?php echo $data['Description']; ?>
                            </td>
                            <td>
                                <?php echo $data['Total_payment']; ?>
                            </td>
                            <td>
                                <?php echo $data['Payment_method']; ?>
                            </td>
                            <td>
                                <?php echo $data['Payment_date']; ?>
                            </td>
                            <td>
                                <button class="action-btn edit-btn" onclick="showForm(
                                    '<?php echo $data['Payment_id']; ?>',
                                    '<?php echo $data['Product']; ?>',
                                    '<?php echo $data['Description']; ?>',
                                    '<?php echo $data['Total_payment']; ?>',
                                    '<?php echo $data['Payment_method']; ?>',
                                    '<?php echo $data['Payment_date']; ?>'
                                )"><i class="fas fa-edit"></i> Edit
                                </button>

                                <button onclick="clicks()" class="action-btn edit-btn">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>


                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- EdIt -->
            <div id="EditModal" class="modal">
                <div style="margin-right: 900px; margin-top: -300px; margin-left: -80px;">
                    <div id="EditModalContent" class="modal-content">
                        <span class="close1" style="color: black; cursor: pointer; font-size: 24px;"
                            onclick="closeForm()">&times;</span>

                        <form method="post" action="<?php echo site_url('CheckoutController/EditCheckout'); ?>"
                            class="form-container">
                            <h2>Update Payment</h2>
                            <label for="PaymentId"><i class="fas fa-id-badge"></i> Payment ID:</label>
                            <input type="text" name="IdInput" id="IdInput" required>
                            <label for="Product"><i class="fas fa-box"></i> Product:</label>
                            <input type="text" name="ProductInput" id="ProductInput" required>
                            <label for="Description"><i class="fas fa-file-alt"></i> Description:</label>
                            <input type="text" name="DescriptionInput" id="DescriptionInput" required>
                            <label for="TotalPayment"><i class="fas fa-dollar-sign"></i> Total Payment:</label>
                            <input type="text" name="TotalPaymentInput" id="TotalPaymentInput" required>
                            <label for="PaymentMethod"><i class="fas fa-credit-card"></i> Payment Method:</label>
                            <select name="PaymentMethodInput" id="PaymentMethodInput" required>
                                <option>Please select</option>
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="PayPal">PayPal</option>
                                <!-- Add more payment method options as needed -->
                            </select>
                            <label for="PaymentDate"><i class="fas fa-calendar-alt"></i> Payment Date:</label>
                            <input type="date" name="PaymentDateInput" id="PaymentDateInput" required>
                            <div>
                                <input type="submit" value="SAVE">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                function clicks() {
                    window.location.href = "<?php echo site_url("CheckoutController/deleteRecord/" . $data["Payment_id"]) ?>";
                }
                document.addEventListener("DOMContentLoaded", function () {
                    var button = document.getElementById("AddCheckoutbtn");
                    var modal = document.getElementById("AddCheckoutModal");
                    var span = document.getElementsByClassName("close")[0];

                    button.onclick = function () {
                        modal.style.display = "block";
                    };

                    span.onclick = function () {
                        modal.style.display = "none";
                    };

                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    };
                })

                function showForm(PaymentId, Product, Description, TotalPayment, PaymentMethod, PaymentDate) {
                    var modal = document.getElementById("EditModal");
                    var content = document.getElementById("EditModalContent");

                    var IdInput = document.getElementById("IdInput");
                    var ProductInput = document.getElementById("ProductInput");
                    var DescriptionInput = document.getElementById("DescriptionInput");
                    var TotalPaymentInput = document.getElementById("TotalPaymentInput");
                    var PaymentMethodInput = document.getElementById("PaymentMethodInput");
                    var PaymentDateInput = document.getElementById("PaymentDateInput");

                    IdInput.value = PaymentId;
                    ProductInput.value = Product;
                    DescriptionInput.value = Description;
                    TotalPaymentInput.value = TotalPayment;
                    PaymentMethodInput.value = PaymentMethod;
                    PaymentDateInput.value = PaymentDate;

                    modal.style.display = "block";
                }

                function hideForm() {
                    document.getElementById('form').style.display = 'none';
                }
                function closeForm() {
                    var modal = document.getElementById("EditModal");
                    modal.style.display = "none";
                }

                function searchById() {
                    var searchId = document.getElementById('search-id').value;
                    console.log('Search by ID:', searchId);
                }

            </script>
        </div>
</body>

</html>