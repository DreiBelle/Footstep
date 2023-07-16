<!DOCTYPE html>
<html>

<head>
    <title>Payroll</title>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <style>
        #contents {
            margin-left: 300px;
            padding-top: 80px;
            min-width: 700px;
            /* Adjust the min-width value as needed */
        }

        .content {
            min-width: 700px;
            /* Adjust the min-width value as needed */
            padding: 20px;
            /* Add padding to the content */
            margin-right: 320px;
            /* Add margin to the right to accommodate the sidebar */
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
            width: calc(100% / 8);
            /* Divide equally into 8 columns */
        }

        td {
            vertical-align: middle;
            width: calc(100% / 8);
            /* Divide equally into 8 columns */
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

        .modal-form .form-group {
            margin-bottom: 10px;
        }

        .modal-form .form-group label {
            display: block;
        }

        .modal-form .form-group input {
            padding: 8px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .modal-actions {
            margin-top: 10px;
        }

        .modal-actions button {
            margin-right: 5px;
        }

        .action-btn {
            width: 120px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: black;
            cursor: pointer;
            font-family: "Arial", "Helvetica", sans-serif;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .action-btn.add-btn {
            background-color: #dc3545;
            color: white;
        }

        .action-btn.edit-btn {
            background-color: #007bff;
            color: white;
        }

        .action-btn:hover {
            background-color: #f2f2f2;
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
                        <th>Date Received</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td>
                                <?php echo $employee['Employee_id']; ?>
                            </td>
                            <td>
                                <?php echo $employee['Employee_name']; ?>
                            </td>
                            <td>
                                <?php echo $employee['Employee_position']; ?>
                            </td>
                            <td>
                                <?php echo $employee['Hire_date']; ?>
                            </td>
                            <td>
                                <?php echo $employee['Employee_address']; ?>
                            </td>
                            <td>
                                <?php if ($employee['Salary']): ?>
                                    <?php echo $employee['Salary']; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($employee['Salary'] && isset($employee['Date_received'])): ?>
                                    <?php echo $employee['Date_received']; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!$employee['Salary']): ?>
                                    <button class="action-btn add-btn"
                                        onclick="showAddSalaryModal('<?php echo $employee['Employee_id']; ?>')">
                                        <i class="fas fa-plus-circle"></i> Add Salary
                                    </button>
                                <?php else: ?>
                                    <button class="action-btn edit-btn"
                                        onclick="showSalaryModal('<?php echo $employee['Employee_id']; ?>', '<?php echo $employee['Salary']; ?>', '<?php echo $employee['Date_received']; ?>')"
                                        data-salary="<?php echo $employee['Salary']; ?>"
                                        data-date-received="<?php echo $employee['Date_received']; ?>">
                                        <i class="fas fa-edit"></i> Edit Salary
                                    </button>


                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="AddSalaryModal" class="modal">
        <div class="modal-content">
            <h2>Add Salary</h2>
            <form class="modal-form"
                action="<?php echo site_url('Accounting_Controller/PayrollController/insertSalary'); ?>" method="post">
                <input type="hidden" id="employeeIdInput" name="employeeId">
                <div class="form-group">
                    <label for="salaryInput">Salary:</label>
                    <input class="salary-input" type="text" id="salaryInput" name="salary" placeholder="Salary"
                        required>
                </div>
                <div class="form-group">
                    <label for="dateReceivedInput">Date Received:</label>
                    <input class="salary-input" type="date" id="dateReceivedInput" name="dateReceived" required>
                </div>
                <div class="modal-actions">
                    <button class="salary-submit" type="submit">Add</button>
                    <button class="cancel-button" onclick="hideAddSalaryModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div id="SalaryModal" class="modal">
        <div class="modal-content">
            <h2>Edit Salary</h2>
            <form class="modal-form"
                action="<?php echo site_url('Accounting_Controller/PayrollController/updateSalary'); ?>" method="post">
                <input type="hidden" id="employeeIdInput" name="employeeId">
                <div class="form-group">
                    <label for="salaryInput">Salary:</label>
                    <input class="salary-input" type="text" id="salaryInput" name="salary" placeholder="Salary"
                        required>
                </div>
                <div class="form-group">
                    <label for="dateReceivedInput">Date Received:</label>
                    <input class="salary-input" type="date" id="dateReceivedInput" name="dateReceived" required>
                </div>
                <div class="modal-actions">
                    <button class="salary-submit" type="submit">Save</button>
                    <button class="cancel-button" onclick="hideSalaryModal()">Cancel</button>
                </div>
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
        function showSalaryModal(employeeId, salary, dateReceived) {
            var modal = document.getElementById("SalaryModal");
            var employeeIdInput = document.getElementById("employeeIdInput");
            var salaryInput = document.getElementById("salaryInput");
            var dateReceivedInput = document.getElementById("dateReceivedInput");

            employeeIdInput.value = employeeId;
            salaryInput.value = salary;
            dateReceivedInput.value = dateReceived;

            modal.style.display = "block";
        }


        function hideSalaryModal() {
            var modal = document.getElementById("SalaryModal");
            modal.style.display = "none";
        }
    </script>
</body>

</html>