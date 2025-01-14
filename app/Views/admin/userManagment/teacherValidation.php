<?php 
require_once __DIR__ . '/../../../../vendor/autoload.php';


use App\Controllers\AdminController;


$admin = new AdminController();

$teachers = $admin->getAllTeacher();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>userManagment</title>
</head>
<body class="bg-gray-100">
<div class="flex flex-col md:flex-row min-h-screen">
    <?php include "../../components/sidbarAdmin.php"?>

    <main class="flex-grow p-6">
    <section class="bg-white shadow p-6 rounded-lg mb-6">
                <h2 class="text-xl font-semibold text-blue-900 mb-4">Teacher Account Validation</h2>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-4 border border-gray-300">Name</th>
                                <th class="p-4 border border-gray-300">Email</th>
                                <th class="p-4 border border-gray-300">Status</th>
                                <th class="p-4 border border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($teachers as $teacher): ?>
                            <tr>
                                <td class="p-4 border border-gray-300"><?= $teacher['username']?></td>
                                <td class="p-4 border border-gray-300"><?= $teacher['email'] ?></td>
                                <td class="p-4 border border-gray-300"><?= $teacher['status'] ?></td>
                                <td class="p-4 border border-gray-300 flex space-x-2">
                                    <form action="" method="" >
                                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 "name="Activation">
                                        Approve
                                    </button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" name="suppression">
                                        Reject
                                    </button>
                                    <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600"name="suspension">
                                        suspention 
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
    </section>

  </main>

  </div>
</body>
</html>