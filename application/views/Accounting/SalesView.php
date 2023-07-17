<html>

<head>
    <title>Sales</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        .contents {
            margin-left: 300px;
            padding-top: 80px;
            margin-right: 320px;
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
            width: calc(100% / 8);
            /* Divide equally into 8 columns */
        }

        td {
            vertical-align: middle;
            width: calc(100% / 8);
            /* Divide equally into 8 columns */
        }

        .total-sales {
            background-color: black;
            color: #FFD700;
            padding: 10px;
            text-align: right;
            margin-top: 20px;
        }

        .total-sales strong {
            color: #FFD700;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>

    <div class="contents">
       
        <div class="card">
        <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Sales</h1>
            <div name="table for showing the employees alongside the salary">
                <table>
                    <thead>
                        <tr>
                            <th style="width: calc(100% / 8); font-weight: bold;">Product ID</th>
                            <th style="width: calc(100% / 8); font-weight: bold;">Purchase Date</th>
                            <th style="width: calc(100% / 8); font-weight: bold;">Total Bought</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Sales as $Sale): ?>
                            <tr>
                                <td><?php echo $Sale->ID; ?></td>
                                <td><?php echo $Sale->Date; ?></td>
                                <td><?php echo $Sale->TotalPrice; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="total-sales">
            <strong>Total Sales:</strong> <?php echo $Total; ?>
        </div>
    </div>
</body>

</html>
