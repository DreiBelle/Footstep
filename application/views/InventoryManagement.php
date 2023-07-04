<!DOCTYPE html>
<html>

<head>
    <title>Inventory Management</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
              #contents {
            margin-left: 300px;
            padding-top: 80px;
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
            <button id="AddCheckoutbtn">Add Payment</button>

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
