<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';
use App\Controllers\CategoryController;
use App\services\Validation;



if (isset($_GET['update'])) {
    $id = $_GET['id'] ; 
    $category = new CategoryController("categorys");
    $result = $category->getLabelById($id);
    $nameCategory = $result['title'];
}

  
if (isset($_POST['submit'])) {
    $nameCategory= $_POST['title'];
    $title = $_POST['title'] ;
    $validator = new Validation();
    $validator->setTitle($title);
    $errors = $validator->getErrors();
    if (empty($errors) ) {
        $category->updateLabel($id, $title);
    } 


}

?>
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

        <h2 class="text-3xl font-semibold mb-6">Edit Category</h2>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="tag-name" class="block text-gray-700 font-semibold mb-2">Category Name</label>
                    <input type="text" id="tag-name" name="title"
                    placeholder="Enter category name"
                     class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                     value="<?php echo $nameCategory ?>" required>
                     <small class="text-red-500"><?php echo $errors['title'] ?? '' ; ?></small>
                </div>
              
                <button type="submit" name="submit" class="w-full bg-blue-800 text-white py-3 rounded-lg hover:bg-blue-700 transition">Add category</button>
            </form>
        </div>

        </main>


</div>
</body>
</html>