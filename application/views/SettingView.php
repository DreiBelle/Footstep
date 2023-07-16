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

        .table-auto {
            width: 100%;
            border-collapse: collapse;
        }

        .table-auto th,
        .table-auto td {
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
            text-align: left;
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
    <?php $this->load->view($navbar) ?>
    <div id="contents">
        <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Setting</h1>
        <!-- Inserted code starts -->
        <table class="table-auto mt-5">
            <thead>
                <tr>
                    <th class="px-10 py-2">No</th>
                    <th class="px-10 py-2">Student Name</th>
                    <th class="px-10 py-2">URL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record) : ?>
                    <tr>
                        <td class="border px-10 py-2"><?php echo $record['No']; ?></td>
                        <td class="border px-10 py-2"><?php echo $record['Student Name']; ?></td>
                        <td class="border px-10 py-2">
                            <?php if (!empty($record['URL'])) : ?>
                                <a href="http://<?php echo $record['URL']; ?>" class="text-blue-500" target="_blank">
                                    <?php echo $record['URL']; ?>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Inserted code ends -->
    </div>
</body>

</html>
