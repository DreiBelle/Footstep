<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: "Arial", "Helvetica", sans-serif;
            margin: 0;
        }

        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(120vh - 60px); /* Subtract navbar height from the viewport height */
            background-color: #f2f2f2; /* Light gray background */
            padding-top: 10px;
        }

        h1 {
            font-size: 32px;
            color: #333333;
            margin-bottom: 50px;
            margin-left: 200px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1); /* Add a subtle text shadow */
        }

        #welcome-section {
            background-color: #dddddd; /* Gray background */
            padding: 20px;
            margin-left: 150px;
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center the content */
        }
    </style>
</head>

<body>
    <?php $this->load->view($navbar); ?>
    <div id="container">
       <!-- <div id="welcome-section"> -->
           <h1>Welcome to Dashboard!</h1>    
       </div>
    </div>
</body>

</html>
