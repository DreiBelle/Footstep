<html>
<head>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            border: 2px solid black;
        }
        th, td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }
        th:last-child,
        td:last-child {
            border-right: none;
        }
        th {
            background-color: yellow;
        }
        .button-container {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->name; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->password; ?></td>
        </tr>
    </table>
   
    <div class="button-container">
        <button type="button">Add Staff</button>
    </div>
</body>
</html>