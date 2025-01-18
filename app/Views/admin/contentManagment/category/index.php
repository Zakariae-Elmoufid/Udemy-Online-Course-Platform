<?php 

require_once __DIR__ . '/../../../../../vendor/autoload.php';
use App\Controllers\CategoryController;

$categorys= new CategoryController("categorys");
$results = $categorys->getAllLabel();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Category</title>
</head>

<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <?php include "../../../components/sidbarAdmin.php" ?>

        <main class="flex-grow p-6">
            
            <div class=" flex justify-between items-center p-4">
                <h1 class="text-3xl font-bold text-blue-900 mb-6">Category Management</h1>
                <a href="add.php" class="bg-blue-500 text-white px-4 py-2   rounded hover:bg-blue-600">Add New
                    Category </a>
                </div>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($results)): ?>
          <?php foreach ($results as $category): ?>
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
              <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-700"><?=$category['title'] ?></h2>
                <div class="flex gap-3 space-x-2">
                  <form method="GET" action="edit.php">
                    <input type="hidden" name="id" value="<?=$category['id'] ?>">
                    <button type="submit" name="update" class=" text-blue-500 hover:text-blue-700">
                    <i class='bx bx-edit text-xl' ></i>
                    </button>
                  </form>
                  <form method="POST" action="delete.php" onsubmit="return confirm('Are you sure you want to delete this category?');">
                    <input type="hidden" name="id" value="<?=$category['id'] ?>">
                    <button type="delete" name="submit" class="text-red-500 hover:text-red-700">
                    <i class='bx bx-trash-alt text-xl' ></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-gray-600">No tags found.</p>
        <?php endif; ?>
      </div>
        </main>


    </div>
</body>

</html>