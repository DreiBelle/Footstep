<!DOCTYPE html>
<html>

<head>
    <title>Setting</title>
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

        .card {
            background-color: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-content {
            flex-grow: 1;
        }

        .text-blue-500 {
            color: #3b82f6;
        }

        .text-blue-500:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <?php $this->load->view($navbar); ?>
    <!-- End of Navigation Bar -->

    <div id="contents">
        <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Setting</h1>
        <!-- Inserted code starts -->
        <?php foreach ($records as $record) : ?>
            <div class="card">
                <div class="card-content">
                    <strong>No:</strong> <?php echo $record['No']; ?><br>
                    <strong>Student Name:</strong> <?php echo $record['Student Name']; ?><br>
                    <?php if (!empty($record['URL'])) : ?>
                        <strong>URL:</strong>
                        <a href="http://<?php echo $record['URL']; ?>" class="text-blue-500" target="_blank">
                            <?php echo $record['URL']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    
    </div>
</body>

</html>
