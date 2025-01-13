<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Controllers\AuthController;
use App\Classes\Validation;


if(isset($_POST["submit"]))
{
        $email = $_POST["email"];
        $password = $_POST["password"];

        $validation = new Validation();
        $validation->setEmail($email);
        $validation->setPassword($password);
        $error = $validation->getErrors();

        if(empty($error)){
         $authController = new AuthController();
        $authController->login($email,$password);
        }
        


}


  





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../output.css" rel="stylesheet">  
    <script src="https://cdn.tailwindcss.com"></script>
 

</head>
<body class="bg-fuchsia-100">

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
            <h2 class="text-3xl font-bold text-fuchsia-800 mb-6 text-center">Login</h2>

            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded mt-2" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded mt-2" required>
                </div>
                <button type="submit" class="w-full bg-fuchsia-800 text-white py-3 px-6 rounded hover:bg-fuchsia-600 transition">Login</button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm">Don't have an account? <a href="register.php" class="text-fuchsia-800 hover:underline">Register</a></p>
            </div>
        </div>
    </div>

</body>
</html>