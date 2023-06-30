<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-color: #f7fafc;
            font-family: Arial, sans-serif;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #edf2f7;
        }

        .login-form {
            max-width: 400px;
            width: 100%;
            padding: 24px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-form h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 16px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            font-weight: bold;
            color: #4a5568;
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #4299e1;
        }

        .submit-btn {
            background-color: #4299e1;
            color: #fff;
            padding: 10px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #3182ce;
        }

        .text-center {
            text-align: center;
            margin-top: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <form method="post" action="<?php echo site_url('LoginController/authenticate'); ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="text-center">
                    <input type="submit" value="Login" class="submit-btn">
                </div>
            </form>
        </div>
    </div>
</body>
</html>