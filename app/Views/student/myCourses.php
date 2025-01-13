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


   <section class="bg-fuchsia-600 text-white py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">My Courses</h1>
            <p class="mt-2 text-lg">Track and manage all your enrolled courses here.</p>
        </div>
    </section>

    <!-- My Courses Section -->
    <section class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-semibold mb-6">Enrolled Courses</h2>

        <!-- Course Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Course 1 -->
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800">Course Title 1</h3>
                <p class="text-gray-600 mt-2">Learn the basics of web development with this course.</p>
                <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Programming</span></p>
                <p class="text-sm text-gray-500">Tags: <span class="font-medium">HTML, CSS</span></p>
                <button class="mt-4 bg-fuchsia-600 text-white px-4 py-2 rounded hover:bg-fuchsia-700">Go to Course</button>
            </div>

            <!-- Course 2 -->
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800">Course Title 2</h3>
                <p class="text-gray-600 mt-2">Master advanced UI/UX design concepts and tools.</p>
                <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Design</span></p>
                <p class="text-sm text-gray-500">Tags: <span class="font-medium">Figma, Prototyping</span></p>
                <button class="mt-4 bg-fuchsia-600 text-white px-4 py-2 rounded hover:bg-fuchsia-700">Go to Course</button>
            </div>

            <!-- Course 3 -->
            <div class="bg-white rounded-lg shadow p-4">
                <h3 class="text-xl font-semibold text-gray-800">Course Title 3</h3>
                <p class="text-gray-600 mt-2">Learn how to build scalable web apps with React.</p>
                <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Web Development</span></p>
                <p class="text-sm text-gray-500">Tags: <span class="font-medium">React, JavaScript</span></p>
                <button class="mt-4 bg-fuchsia-600 text-white px-4 py-2 rounded hover:bg-fuchsia-700">Go to Course</button>
            </div>
        </div>
    </section>

    <?php include "../components/footer.php" ?>


</body>
</html>