<html>

<head>
    <title>Expense</title>
    <style>
        .contents {
            margin-left: 230px;
            padding-top: 90px;
            padding-left: 90px;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #e4e4e4;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
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
            width: calc(100% / 6);
            /* Divide equally into 6 columns */
        }

        td {
            vertical-align: middle;
            width: calc(100% / 6);
            /* Divide equally into 6 columns */
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>

    <div class="contents">
   
        <div name="table for showing the employees alongside the salary">
            <div class="card">
            <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Purchase Transaction</h1>
                <table>
                    <thead>
                        <tr>
                            <th style="width: calc(100% / 6); font-weight: bold;">Item ID</th>
                            <th style="width: calc(100% / 6); font-weight: bold;">Name</th>
                            <th style="width: calc(100% / 6); font-weight: bold;">Bought Stocks</th>
                            <th style="width: calc(100% / 6); font-weight: bold;">Total Stocks</th>
                            <th style="width: calc(100% / 6); font-weight: bold;">Price</th>
                            <th style="width: calc(100% / 6); font-weight: bold;">Bought Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Items as $Item): ?>
                            <tr>
                                <td><?php echo $Item->ItemID; ?></td>
                                <td><?php echo $Item->ItemName; ?></td>
                                <td><?php echo $Item->Quantity; ?></td>
                                <td><?php echo $Item->TotalStock; ?></td>
                                <td><?php echo $Item->Price; ?></td>
                                <td><?php echo $Item->Date; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
