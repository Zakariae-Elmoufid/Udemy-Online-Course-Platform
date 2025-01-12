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
                            <tr>
                                <td class="p-4 border border-gray-300">Jane Smith</td>
                                <td class="p-4 border border-gray-300">jane.smith@example.com</td>
                                <td class="p-4 border border-gray-300">Pending</td>
                                <td class="p-4 border border-gray-300 flex space-x-2">
                                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                        Approve
                                    </button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                        Reject
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    </section>

  </main>

  </div>
</body>
</html>