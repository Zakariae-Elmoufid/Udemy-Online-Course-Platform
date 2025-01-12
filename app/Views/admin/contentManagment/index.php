<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Content Managment</title>
</head>
<body class="bg-gray-100">
<div class="flex flex-col md:flex-row min-h-screen">
    <?php include "../../components/sidbarAdmin.php"?>

    <main class="flex-grow p-6">
            <h1 class="text-3xl font-bold text-blue-900 mb-6">Welcome, Administrator</h1>

 <section class="bg-white shadow p-6 rounded-lg mb-6">
    <h2 class="text-xl font-semibold text-blue-900 mb-4">Content Management</h2>
    <div class="flex space-x-4 mb-6">
        <a href="cours/index.php" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Manage Course</a>
        <a href="category/index.php" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Manage Categories</a>
        <a href="tag/index.php" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">Manage Tags</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-4 border border-gray-300">Course Title</th>
                    <th class="p-4 border border-gray-300">Category</th>
                    <th class="p-4 border border-gray-300">Tags</th>
                    <th class="p-4 border border-gray-300">Students Enrolled</th>
                    <th class="p-4 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-4 border border-gray-300">Web Development Basics</td>
                    <td class="p-4 border border-gray-300">Programming</td>
                    <td class="p-4 border border-gray-300">HTML, CSS, JavaScript</td>
                    <td class="p-4 border border-gray-300">150</td>
                    <td class="p-4 border border-gray-300 flex space-x-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                    </td>
                </tr>
                <!-- More rows can be added -->
            </tbody>
        </table>
    </div>
</section>
        </main>


</div>
</body>
</html>