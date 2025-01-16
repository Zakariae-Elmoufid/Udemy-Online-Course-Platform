<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\classes\Course;
use App\classes\Tag;
use App\classes\Category;

$fechCourse = new Course();
$courses = $fechCourse->getAllCourses();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>Teacher</title>
</head>
<body class="bg-gray-100">
 
    
    <div class="flex flex-col md:flex-row min-h-screen">
        <?php include "../components/sidbarTeacher.php"?>
   <main class="flex-grow ">
       <?php include "../components/headerTeacher.php"?> 

       <section class="p-4">
           <h2 class="text-3xl font-bold text-gray-800 mb-6">Course List</h2>
           <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <?php  foreach ($courses as $course):?> 
        <?php if($course['deleted_at'] == null): ?>  
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold text-gray-800"><?= $course['title'] ?></h3>
            <p class="text-gray-600 mt-2"><?= $course['description'] ?></p>
            <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium"><?= $course['category_title'] ?></span></p>
            <p class="text-sm text-gray-500 flex flex-wrap gap-1 ">Tags:
             <?php   $tags = explode(",", $course["tags"]); ?>
            <?php foreach ($tags as $tag):?>
        <span class=" w-fit bg-green-100 text-green-800 text-xs px-2 rounded-full">#<?php echo $tag ?></span>
        <?php endforeach; ?> 
    </p>
    <form action="detailsCourse.php" method="POST">
                <input type="hidden" name="title" value="<?= $course['title']?>"> 
                <input type="hidden" name="description" value="<?= $course['description']?>"> 
                <input type="hidden" name="content" value="<?= $course['content']?>"> 
                <button type="submit" name="submit"
                    class="  text-blue-500 rounded ">
                    Views Content
                </button>
            </form>
    <div class="flex justify-center gap-5 mt-4">


            <form action="edit.php" method="GET">
                <input type="hidden" name="id" value="<?= $course['id']?>"> 
                <button type="submit" name="submit"
                    class="px-4 py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600">
                    Edit
                </button>
            </form>

            

            <form action="delete.php" method="POST">
                <input type="hidden" name="id"  value="<?= $course['id']?>"> 
                <button type="submit" name="submit"
                    class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                    Soft Delete
                </button>
            </form>

    </div>
</div>
<?php endif ?>
<?php endforeach; ?>

    </div>
</section>



    </main>    

   

   </div>    
</body>
</html>