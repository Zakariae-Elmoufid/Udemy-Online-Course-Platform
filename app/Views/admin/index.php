<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
session_start();
    if ((!isset($_SESSION["id"]) && $_SESSION["role"] != "admin")) {
      header("Location: ../auth/login.php");
        exit();
      }

use App\Controllers\AdminController;
$Admin = new AdminController();     

$Admin->topThreeTeacher();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Admin</title>
</head>
<body class="bg-gray-100">
<div class="flex flex-col md:flex-row min-h-screen">
    <?php include "../components/sidbarAdmin.php"?>

    <main class="flex-grow p-6">
            <h1 class="text-3xl font-bold text-blue-900 mb-6">Welcome, Administrator</h1>

            <section class="bg-white shadow p-6 rounded-lg mb-6">
                  <h2 class="text-xl font-semibold text-blue-900 mb-4">Top 3 Teachers</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-4 border border-gray-300">Teacher Name</th>
                    <th class="p-4 border border-gray-300">Email</th>
                    <th class="p-4 border border-gray-300">Courses Created</th>
                    <th class="p-4 border border-gray-300">Students Enrolled</th>
                    <th class="p-4 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-4 border border-gray-300">Alice Johnson</td>
                    <td class="p-4 border border-gray-300">alice.johnson@example.com</td>
                    <td class="p-4 border border-gray-300">8</td>
                    <td class="p-4 border border-gray-300">350</td>
                    <td class="p-4 border border-gray-300 flex space-x-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Profile</button>
                    </td>
                </tr>
                <tr>
                    <td class="p-4 border border-gray-300">Bob Smith</td>
                    <td class="p-4 border border-gray-300">bob.smith@example.com</td>
                    <td class="p-4 border border-gray-300">6</td>
                    <td class="p-4 border border-gray-300">280</td>
                    <td class="p-4 border border-gray-300 flex space-x-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Profile</button>
                    </td>
                </tr>
                <tr>
                    <td class="p-4 border border-gray-300">Charlie Brown</td>
                    <td class="p-4 border border-gray-300">charlie.brown@example.com</td>
                    <td class="p-4 border border-gray-300">5</td>
                    <td class="p-4 border border-gray-300">210</td>
                    <td class="p-4 border border-gray-300 flex space-x-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Profile</button>
                    </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>


            <!-- Global Statistics -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white shadow p-6 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-600">Total Courses</h3>
                    <p class="text-3xl font-bold text-blue-900">123</p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-600">Categories</h3>
                    <p class="text-3xl font-bold text-blue-900">8</p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-600">Top Course</h3>
                    <p class="text-3xl font-bold text-blue-900">40 students</p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-600">Top 3 Teachers</h3>
                    <p class="text-xl font-bold text-blue-900">Alice, Bob, Charlie</p>
                </div>
            </section>
        </main>


</div>
</body>
</html>