<!DOCTYPE html>
<html>

<head>
    <title>Inventory Management</title>
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
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            width: 200px;
            padding: 10px;
            border: 1px solid #f9f9f9;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: black;
            outline: none;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .search-form input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: black;
            cursor: pointer;
            font-family: "Arial", "Helvetica", sans-serif;
            transition: background-color 0.3s;
        }

        .add-btn {
            margin-bottom: 20px;
        }

        .add-btn button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: black;
            cursor: pointer;
            font-family: "Arial", "Helvetica", sans-serif;
            transition: background-color 0.3s;
        }

        .modal-content {
            background-color: #f9f9f9;
            border: 1px solid #f9f9f9;
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content h2 {
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content label {
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content input[type="text"],
        .modal-content input[type="date"],
        .modal-content select {
            background-color: #f9f9f9;
            color: black;
            border: 1px solid #f9f9f9;
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 16px;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content input[type="submit"] {
            background-color: #f9f9f9;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content input[type="submit"]:hover {
            background-color: #e0b832;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        th,
td {
            padding: 8px;
            border-bottom: 1px solid #f9f9f9;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        th {
            background-color: #f9f9f9;
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .action-btn.edit-btn {
            background-color: #f9f9f9;
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
            background-color: #f9f9f9;
            border: 1px solid #f9f9f9;
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 450px;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #f9f9f9;
            color: black;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            font-family: "Arial", "Helvetica", sans-serif;
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
            border: 1px solid #f9f9f9;
            border-radius: 4px;
            margin-bottom: 16px;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .form-container input[type="submit"] {
            background-color: #f9f9f9;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            font-family: "Arial", "Helvetica", sans-serif;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>
    <div id="contents">
        <div class="search-form">
            <form method="get" action="<?php echo site_url('InventoryController/viewCheckout'); ?>">
                <input type="text" name="searchId" placeholder="Search by ID">
                <input type="submit" value="Search">
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
                            <h2>Purchase</h2>
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
                                <option value="">Please select</option>
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
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows here -->
            </tbody>
        </table>
    </div>

    <script>
        // JavaScript code here
    </script>
</body>

</html>
