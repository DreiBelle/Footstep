<!DOCTYPE html>
<html>

<head>
    <title>Human Resource Management</title>

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
            background-color: #ffffff;
            border: 1px solid #e4e4e4;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .search-form {
            margin-bottom: 20px;
            /* margin-left: 10%; */
        }

        .search-form input[type="text"] {
            margin-left: 90vh;
            width: 30%;
            padding: 10px;
            border: 1px solid #f9f9f9;
            border-radius: 4px;
            background-color: rgba(255, 193, 7, 0.8);
            /* Adjust the alpha value (0.8) as needed */
            color: black;
            outline: none;
            font-family: "Arial", "Helvetica", sans-serif;
        }


        .search-form input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            width: 100px;
            background-color: #ffc107;
            color: black;
            cursor: pointer;
            font-family: "Arial", "Helvetica", sans-serif;
            transition: background-color 0.3s;
        }


        .add-btn {
            margin-bottom: 20px;
        }

        .add-btn button {
            width: 150px;
            margin-top: -62px;
            padding: 10px;
            position: absolute;
            border: none;
            border-radius: 4px;
            background-color: #ffc107;
            color: black;
            cursor: pointer;
            font-family: "Arial", "Helvetica", sans-serif;
            transition: background-color 0.3s;
        }

        .modal-content {
            background-color: #f9f9f9;
            border: 1px solid #f9f9f9;
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content h2 {
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content label {
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content input[type="text"],
        .modal-content input[type="date"],
        .modal-content select {
            background-color: #f9f9f9;
            color: black;
            border: 1px solid #f9f9f9;
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 16px;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content input[type="submit"] {
            background-color: #f9f9f9;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .modal-content input[type="submit"]:hover {
            background-color: #e0b832;
        }

        table {

            border-collapse: collapse;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #f9f9f9;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        th {
            background-color: #f9f9f9;
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: black;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .action-btn.edit-btn {
            background-color: #ffc107;
        }



        .action-btn.edit-btn:hover,
        .action-btn.delete-btn:hover {
            background-color: #FFD700;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            background-color: #f9f9f9;
            border: 0px solid #f9f9f9;
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 500px;
            margin-top: 550px;
            width: 1px;
            height: 1px;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .Editmodal-content {
            background-color: #ffc107;
            border: 0px solid #f9f9f9;
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 500px;
            margin-top: 700px;
            width: 1px;
            height: 1px;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #f9f9f9;
            color: black;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        .form-container input[type="text"],
        .form-container input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #f9f9f9;
            border-radius: 4px;
            margin-bottom: 16px;
            font-family: "Arial", "Helvetica", sans-serif;
        }

        .form-container input[type="submit"] {
            background-color: #f9f9f9;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            font-family: "Arial", Helvetica, sans-serif;
        }

        .form-container input[type="cancel"] {
            background-color: #f9f9f9;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            font-family: "Arial", Helvetica, sans-serif;
        }
        
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>
    <div id="contents">
        <div class="card">
            <div class="search-form">
                <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Human Resource
                    Management</h1>
                <form method="get" action="<?php echo site_url('HRController/viewEmployee'); ?>">
                    <input type="text" name="asd" placeholder="Search by ID">
                    <input type="submit" value="Search">
                </form>
            </div>

            <div class="add-btn">
                <button id="AddEmployeebtn">
                    <i class="fas fa-plus-circle"></i> Add Employee
                </button>

                <div id="AddEmployeeModal" class="modal">
                    <div class="flex-center">
                        <div class="modal-content">
                            <!-- <span class="close">&times;</span> -->
                            <form method="post" action="<?php echo site_url('HRController/addEmployee'); ?>"
                                class="form-container">
                                <h2>Add Employee</h2> 
                                <input type="hidden" name="EmployeeId" id="EmployeeId" required
                                    style="border: 1px solid lightgray;">

                                <label for="Name"><i class="fas fa-barcode"></i> Name:</label>
                                <input type="text" name="Name" id="Name" required style="border: 1px solid lightgray;">

                                <label for="Position"><i class="fas fa-tag"></i> Position:</label>
                                <input type="text" name="Position" id="Position" required
                                    style="border: 1px solid lightgray;">

                                <label for="HireDate"><i class="fas fa-tags"></i> Hire Date:</label>
                                <input type="date" name="HireDate" id="HireDate" required
                                    style="border: 1px solid lightgray;">

                                <label for="Address"><i class="fas fa-money-bill"></i> Address:</label>
                                <input type="text" name="Address" id="Address" required
                                    style="border: 1px solid lightgray;">

                                <div>
                                    <input type="submit" value="SAVE"
                                        style="display: inline-block; background-color: #007bff; color: #fff; border: none; border-radius: 4px; padding: 8px 16px; margin-right: 10px; cursor: pointer;">
                                    <input type="button" value="CANCEL" onclick="closeModal()"
                                        style="display: inline-block; background-color: #dc3545; color: #fff; border: none; border-radius: 4px; padding: 8px 16px; cursor: pointer; width: 360px; margin-top: 5px;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- EdIt -->
            <div id="EditModal" class="modal">
                <div style="margin-right: 900px; margin-top: -300px; margin-left: -80px;">
                    <div id="EditModalContent" class="Editmodal-content">
                        <!-- <span class="close1" style="color: black; cursor: pointer; font-size: 24px;"
                            onclick="closeForm()">&times;</span>  -->

                        <form method="post" action="<?php echo site_url('HRController/editEmployee'); ?>"
                            class="form-container">
                            <h2>Update Payment</h2>
                    
                            <input type="hidden" name="EmployeeIdInput" id="EmployeeIdInput" required
                                style="border: 1px solid gray;">

                            <label for="NameInput"><i class="fas fa-box"></i> Name:</label>
                            <input type="text" name="NameInput" id="NameInput" required style="border: 1px solid gray;">

                            <label for="PositionInput"><i class="fas fa-file-alt"></i> Position:</label>
                            <input type="text" name="PositionInput" id="PositionInput" required
                                style="border: 1px solid gray;">

                            <label for="HireDateInput"><i class="fas fa-dollar-sign"></i> Hire Date:</label>
                            <input type="date" name="HireDateInput" id="HireDateInput" required
                                style="border: 1px solid gray;">

                            <label for="AddressInput"><i class="fas fa-credit-card"></i> Payment Method:</label>
                            <input type="text" name="AddressInput" id="AddressInput" required
                                style="border: 1px solid gray;">
                            <div>
                            <input type="submit" value="SAVE"
                                        style="display: inline-block; background-color: #007bff; color: #fff; border: none; border-radius: 4px; padding: 8px 16px; margin-right: 10px; cursor: pointer;">
                                <input type="button" value="CANCEL" onclick="closeForm()"
                                        style="display: inline-block; background-color: #dc3545; color: #fff; border: none; border-radius: 4px; padding: 8px 16px; cursor: pointer; width: 360px; margin-top: 5px;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="15.67%">Employee ID</th>
                        <th width="16.67%">Name</th>
                        <th width="16.67%">Position</th>
                        <th width="16.67%">Hire Date</th>
                        <th width="16.67%">Address</th>
                        <th width="19.67%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($check as $data) { ?>
                        <tr>
                            <td>
                                <?php echo $data['Employee_id']; ?>
                            </td>
                            <td>
                                <?php echo $data['Name']; ?>
                            </td>
                            <td>
                                <?php echo $data['Position']; ?>
                            </td>
                            <td>
                                <?php echo $data['Hire_date']; ?>
                            </td>
                            <td>
                                <?php echo $data['Address']; ?>
                            </td>
                            <td>
                                <button class="action-btn edit-btn" onclick="showForm(
                                        '<?php echo $data['Employee_id']; ?>',
                                        '<?php echo $data['Name']; ?>',
                                        '<?php echo $data['Position']; ?>',
                                        '<?php echo $data['Hire_date']; ?>',
                                        '<?php echo $data['Address']; ?>',
                                    )"> <i class="fas fa-edit"></i> Edit

                                </button>
                                <button onclick="clicks()" class="action-btn edit-btn">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <script>
                function clicks() {
                    window.location.href = "<?php echo site_url("HRController/deleteRecord/" . $data["Employee_id"]) ?>";
                }
                document.addEventListener("DOMContentLoaded", function () {
                    var button = document.getElementById("AddEmployeebtn");
                    var modal = document.getElementById("AddEmployeeModal");
                    var span = document.getElementsByClassName("close")[0];

                    button.onclick = function () {
                        modal.style.display = "block";
                    };

                    span.onclick = function () {
                        modal.style.display = "none";
                    };

                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    };
                })

                function showForm(EmployeeId, Name, Position, HireDate, Address) {
                    var modal = document.getElementById("EditModal");
                    var content = document.getElementById("EditModalContent");

                    var EmployeeIdInput = document.getElementById("EmployeeIdInput");
                    var NameInput = document.getElementById("NameInput");
                    var PositionInput = document.getElementById("PositionInput");
                    var HireDateInput = document.getElementById("HireDateInput");
                    var AddressInput = document.getElementById("AddressInput");

                    EmployeeIdInput.value = EmployeeId;
                    NameInput.value = Name;
                    PositionInput.value = Position;
                    HireDateInput.value = HireDate;
                    AddressInput.value = Address;

                    modal.style.display = "block";
                }

                function hideForm() {
                    document.getElementById('form').style.display = 'none';
                }
                function closeForm() {
                    var modal = document.getElementById("EditModal");
                    modal.style.display = "none";
                }
                function closeModal() {
                    document.getElementById("AddEmployeeModal").style.display = "none";
                }
                function closeForm() {
                    document.getElementById("EditModal").style.display = "none";
                }

                function searchById() {
                    var searchId = document.getElementById('search-id').value;
                    console.log('Search by ID:', searchId);
                }
            </script>
        </div>
    </div>
</body>

</html>
