<?php
 require_once __DIR__ .'/../../../vendor/autoload.php';
 session_start();
 if ((!isset($_SESSION["id"]) && $_SESSION["role"] != "Student")) {
   header("Location: ../auth/login.php");
     exit();
   }
   

$student_id = $_SESSION['id'];
use App\Controllers\CourseController;
use App\classes\Enrollment;
$Enrollment = new Enrollment();

$courseController = new CourseController();
$enrollments =  $Enrollment->getMyCourses($student_id);

if(isset($_POST['submit'])){
    $course_id = $_POST['course'];
    $Enrollment->enrolleCourse($student_id,$course_id);
}


if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];
    $searchResults = $courseController->searchCourses($query);
    foreach ($searchResults as $course) {
        if ($course['deleted_at'] == null) { 
            $isEnrolled = $courseController->isUserEnrolled($student_id, $course['id']);?>
            <div class="bg-white p-6 rounded-lg shadow-md"> 
                  <div>
                      <img src="../public/images/udemy-logo-share.png" alt="">
                  </div>
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
                              <?php if ($isEnrolled): ?>
                  <!-- Si l'utilisateur est déjà inscrit -->
                  <p class="mt-5 text-green-600 font-semibold">You are already enrolled in this course.</p>
              <?php else: ?>
                  <!-- Si l'utilisateur n'est pas encore inscrit -->
                  <form action="" method="POST">
                      <input type="hidden" name="course" value="<?= $course['id'] ?>">
                      <button type="submit" name="submit"
                              class="px-4 py-2 mt-5 text-white bg-fuchsia-500 rounded hover:bg-fuchsia-600">
                          Enroll Now
                      </button>
                  </form>
              <?php endif; ?>
              </div>
      <?php }
  }
  exit; 
}


$page = isset($_GET['page']) ? $_GET['page'] : 1;

if (isset($_GET['ajax'])) {
    $courses = $courseController->fetchSixCourses($page);
    foreach ($courses as $course) {  
        if ($course['deleted_at'] == null ) { ?>
                 <?php $isEnrolled = $courseController->isUserEnrolled($student_id, $course['id']);?>
              <div class="bg-white p-6 rounded-lg shadow-md"> 
                    <div>
                        <img src="../public/images/udemy-logo-share.png" alt="">
                    </div>
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
                                <?php if ($isEnrolled): ?>
                    <!-- Si l'utilisateur est déjà inscrit -->
                    <p class="mt-5 text-green-600 font-semibold">You are already enrolled in this course.</p>
                <?php else: ?>
                    <!-- Si l'utilisateur n'est pas encore inscrit -->
                    <form action="" method="POST">
                        <input type="hidden" name="course" value="<?= $course['id'] ?>">
                        <button type="submit" name="submit"
                                class="px-4 py-2 mt-5 text-white bg-fuchsia-500 rounded hover:bg-fuchsia-600">
                            Enroll Now
                        </button>
                    </form>
                <?php endif; ?>
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
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Student</title>
</head>
<body class="bg-gray-100">
   <?php include "../components/headerStudent.php"?>


   <section class="relative bg-center bg-cover h-96 flex items-center" >
    <div class="absolute inset-0" style="background-image: url('../public/images/backgroundStudent.jpg'); background-size: cover; background-position: center; opacity: 0.5;"></div>
    
    <!-- Content -->
    <div class="relative container mx-auto px-6 text-black">
        <h2 class="text-3xl font-bold mb-4">Welcome to the Course Catalog</h2>
        <p class="mb-4 ">Find and enroll in the best courses tailored for you!</p>
        <!-- Search Bar -->
        <div class="relative">
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




<?php include "../components/footer.php" ?>

<script src="../public/script/search.js"></script>
<script src="../public/script/pagination.js"></script>
</body>
</html>