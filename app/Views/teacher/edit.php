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

  
    <section id="add-course" class="p-6 bg-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Add a New Course</h2>
    <form class="bg-white shadow-md rounded-lg p-6" action="/add-course" method="POST" enctype="multipart/form-data">
        <!-- Course Title -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Course Title</label>
            <input type="text" id="title" name="title" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-fuchsia-400 focus:outline-none"
                   placeholder="Enter the course title" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea id="description" name="description" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-fuchsia-400 focus:outline-none"
                      rows="4" placeholder="Briefly describe the course content" required></textarea>
        </div>

        <!-- Content -->
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-medium mb-2">Content (Video or Document)</label>
            <input type="file" id="content" name="content" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-fuchsia-400 focus:outline-none"
                   accept=".pdf, .docx, .mp4, .mkv, .avi" required placeholder="Choose a video or document file">
        </div>

        <!-- Tags -->
        <div class="mb-4">
            <label for="tags" class="block text-gray-700 font-medium mb-2">Tags</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="tags[]" value="JavaScript" 
                           class="form-checkbox text-fuchsia-500 focus:ring-fuchsia-400">
                    <span class="ml-2 text-gray-700">JavaScript</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="tags[]" value="Web Development" 
                           class="form-checkbox text-fuchsia-500 focus:ring-fuchsia-400">
                    <span class="ml-2 text-gray-700">Web Development</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="tags[]" value="Design" 
                           class="form-checkbox text-fuchsia-500 focus:ring-fuchsia-400">
                    <span class="ml-2 text-gray-700">Design</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="tags[]" value="Business" 
                           class="form-checkbox text-fuchsia-500 focus:ring-fuchsia-400">
                    <span class="ml-2 text-gray-700">Business</span>
                </label>
            </div>
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
            <select id="category" name="category" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-fuchsia-400 focus:outline-none" required>
                <option value="" disabled selected>Select a category</option>
                <option value="programming">Programming</option>
                <option value="design">Design</option>
                <option value="business">Business</option>
                <option value="marketing">Marketing</option>
                <option value="data-science">Data Science</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" 
                    class="bg-fuchsia-500 hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-400">
                Update Course
            </button>
        </div>
    </form>
 </section>

</main>    

   

   </div>    
</body>
</html>