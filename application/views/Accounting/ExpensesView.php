<!DOCTYPE html>
<html>

<head>
    <title>Expenses</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        #contents {
            margin-left: 300px;
            padding-top: 80px;
            min-width: 700px; /* Adjust the min-width value as needed */
        }

        .content {
            min-width: 700px; /* Adjust the min-width value as needed */
            padding: 20px; /* Add padding to the content */
            margin-right: 320px; /* Add margin to the right to accommodate the sidebar */
            margin-left: 300px;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            font-weight: bold;
        }

        td {
            vertical-align: middle;
        }

        td.image-cell {
            width: 180px;
            height: 180px;
        }

        td.image-cell img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div id="navbar">
        <?php $this->load->view($navbar) ?>
    </div>
    <div id="contents">
        <div class="content">
            <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Expenses</h1>
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Price Paid</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Slippers as $item): ?>
                    <tr>
                        <td><?php echo $item->Product_id; ?></td>
                        <td class="image-cell"><img src="<?php echo MAIN_BASE_URL . $item->Product_image; ?>" alt="Product Image"></td>
                        <td><?php echo $item->Product_name; ?></td>
                        <td><?php echo $item->Quantity; ?></td>
                        <td><?php echo $item->Price; ?></td>
                        <td><?php echo $item->TotalProductExpenses; ?></td>
                    </tr>
                    <?php endforeach ?>

                    <?php foreach ($RubberShoes as $item): ?>
                    <tr>
                        <td><?php echo $item->Product_id; ?></td>
                        <td class="image-cell"><img src="<?php echo MAIN_BASE_URL . $item->Product_image; ?>" alt="Product Image"></td>
                        <td><?php echo $item->Product_name; ?></td>
                        <td><?php echo $item->Quantity; ?></td>
                        <td><?php echo $item->Price; ?></td>
                        <td><?php echo $item->TotalProductExpenses; ?></td>
                    </tr>
                    <?php endforeach ?>

                    <?php foreach ($BlackShoes as $item): ?>
                    <tr>
                        <td><?php echo $item->Product_id; ?></td>
                        <td class="image-cell"><img src="<?php echo MAIN_BASE_URL . $item->Product_image; ?>" alt="Product Image"></td>
                        <td><?php echo $item->Product_name; ?></td>
                        <td><?php echo $item->Quantity; ?></td>
                        <td><?php echo $item->Price; ?></td>
                        <td><?php echo $item->TotalProductExpenses; ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
