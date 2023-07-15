<!DOCTYPE html>
<html>

<head>
    <title>Payroll</title>
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
            width: calc(100% / 6); /* Divide equally into 6 columns */
        }

        td {
            vertical-align: middle;
            width: calc(100% / 6); /* Divide equally into 6 columns */
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

        .salary-input {
            width: 70px;
        }

        .salary-submit {
            margin-top: 10px;
        }

        /* CSS styles for the modal */
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
            margin: 200px auto;
            max-width: 400px;
            padding: 20px;
            font-family: "Arial", "Helvetica", sans-serif;
        }
    </style>
</head>

<body>
    <div id="navbar">
        <?php $this->load->view($navbar) ?>
    </div>
    <div id="contents">
        <div class="content">
            <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Payroll</h1>
            <table>
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Hire Date</th>
                        <th>Address</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?php echo $employee['Employee_id']; ?></td>
                            <td><?php echo $employee['Employee_name']; ?></td>
                            <td><?php echo $employee['Employee_position']; ?></td>
                            <td><?php echo $employee['Hire_date']; ?></td>
                            <td><?php echo $employee['Employee_address']; ?></td>
                            <td>
                                <?php if ($employee['Salary']): ?>
                                    <?php echo $employee['Salary']; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!$employee['Salary']): ?>
                                    <button onclick="showAddSalaryModal('<?php echo $employee['Employee_id']; ?>')">Add Salary</button>
                                <?php else: ?>
                                    <form class="salary-form" action="<?php echo base_url('PayrollController/insertSalary'); ?>" method="post">
                                        <input type="hidden" name="employeeId" value="<?php echo $employee['Employee_id']; ?>">
                                        <input class="salary-input" type="text" name="salary" placeholder="Salary" required>
                                        <button class="salary-submit" type="submit">Add</button>
                                    </form>
                                <?php endif; ?>
                                <!-- Add other actions if needed -->
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="AddSalaryModal" class="modal">
        <div class="modal-content">
            <h2>Add Salary</h2>
            <form action="<?php echo base_url('PayrollController/insertSalary'); ?>" method="post">

                <input type="hidden" id="employeeIdInput" name="employeeId">
                <label for="salaryInput">Salary:</label>
                <input class="salary-input" type="text" id="salaryInput" name="salary" placeholder="Salary" required>
                <button class="salary-submit" type="submit">Add</button>
                <button onclick="hideAddSalaryModal()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function showAddSalaryModal(employeeId) {
            var modal = document.getElementById("AddSalaryModal");
            var employeeIdInput = document.getElementById("employeeIdInput");
            employeeIdInput.value = employeeId;
            modal.style.display = "block";
        }

        function hideAddSalaryModal() {
            var modal = document.getElementById("AddSalaryModal");
            modal.style.display = "none";
        }
    </script>
</body>

</html>
