<html>

<head>
    <title>Sales</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .contents {
            margin-left: 300px;
            padding-top: 80px;
            margin-right: 10px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #e4e4e4;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            height: 80%;
            overflow-y: scroll;
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
            z-index: 2;
        }

        .UpdateFormContent {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 20px;
            width: fit-content;
            height: fit-content;
            z-index: 2;
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
                            <th style="width: calc(100% / 8); font-weight: bold;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Sales as $Sale): ?>
                            <tr>
                                <td>
                                    <?php echo $Sale->ID; ?>
                                </td>
                                <td>
                                    <?php echo $Sale->Date; ?>
                                </td>
                                <td>
                                    <?php echo $Sale->TotalPrice; ?>
                                </td>
                                <td>
                                    <button onclick="ShowUpdateForm('<?php echo $Sale->ID; ?>')" style="background-color: #ffc107; color: black; cursor: pointer; width: 160px;
            padding: 10px; border: none; border-radius: 5px;">See more details...</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="total-sales">
            <strong>Total Sales:</strong>
            <?php echo $Total; ?>
        </div>

        <div name="modal to view sales" id="UpdateDiv" class="UpdateDiv">
            <div class="UpdateFormContent">
                <div id="ModalContent">
                    <table>
                        <thead>
                            <tr>
                                <th>ItemID</th>
                                <th>ItemName</th>
                                <th>ItemQuantity</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Item as $row) { ?>
                                <tr>
                                    <td>
                                        <?php echo $row->ItemID; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->ItemName; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->ItemQuantity; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->Date; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button style="width: 100%;" onclick="closeForm()">Close</button>
            </div>
        </div>

    </div>

    <script>
        function ShowUpdateForm(ID) {
            var UpdateDiv = document.getElementById("UpdateDiv");
            UpdateDiv.style.display = "inline";

            $.post("<?php echo site_url('Accounting_Controller/SalesController/getbyid'); ?>", {
                ItemID: ID
            }, function (data) {

                $("#ModalContent").html(data);
            })

        }

        function closeForm() {
            var UpdateDiv = document.getElementById("UpdateDiv");
            UpdateDiv.style.display = "none";
        }
    </script>
</body>

</html>