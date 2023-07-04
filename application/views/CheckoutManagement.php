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

        th,td {
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

        .search-form button {
            background: linear-gradient(45deg, #f1c40f, #e0b832);
            /* Gradient background for the "Search" button */
            color: black;
            border: 2px solid #f1c40f;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .add-btn button:hover,
        .search-form button:hover {
            transform: translateY(-2px);
            /* Lift the button slightly on hover */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            /* Add a subtle shadow on hover */
        }

        .search-form {
            display: inline-block;
            margin-bottom: 10px;
            margin-left: 130px;
        }

        input[type="text"],
        button[type="submit"],
        button[type="button"] {
            margin-bottom: 5px;
            padding: 6px 12px;
            border: 1px solid black;
            border-radius: 4px;
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
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #888;
            padding: 20px;
            width: 50%;
            height: 75%;
            border-radius: 25px;
            display: flex;
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
            background-color: #f9f9f9;
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
            s border-radius: 4px;
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
        <div class="search-form">
            <label for="search-id">Search by ID:</label>
            <input type="text" id="search-id" name="search-id">
            <button onclick="searchById()">Search</button>
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
                                <button class="action-btn edit-btn"
                                    onclick="showForm('edit-form', <?php echo $data['Payment_id']; ?>)">Edit</button>
                                <button class="action-btn delete-btn"
                                    onclick="deleteRecord(<?php echo $data['Payment_id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <script>
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

                function hideForm() {
                    document.getElementById('form').style.display = 'none';
                }

                // function deleteRecord(id) {
                //     console.log('Delete record with ID:', id);
                // }

                function searchById() {
                    var searchId = document.getElementById('search-id').value;
                    console.log('Search by ID:', searchId);
                }

                function deleteRecord(PaymentId) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url("CheckoutController/DeleteCheckout"); ?>',
                        data: { PaymentId: PaymentId },
                        success: function (response) {
                            if (response.success) {
                                console.log('Record deleted successfully!');
                            } else {
                                console.error('Failed to delete the record.');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error occurred during the deletion:', error);
                        }
                    });
                }
            </script>
        </div>
</body>

</html>