<!DOCTYPE html>
<html>
<head>
    <title>CheckoutManagement</title>
    <style>
        #contents {
            margin-left: 300px;
            padding-top: 80px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .add-btn {
            margin-bottom: 10px;
        }

        .search-form {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar) ?>
    <div id="contents">
        <div class="add-btn">
            <button onclick="showAddForm()">Add</button>
        </div>

        <div class="search-form">
            <label for="search-id">Search by ID:</label>
            <input type="text" id="search-id" name="search-id">
            <button onclick="searchById()">Search</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <button onclick="showEditForm(1)">Edit</button>
                        <button onclick="deleteRecord(1)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>jane@example.com</td>
                    <td>
                        <button onclick="showEditForm(2)">Edit</button>
                        <button onclick="deleteRecord(2)">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows here -->
            </tbody>
        </table>

        <!-- Add Form - Hidden by default -->
        <div id="add-form" style="display: none;">
            <h3>Add Record</h3>
            <!-- Add form fields here -->
            <button onclick="addRecord()">Save</button>
            <button onclick="hideAddForm()">Cancel</button>
        </div>

        <!-- Edit Form - Hidden by default -->
        <div id="edit-form" style="display: none;">
            <h3>Edit Record</h3>
            <!-- Edit form fields here -->
            <button onclick="updateRecord()">Update</button>
            <button onclick="hideEditForm()">Cancel</button>
        </div>
    </div>

    <script>
        function showAddForm() {
            var addForm = document.getElementById('add-form');
            addForm.style.display = 'block';
        }

        function hideAddForm() {
            var addForm = document.getElementById('add-form');
            addForm.style.display = 'none';
        }

        function showEditForm(id) {
            var editForm = document.getElementById('edit-form');
            // Populate the edit form fields based on the record with the given ID
            editForm.style.display = 'block';
        }

        function hideEditForm() {
            var editForm = document.getElementById('edit-form');
            editForm.style.display = 'none';
        }

        function addRecord() {
            // Code to add the record to the table
            hideAddForm();
        }

        function updateRecord() {
            // Code to update the record in the table
            hideEditForm();
        }

        function deleteRecord(id) {
            // Code to delete the record with the given ID from the table
        }

        function searchById() {
            var searchId = document.getElementById('search-id').value;
            // Code to search the table for records with the given ID and display the results
        }
    </script>
</body>

</html>
