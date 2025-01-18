<?php
require_once __DIR__ . '/../../../../vendor/autoload.php';
use App\classes\Course;
session_start();
    if ((!isset($_SESSION["id"]) && $_SESSION["role"] != "admin")) {
      header("Location: ../../auth/login.php");
        exit();
    }

$fechCourse = new Course();
$courses = $fechCourse->getAllCourses();

?>
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
    <section class="p-4">
           <h2 class="text-3xl font-bold text-gray-800 mb-6">Course List</h2>
           <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <?php  foreach ($courses as $course):?> 
        <?php if($course['deleted_at'] == null): ?>  
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold text-gray-800"><?= $course['title'] ?></h3>
            <p class="text-sm text-gray-500 mt-2">Teacher: <span class="font-medium"><?= $course['username'] ?></span></p>
            <p class="text-gray-600 mt-2"><?= $course['description'] ?></p>
            <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium"><?= $course['category_title'] ?></span></p>
            <p class="text-sm text-gray-500 flex flex-wrap gap-1 ">Tags:
             <?php   $tags = explode(",", $course["tags"]); ?>
            <?php foreach ($tags as $tag):?>
        <span class=" w-fit bg-green-100 text-green-800 text-xs px-2 rounded-full">#<?php echo $tag ?></span>
        <?php endforeach; ?> 
    </p>
    <form action="cours/detailsCourse.php" method="POST">
                <input type="hidden" name="title" value="<?= $course['title']?>"> 
                <input type="hidden" name="description" value="<?= $course['description']?>"> 
                <input type="hidden" name="content" value="<?= $course['content']?>"> 
                <button type="submit" name="submit"
                    class=" text-blue-500 rounded ">
                    Views Content
                </button>
            </form>
   
</div>
<?php endif ?>
<?php endforeach; ?>

    </div>
</section>
    </div>
</section>
        </main>


</div>
</body>
</html>