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
        <!-- Course 1 -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold text-gray-800">Course Title 1</h3>
            <p class="text-gray-600 mt-2">This is a brief description of the course. It covers the basics and more.</p>
            <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Programming</span></p>
            <p class="text-sm text-gray-500">Tags: <span class="font-medium">HTML, CSS</span></p>
            <p class="text-sm text-gray-500">Content: <a href="#" class="text-blue-500 underline">View Content</a></p>
            <div class="mt-4">
            <a ref=""  class="px-4 py-2 text-white bg-fuchsia-500 rounded hover:bg-fuchsia-600 mt-">enrollment</a>

            </div>
        </div>
        <!-- Course 2 -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold text-gray-800">Course Title 2</h3>
            <p class="text-gray-600 mt-2">Learn advanced concepts with hands-on examples in this course.</p>
            <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Design</span></p>
            <p class="text-sm text-gray-500">Tags: <span class="font-medium">UI/UX, Figma</span></p>
            <p class="text-sm text-gray-500">Content: <a href="#" class="text-blue-500 underline">View Content</a></p>
            <div class="gap-5 mt-4">
            <a ref=""  class="px-4 py-2 text-white bg-fuchsia-500 rounded hover:bg-fuchsia-600 mt-">enrollment</a>

            </div>
        </div>
        <!-- Course 3 -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold text-gray-800">Course Title 3</h3>
            <p class="text-gray-600 mt-2">A comprehensive course covering all aspects of web development.</p>
            <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Web Development</span></p>
            <p class="text-sm text-gray-500">Tags: <span class="font-medium">JavaScript, React</span></p>
            <p class="text-sm text-gray-500">Content: <a href="#" class="text-blue-500 underline">View Content</a></p>
            <div class=" gap-5 mt-4">
            <a ref=""  class="px-4 py-2 text-white bg-fuchsia-500 rounded hover:bg-fuchsia-600 mt-">enrollment</a>
            </div>
        </div>
    </div>
</section>

<?php include "../components/footer.php" ?>

</body>
</html>