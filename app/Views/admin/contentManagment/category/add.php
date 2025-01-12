<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Category</title>
</head>
<body class="bg-gray-100">
<div class="flex flex-col md:flex-row min-h-screen">
    <?php include "../../../components/sidbarAdmin.php"?>

    <main class="flex-grow p-6">

        <h2 class="text-3xl font-semibold mb-6">Add New Category</h2>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="tag-name" class="block text-gray-700 font-semibold mb-2">category Name</label>
                    <input type="text" id="tag-name" name="tag-name"
                    placeholder="Enter Category name"
                     class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
              
                <button type="submit" class="w-full bg-blue-800 text-white py-3 rounded-lg hover:bg-blue-700 transition">Add Tag</button>
            </form>
        </div>

        </main>


</div>
</body>
</html>