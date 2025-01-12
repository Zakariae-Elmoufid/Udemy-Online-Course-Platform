<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Tag</title>
</head>

<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <?php include "../../../components/sidbarAdmin.php" ?>

        <main class="flex-grow p-6">
            
            <div class=" flex justify-between items-center p-4">
                <h1 class="text-3xl font-bold text-blue-900 mb-6">Tag Management</h1>
                <a href="add.php" class="bg-blue-500 text-white px-4 py-2   rounded hover:bg-blue-600">Add New
                    Tag </a>
                </div>


            <div class="overflow-x-auto">
                <table class="w-full  table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-4 border border-gray-300">#</th>
                            <th class="p-4 border border-gray-300">Tag</th>
                            <th class="p-4 border border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-4 border border-gray-300">1</td>
                            <td class="p-4 border border-gray-300"> #Web Development Basics</td>
                            <td class="p-4 border border-gray-300 flex space-x-2">
                                <a href="edit.php?id=3"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                                <a href="delete.php?id=7"
                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>


    </div>
</body>

</html>