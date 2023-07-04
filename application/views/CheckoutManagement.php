<!DOCTYPE html>
<html>
<head>
    <title>CheckoutManagement</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
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

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            color: black;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .add-btn, .search-form button {
            cursor: pointer;
        }

        .add-btn {
            margin-left: 0px;
            margin-top: -50px;
        }

        .add-btn button {
            background: linear-gradient(45deg, #f1c40f, #e0b832); /* Gradient background for the "Add Payment" button */
            color: black; /* Font color for the "Add Payment" button */
            border: 2px solid #f1c40f; /* Yellow border for the "Add Payment" button */
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style for the "Search" button */
        .search-form button {
            background: linear-gradient(45deg, #f1c40f, #e0b832); /* Gradient background for the "Search" button */
            color: black; /* Font color for the "Search" button */
            border: 2px solid #f1c40f; /* Yellow border for the "Search" button */
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .add-btn button:hover, .search-form button:hover {
            transform: translateY(-2px); /* Lift the button slightly on hover */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow on hover */
        }
        .search-form {
            display: inline-block;
            margin-bottom: 10px;
            margin-left: 130px;
        }

        .form-container {
            display: none;
        }

        form {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        button[type="submit"],
        button[type="button"] {
            margin-bottom: 5px;
            padding: 6px 12px;
            border: 1px solid black;
            border-radius: 4px;
        }

        /* New styles for the table */
        table {
            background-color: #f9f9f9; /* Light gray background for the table */
            color: black; /* Font color of the table */
            margin-top: 20px;
        }

        th {
            background-color: #f1c40f; /* Yellow header background */
            color: #fff; /* White text color for the header */
        }

        tr:nth-child(even) {
            background-color: #fafafa; /* Alternate row background color */
        }

        /* Styles for action buttons */
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: #fff; /* Font color for the buttons */
        }

        .action-btn.edit-btn {
            background-color: #3498db; /* Blue background for the Edit button */
        }

        .action-btn.delete-btn {
            background-color: #e74c3c; /* Red background for the Delete button */
            margin-left: 5px;
        }

        .action-btn.edit-btn:hover, .action-btn.delete-btn:hover {
            background-color: #2980b9; /* Darker blue background on hover */
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
            <button onclick="showForm('add-form')">Add Payment</button>
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
                        <td><?php echo $data['Payment_id']; ?></td>
                        <td><?php echo $data['Product']; ?></td>
                        <td><?php echo $data['Description']; ?></td>
                        <td><?php echo $data['Total_payment']; ?></td>
                        <td><?php echo $data['Payment_method']; ?></td>
                        <td><?php echo $data['Payment_date']; ?></td>
                        <td>
                            <button class="action-btn edit-btn" onclick="showForm('edit-form', <?php echo $data['Payment_id']; ?>')">Edit</button>
                            <button class="action-btn delete-btn" onclick="deleteRecord(<?php echo $data['Payment_id']; ?>')">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Add/Edit Form -->
        <div class="form-container" id="form">
            <!-- The form content will be filled dynamically based on whether it's an add or edit form -->
        </div>

        <script>
            function showForm(formId, id = null) {
                var formContainer = document.getElementById('form');
                var formContent = '';

                if (formId === 'add-form') {
                    formContent += '<h3>Add Record</h3>';
                    formContent += '<form action="<?php echo base_url('CheckoutController/addCheckout'); ?>" method="post">';
                    formContent += '<label for="product">Product:</label>';
                    formContent += '<input type="text" name="Product" required>';
                    // Add other input fields for the form
                    formContent += '<button type="submit">Add</button>';
                } else if (formId === 'edit-form') {
                    // Get the data of the record with the given ID from the PHP array
                    var record = <?php echo json_encode($checkoutData); ?>;
                    var index = record.findIndex(item => item.Payment_id === id);

                    if (index !== -1) {
                        var data = record[index];

                        formContent += '<h3>Edit Record</h3>';
                        formContent += '<form action="<?php echo base_url('CheckoutController/updateCheckout'); ?>" method="post">';
                        formContent += '<input type="hidden" name="Payment_id" value="' + data.Payment_id + '">';
                        formContent += '<label for="product">Product:</label>';
                        formContent += '<input type="text" name="Product" value="' + data.Product + '" required>';
                        // Add other input fields for the form
                        formContent += '<button type="submit">Update</button>';
                    } else {
                        console.log('Record not found');
                        return;
                    }
                }

                formContent += '<button type="button" onclick="hideForm()">Cancel</button>';
                formContent += '</form>';
                formContainer.innerHTML = formContent;
                formContainer.style.display = 'block';
            }

            function hideForm() {
                document.getElementById('form').style.display = 'none';
            }

            function deleteRecord(id) {
                // Code to delete the record with the given ID
                // You can use AJAX to perform the delete operation without reloading the page
                console.log('Delete record with ID:', id);
            }

            function searchById() {
                var searchId = document.getElementById('search-id').value;
                // Code to search the table for records with the given ID and display the results
                console.log('Search by ID:', searchId);
            }
        </script>
    </div>
</body>
</html>
