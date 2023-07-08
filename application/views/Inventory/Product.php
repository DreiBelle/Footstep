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
            margin-left: 90vh;
            width: 400px;
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
            width: 130px;
            margin-top: -62px;
            padding: 10px;
            position: absolute;
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
            font-family: "Arial", Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>
    <div id="contents">
        <div class="search-form">
            <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Inventory
                Management</h1>
                <form method="get" action="<?php echo site_url('InventoryController/ViewProducts'); ?>">
                <input type="text" name="asd" placeholder="Search by ID">
                <input type="submit" value="Search">
            </form>
        </div>

        <div class="add-btn">
            <button id="AddProductbtn">
                <i class="fas fa-plus-circle"></i> Add Product
            </button>

            <div id="AddProductModal" class="modal">
                <div class="flex-center">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form method="post" action="<?php echo site_url('InventoryController/add_prod'); ?>"
                            class="form-container">
                            <!-- <h2>Purchase</h2> -->
                            <label for="ProductImage"><i class="fas fa-image"></i> Product Image:</label>
                            <input type="file" name="ProductImage" id="ProductImage" accept="image/*" required>

                            <label for="ProductId"><i class="fas fa-barcode"></i> Product ID:</label>
                            <input type="text" name="ProductId" id="ProductId" required>

                            <label for="ProductName"><i class="fas fa-tag"></i> Product Name:</label>
                            <input type="text" name="ProductName" id="ProductName" required>

                            <label for="Category"><i class="fas fa-tags"></i> Category:</label>
                            <input type="text" name="Category" id="Category" required>

                            <label for="Price"><i class="fas fa-money-bill"></i> Price:</label>
                            <input type="text" name="Price" id="Price" required>

                            <label for="Quantity"><i class="fas fa-sort-numeric-up"></i> Quantity:</label>
                            <input type="text" name="Quantity" id="Quantity" required>

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
                <?php foreach ($check as $data) { ?>
                    <tr>
                        <td>
                        <img src="<?php echo MAIN_BASE_URL . $data['Product_image']; ?>"></td>
                        </td>
                        <td>
                            <?php echo $data['Product_id']; ?>
                        </td>
                        <td>
                            <?php echo $data['Product_name']; ?>
                        </td>
                        <td>
                            <?php echo $data['Category']; ?>
                        </td>
                        <td>
                            <?php echo $data['Price']; ?>
                        </td>
                        <td>
                            <?php echo $data['Quantity']; ?>
                        </td>
                        <td>
                            <button class="action-btn edit-btn" onclick="showForm(
                                    '<?php echo $data['Product_image']; ?>',
                                    '<?php echo $data['Product_id']; ?>',
                                    '<?php echo $data['Product_name']; ?>',
                                    '<?php echo $data['Category']; ?>',
                                    '<?php echo $data['Price']; ?>',
                                    '<?php echo $data['Quantity']; ?>'
                                )"><i class="fas fa-shopping-cart"></i> Buy
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var button = document.getElementById("AddProductbtn");
                var modal = document.getElementById("AddProductModal");
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

            function searchById() {
                    var searchId = document.getElementById('search-id').value;
                    console.log('Search by ID:', searchId);
                }
        </script>
</body>

</html>