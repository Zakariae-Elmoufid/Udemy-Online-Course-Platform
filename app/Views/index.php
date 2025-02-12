<?php
require_once __DIR__."/../../vendor/autoload.php";

use App\Controllers\CourseController;

$courseController = new CourseController();

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];
    $searchResults = $courseController->searchCourses($query);
    foreach ($searchResults as $course) {
        if ($course['deleted_at'] == null) {
            echo '
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800">' . htmlspecialchars($course['title']) . '</h3>
                <p class="text-gray-600 mt-2">' . htmlspecialchars($course['description']) . '</p>
                <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">' . htmlspecialchars($course['category_title']) . '</span></p>
            </div>';
        }
    }
    exit;
   
}


$page = isset($_GET['page']) ? $_GET['page'] : 1;

if (isset($_GET['ajax'])) {
    $courses = $courseController->fetchSixCourses($page);
    foreach ($courses as $course) {
        if ($course['deleted_at'] == null) { ?>
              <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($course['title']) ?></h3>
                    <p class="text-gray-600 mt-2"><?= htmlspecialchars($course['description']) ?></p>
                    <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium"><?= htmlspecialchars($course['category_title']) ?></span></p>
                    <p class="text-sm text-gray-500 flex flex-wrap gap-1">Tags: 
                        <?php 
                            $tags = explode(",", $course["tags"]);
                            foreach ($tags as $tag): 
                        ?>
                            <span class="w-fit bg-green-100 text-green-800 text-xs px-2 rounded-full">#<?= htmlspecialchars($tag) ?></span>
                        <?php endforeach; ?>
                    </p>
                </div>
        <?php }
    }
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">   
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Youdemy - Online Learning Platform</title>
    

</head>
<body class="bg-gray-100 text-gray-900">
<?php include "components/header.php" ?>

 <!-- Hero Section -->
 <section class="bg-fuchsia-100 py-20">
      <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-bold text-fuchsia-800 mb-4">Unlock Your Learning Potential</h2>
            <p class="text-lg text-gray-700 mb-8">Explore thousands of online courses tailored to your needs.</p>
            <a href="#courses" class="bg-fuchsia-800 text-white py-3 px-6 rounded hover:bg-fuchsia-600">Browse Courses</a>
            <a href="#courses" class="bg-fuchsia-800 text-white py-3 px-6 rounded hover:bg-fuchsia-600">Sing Up</a>
          <div class="relative mt-5">
            <input type="text" id="search-input" placeholder="Search courses..." 
                class="w-full md:w-1/2 px-4 py-2 rounded-md text-gray-800 border border-gray-300 focus:ring-2 focus:ring-fuchsia-400 focus:outline-none">
           
         </div>
        </div>
   </section>
         

   <section id="catalog" class="py-16 bg-gray-100">
      <div class="container mx-auto px-4">
          <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Course Catalog</h2>

          <div id="course-container-search" class="grid grid-cols-1 md:grid-cols-3 gap-8">
           
           </div>
          <div id="course-container" class="grid grid-cols-1 md:grid-cols-3 gap-8">
              
            
          </div>
          <div class="flex justify-center mt-8">
              <button id="previous" class="px-4 py-2 bg-fuchsia-500 text-white rounded-l hover:bg-fuchsia-600 disabled:opacity-50" disabled>Previous</button>
              <div id="page-numbers" class="flex items-center bg-white border border-gray-300 px-4 py-2">
                  Page 1
              </div>
              <button id="next" class="px-4 py-2 bg-fuchsia-500 text-white rounded-r hover:bg-fuchsia-600">Next</button>
          </div>
      </div>
  </section>  
         
  <?php include "components/footer.php" ?>

  <script src="../Views/public/script/search.js"></script>
  <script src="../Views/public/script/pagination.js"></script>
</body>
</html>