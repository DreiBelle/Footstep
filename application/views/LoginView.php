<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg login-container">
            <h2 class="text-2xl text-center font-bold mb-8">Login</h2>
            <form method="post" action="<?php echo site_url('LoginController/authenticate'); ?>">
                <div class="mb-4">
                    <label class="block font-bold text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label class="block font-bold text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">
                </div>
                <div class="text-center">
                    <input type="submit" value="Login" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 cursor-pointer">
                </div>
            </form>
        </div>
    </div>
</body>
</html>