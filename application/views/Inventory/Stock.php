<!DOCTYPE html>
<html>

<head>
    <title>Stock</title>
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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="flex">
        <div class="flex w-1/4">
        <?php $this->load->view($navbar) ?>
        </div>
        <div class="flex flex-col w-3/4">
            <div id="contents">
                <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Inventory
                    Management</h1>
            </div>

            <div id="" >
                <h3
                    class="text-lg font-semibold mb-4 text-center text-gray-800 bg-indigo-100 py-2 px-4 rounded-md w-2/3 mx-auto">
                </h3>
                <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($stocks as $stock): ?>
                        <div class="p-6 bg-yellow-200 shadow rounded border-2 border-green-800 product">
                            <img src="<?php echo MAIN_BASE_URL . $stock->Product_image; ?>" alt="Product Image"
                                class="mb-2">
                            <p class="font-semibold text-gray-800 product-name">
                                <?php echo $stock->Product_name; ?>
                            </p>
                            <p class="text-gray-800 product-category">Category:
                                <?php echo $stock->Category; ?>
                            </p>
                            <p class="text-gray-800">Price:
                                <?php echo $stock->Price; ?>
                            </p>
                            <p class="text-gray-800">Stock:
                                <?php echo $stock->Stock; ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>