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

$fechCourse = new CourseController();
$courses = $fechCourse->getAllCourses();
if(isset($_POST['submit'])){
    $course_id = $_POST['course'];
    $Enrollment = new Enrollment();
    $Enrollment->enrolleCourse($student_id,$course_id);
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
    <!-- Background Image with Opacity -->
    <div class="absolute inset-0" style="background-image: url('../public/images/backgroundStudent.jpg'); background-size: cover; background-position: center; opacity: 0.5;"></div>
    
    <!-- Content -->
    <div class="relative container mx-auto px-6 text-black">
        <h2 class="text-3xl font-bold mb-4">Welcome to the Course Catalog</h2>
        <p class="mb-4 ">Find and enroll in the best courses tailored for you!</p>
        <!-- Search Bar -->
        <div class="relative">
            <input type="text" placeholder="Search courses..." 
                class="w-full md:w-1/2 px-4 py-2 rounded-md text-gray-800 border border-gray-300 focus:ring-2 focus:ring-fuchsia-400 focus:outline-none">
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-fuchsia-600 text-white px-4 py-2 rounded hover:bg-fuchsia-700">
                Search
            </button>
        </div>
    </div>
</section>


<section class="p-4">
    <h2 class="text-3xl font-bold text-center text-fuchsia-800 mb-6">Course List</h2>
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
 
    <div class="flex justify-center gap-5 mt-4">


            <form action="" method="POST">
                <input type="hidden" name="user" value="<?= $student_id?>"> 
                <input type="hidden" name="course" value="<?= $course['id']?>"> 
                <button type="submit" name="submit"
                class="px-4 py-2 text-white bg-fuchsia-500 rounded hover:bg-fuchsia-600 mt-">
                    Enrollment
                </button>
            </form>

            

           

    </div>
</div>
<?php endif ?>
<?php endforeach; ?>

</section>

<?php include "../components/footer.php" ?>

</body>
</html>