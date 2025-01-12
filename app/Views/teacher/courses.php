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
        <!-- Course 1 -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold text-gray-800">Course Title 1</h3>
            <p class="text-gray-600 mt-2">This is a brief description of the course. It covers the basics and more.</p>
            <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Programming</span></p>
            <p class="text-sm text-gray-500">Tags: <span class="font-medium">HTML, CSS</span></p>
            <p class="text-sm text-gray-500">Content: <a href="#" class="text-blue-500 underline">View Content</a></p>
            <div class="flex justify-center gap-5 mt-4">
                <a href="edit.php?id=1" class="px-4 py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600 mr-2">Edit</a>
                <a ref="edit.php?id=1"  class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-bleu-600">Suspension</a>
                <a ref="edit.php?id=1"  class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">Delete</a>
            </div>
        </div>
        <!-- Course 2 -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold text-gray-800">Course Title 2</h3>
            <p class="text-gray-600 mt-2">Learn advanced concepts with hands-on examples in this course.</p>
            <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Design</span></p>
            <p class="text-sm text-gray-500">Tags: <span class="font-medium">UI/UX, Figma</span></p>
            <p class="text-sm text-gray-500">Content: <a href="#" class="text-blue-500 underline">View Content</a></p>
            <div class="flex justify-center gap-5 mt-4">
                <a href="edit.php?id=1" class="px-4 py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600 mr-2">Edit</a>
                <a ref="edit.php?id=1"  class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-bleu-600">Suspension</a>
                <a ref="edit.php?id=1"  class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">Delete</a>
            </div>
        </div>
        <!-- Course 3 -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-xl font-semibold text-gray-800">Course Title 3</h3>
            <p class="text-gray-600 mt-2">A comprehensive course covering all aspects of web development.</p>
            <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium">Web Development</span></p>
            <p class="text-sm text-gray-500">Tags: <span class="font-medium">JavaScript, React</span></p>
            <p class="text-sm text-gray-500">Content: <a href="#" class="text-blue-500 underline">View Content</a></p>
            <div class="flex justify-center gap-5 mt-4">
                <a href="edit.php?id=1" class="px-4 py-2 text-white bg-yellow-500 rounded hover:bg-yellow-600 mr-2">Edit</a>
                <a ref="edit.php?id=1"  class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-bleu-600">Suspension</a>
                <a ref="edit.php?id=1"  class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">Delete</a>
            </div>
        </div>
    </div>
</section>



    </main>    

   

   </div>    
</body>
</html>