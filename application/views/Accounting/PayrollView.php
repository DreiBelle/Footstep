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

        .card {
            background-color: #ffffff;
            border: 1px solid #e4e4e4;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: 85vh;
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
            max-width: 450px;
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
            background-color: #ffc107;
            /* Banana orange color */
            color: black;
        }

        .action-btn.edit-btn {
            background-color: #007bff;
            color: white;
        }

        .action-btn:hover {
            background-color: #FFD700;
        }


        .fa-icon {
            margin-right: 5px;
            /* Adjust the spacing between icon and text */
        }
    </style>
</head>

<body>
    <div id="navbar">
        <?php $this->load->view($navbar) ?>
    </div>
    <div id="contents">
        <div class="content">
            <div class="card">
                <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Payroll
                </h1>
                <table>
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Hire Date</th>
                            <th>Address</th>

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
                                    <button class="action-btn add-btn"
                                        onclick="showAddSalaryModal('<?php echo $employee['Employee_id']; ?>')">
                                        <i class="fas fa-plus-circle"></i> Add Salary
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br><br>
                <table style="margin-left: 0px;">
                    <thead>
                        <tr>
                            <th>Payroll ID</th>
                            <th>Staff ID</th>
                            <th>Salary</th>
                            <th>Date Received</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payroll as $pay): ?>
                            <tr>
                                <td>
                                    <?php echo $pay['Payroll_ID']; ?>
                                </td>
                                <td>
                                    <?php echo $pay['Employee_id']; ?>
                                </td>
                                <td>
                                    <?php echo $pay['Salary']; ?>
                                </td>
                                <td>
                                    <?php echo $pay['Date_received']; ?>
                                </td>
                                <td>
                                    <?php echo $pay['Type']; ?>
                                </td>
                                <td>
                                    <?php echo $pay['Status']; ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </div>
        </div>


        <div id="AddSalaryModal" class="modal">
            <div class="modal-content">
                <h2>Add Salary</h2>
                <form class="modal-form"
                    action="<?php echo site_url('Accounting_Controller/PayrollController/insertSalary'); ?>"
                    method="post">
                    <input type="hidden" id="employeeIdInput" name="employeeId">
                    <div class="form-group">
                        <label for="salaryInput">Salary:</label>
                        <input class="salary-input" type="text" id="salaryInput" name="salary" placeholder="Salary"
                            required
                            style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                    </div>
                    <div class="form-group">
                        <label for="dateReceivedInput">Date Received:</label>
                        <input class="salary-input" type="date" id="dateReceivedInput" name="dateReceived" required
                            style="width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                        <div class="modal-actions">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <button style="width: 70%; height: 40px; padding: 10px; border: none; color: #FFD700; font-size: 16px;
                        cursor: pointer; text-align: center; display: flex; flex-direction: column; 
                        align-items: center; justify-content: center; background-color: black;" type="submit">Pay
                                    Cash</button>
                                <button style="width: 70%; height: 40px; padding: 10px; border: none; color: #FFD700; font-size: 16px;
                        cursor: pointer; text-align: center; display: flex; flex-direction: column; 
                        align-items: center; justify-content: center; background-color: black; 
                        margin-left: 10px;" onclick="hideAddSalaryModal()">Cancel</button>
                                <button style="width: 70%; height: 40px; padding: 10px; border: none; color: #FFD700; font-size: 16px;
                        cursor: pointer; text-align: center; display: flex; flex-direction: column; 
                        align-items: center; justify-content: center; background-color: black; 
                        margin-left: 10px;" onclick="payemployeebank()">PayMOMUKHAMO</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>

        <div id="SalaryModal" class="modal">
            <div class="modal-content">
                <h2>Edit Salary</h2>
                <form class="modal-form"
                    action="<?php echo site_url('Accounting_Controller/PayrollController/updateSalary'); ?>"
                    method="post">
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
            function payemployeebank() {
                var salary = document.getElementById("salaryInput");

                var url = "http://192.168.10.128/RBBI/index.php/access/index/111/" + salary.value + "/?url=http://192.168.10.120/Footstep/index.php/CheckoutController&data=";
                window.location.href = url;
            }

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