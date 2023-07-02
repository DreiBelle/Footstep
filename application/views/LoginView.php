<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
        }

        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        .container {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden; 
        }

        .background-blur {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/bg.jpg');
            background-size: cover;
            filter: blur(8px); 
            z-index: -1;
        }
        .login-form {
            max-width: 400px; 
            width: 100%;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.7); 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            display: flex;
            overflow: hidden;
        }

        .login-form .form-content {
            flex: 1;
            padding: 10px;
        }

        .login-form h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            color: #fff; 
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }
        .login-form img.logo {
            display: block;
            margin: 0 auto 20px;
            width: 100px;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-group label {
            font-weight: bold;
            color: #fff; 
            display: block;
            margin-bottom: 8px;
            font-family: 'Helvetica Neue', Arial, sans-serif; 
        }

        .form-group input {
            width: 100%;
            padding: 12px 0; 
            border: none; 
            outline: none;
            color: #fff; 
            background-color: transparent; 
            font-weight: bold;
            border-bottom: 2px solid #fcbf49;
            transition: border-color 0.3s ease;
            font-size: 16px;
            border-radius: 0; 
            font-family: monospace;
            padding-left: 32px; /* Add padding-left to create space for the icon */
            background-position: 8px 50%; /* Position the icon within the input field */
            background-repeat: no-repeat;
        }
        .form-group input:focus {
            border-color: #fcbf49; 
        }

        .submit-btn {
            background-color: #fcbf49; 
            color: #000; 
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: 100%;
            font-size: 16px;
            font-family: 'Helvetica Neue', Arial, sans-serif; 
        }

        .submit-btn:hover {
            background-color: #f9a825; 
        }

        .text-center {
            text-align: center;
            margin-top: 24px;
            color: #FFFFFF;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }

        h2 {
            font-family: 'Helvetica Neue', Arial, sans-serif; 
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            color: #fff; 
        }
        .form-group input {
            padding-left: 32px; 
            background-position: 8px 50%; 
            background-repeat: no-repeat; 
        }

        .form-group i {
            position: absolute;
            top: 70%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #fcbf49;
        }
        </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="background-blur"></div>
        <div class="login-form">
            <div class="form-content">
                <img class="logo" src="assets/logo.png" alt="Logo">
                <h2>Welcome Back!</h2>
    
                <form method="post" action="<?php echo site_url('LoginController/authenticate'); ?>">
                    <div class="form-group">
                        <i class="fas fa-user"></i> <!-- Icon for the Username field -->
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i> <!-- Icon for the Password field -->
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Login" class="submit-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
