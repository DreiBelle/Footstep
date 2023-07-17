<html>

<head>
    <title>
        Expense
    </title>

    <style>
        .contents {
            margin-left: 240px;
            padding-left: 20px;
            padding-top: 90px;
            padding-left: 90px;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        .SelectableRow:hover {
            background-color: lightblue;
        }

        td {
            border: 1px solid black;
        }

        .UpdateDiv {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .UpdateFormContent {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 20px;
            width: fit-content;
            height: fit-content;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>

    <div class="contents">
        <div name="table for showing the the employees alongside the salary">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 16.66%">
                            Item ID
                        </th>
                        <th style="width: 16.66%">
                            Name
                        </th>
                        <th style="width: 16.66%">
                            Bought Stocks
                        </th>
                        <th style="width: 16.66%">
                            Total Stocks
                        </th>
                        <th style="width: 16.66%">
                            Price
                        </th>
                        <th style="width: 16.66%">
                            Bought Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Items as $Item): ?>
                        <tr class="SelectableRow">
                            <td>
                                <?php echo $Item->ItemID; ?>
                            </td>
                            <td>
                                <?php echo $Item->ItemName; ?>
                            </td>
                            <td>
                                <?php echo $Item->Quantity; ?>
                            </td>
                            <td>
                                <?php echo $Item->TotalStock; ?>
                            </td>
                            <td>
                                <?php echo $Item->Price; ?>
                            </td>
                            <td>
                                <?php echo $Item->Date; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>