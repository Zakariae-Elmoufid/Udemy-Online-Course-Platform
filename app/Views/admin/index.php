<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
session_start();
    if ((!isset($_SESSION["id"]) && $_SESSION["role"] != "admin")) {
      header("Location: ../auth/login.php");
        exit();
      }


use App\Controllers\CourseController;
use App\Controllers\CategoryController;
use App\Controllers\TagController;

$Course = new CourseController();
$Category = new CategoryController("categorys");
$Tag = new TagController("tags");

$topThree = $Course->topThreeTeacher();
$totalCourses = $Course->totalCourses();
$totalTag = $Tag->totalLable();
$totalCategory = $Category->totalLable();
$topCourses  = $Course->topCourse();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Admin</title>
</head>
<body class="bg-gray-100">
<div class="flex flex-col md:flex-row min-h-screen">
    <?php include "../components/sidbarAdmin.php"?>

    <main class="flex-grow p-6">
            <h1 class="text-3xl font-bold text-blue-900 mb-6">Welcome, Administrator</h1>

            <section class="bg-white shadow p-6 rounded-lg mb-6">
                  <h2 class="text-xl font-semibold text-blue-900 mb-4">Top 3 Teachers</h2>
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-4 border border-gray-300">Teacher Name</th>
                    <th class="p-4 border border-gray-300">Email</th>
                    <th class="p-4 border border-gray-300">Courses Created</th>
                    <th class="p-4 border border-gray-300">Students Enrolled</th>
                    <th class="p-4 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($topThree as $teacher):?>
                <tr>
                    <td class="p-4 border border-gray-300"><?=$teacher['username']?></td>
                    <td class="p-4 border border-gray-300"><?=$teacher['email']?></td>
                    <td class="p-4 border border-gray-300"><?=$teacher['total_course']?></td>
                    <td class="p-4 border border-gray-300"><?=$teacher['total_student']?></td>
                    <td class="p-4 border border-gray-300 flex space-x-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Profile</button>
                    </td>
                </tr>
               <?php endforeach ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>


            <!-- Global Statistics -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white shadow p-6 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-600">Total Courses</h3>
                    <p class="text-3xl font-bold text-blue-900"><?= $totalCourses ?></p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-600">Categorys</h3>
                    <p class="text-3xl font-bold text-blue-900"><?= $totalCategory ?></p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-600">Top Course</h3>
                    <p class="text-3xl font-bold text-blue-900"><?= $topCourses ?></p>
                </div>
                <div class="bg-white shadow p-6 rounded-lg text-center">
                    <h3 class="text-lg font-semibold text-gray-600">Top Teachers</h3>
                    <p class="text-xl font-bold text-blue-900"><?= $totalTag ?></p>
                </div>
            </section>
        </main>


</div>
</body>
</html>