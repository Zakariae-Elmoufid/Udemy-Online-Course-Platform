<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

session_start();
    if ((!isset($_SESSION["id"]) && $_SESSION["role"] != "Teacher")) {
      header("Location: ../auth/login.php");
        exit();
      }

$id = $_SESSION['id'];

use App\Controllers\CourseController;


$fechCourse = new CourseController();
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

       <div class="bg-fuchsia-200 w-[95%] my-6 h-40 mx-auto flex justify-between items-center relative">
       <div class="pl-10">
        <h2>Welcome back teacher!👋</h2>
       </div>
        <img
        class="w-50 h-40  absolute  right-12 bottom-7"
        src="../public/images/Welcomepage.png" alt="">
    </div>

    <section id="statistics" class="p-6 bg-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Statistiques des cours</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Nombre d'étudiants inscrits -->
        <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
            <div class="bg-blue-100 text-blue-500 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4a8 8 0 100 16 8 8 0 000-16z" />
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-gray-600">Étudiants inscrits</p>
                <h3 class="text-2xl font-bold" id="student-count">120</h3>
            </div>
        </div>

        <!-- Nombre de cours -->
        <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
            <div class="bg-green-100 text-green-500 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 4H7a1 1 0 01-1-1V7a1 1 0 011-1h10a1 1 0 011 1v8a1 1 0 01-1 1z" />
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-gray-600">Nombre de cours</p>
                <h3 class="text-2xl font-bold" id="course-count">35</h3>
            </div>
        </div>

        <!-- Cours actifs -->
        <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
            <div class="bg-yellow-100 text-yellow-500 p-3 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11m-4 5H3m10-10h5v4m0 5h-5v4" />
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-gray-600">Cours actifs</p>
                <h3 class="text-2xl font-bold" id="active-course-count">20</h3>
            </div>
        </div>
    </div>
</section>

    <section class="p-4">
      
    </section>
    </main>    

   

   </div>    
</body>
</html>