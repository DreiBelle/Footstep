<!DOCTYPE html>
<html>
<head>
    <title>CheckoutManagement</title>
    <style>
        #contents {
            margin-left: 300px;
            padding-top: 80px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .add-btn {
            margin-bottom: 10px;
        }

        .search-form {
            margin-bottom: 10px;
        }

        .form-container {
            display: none;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>
    <div id="contents">
        <div class="add-btn">
            <button onclick="showForm('add-form')">Add</button>
        </div>

        <div class="search-form">
            <label for="search-id">Search by ID:</label>
            <input type="text" id="search-id" name="search-id">
            <button onclick="searchById()">Search</button>
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
                            <button onclick="showForm('edit-form', <?php echo $data['Payment_id']; ?>)">Edit</button>
                            <button onclick="deleteRecord(<?php echo $data['Payment_id']; ?>)">Delete</button>
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
