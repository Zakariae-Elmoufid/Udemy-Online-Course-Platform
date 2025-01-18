<?php
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<div class="flex flex-col md:flex-row min-h-screen">
        <?php include "../components/sidbarTeacher.php"?>
   <main class="flex-grow ">
       <?php include "../components/headerTeacher.php"?> 

    <div class="container mx-auto p-6">
        <!-- Title Section -->
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-4xl font-bold text-gray-900 mb-4 border-b pb-2"><?= $title ?></h1>
            <p class="text-gray-700 text-lg leading-relaxed"><?= $description ?></p>
        </div>

        <div class="bg-white shadow rounded-lg p-6 mt-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Course Content</h2>
            
            <?php if (preg_match('/\.(pdf|doc|docx|ppt|pptx|xls|xlsx)$/', $content)): ?>
                <div class="border border-gray-300 rounded-lg overflow-hidden shadow-md p-4 bg-gray-100">
                    <embed src="<?= $content ?>" type="application/pdf" width="100%" height="600px" class="rounded-lg">
                </div>
            <?php elseif (preg_match('/\.(mp4|mov|avi|mkv)$/', $content)): ?>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe width="100%" height="400" src="<?= $content ?>" frameborder="0" class="rounded-lg shadow"></iframe>
                </div>
            <?php else: ?>
                <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg border border-yellow-300">
                    <p>No valid content available for this course.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Back to Courses Button -->
        <div class="mt-8 text-center">
            <a href="index.php" 
               class="px-6 py-3 bg-fuchsia-600 text-white text-lg font-medium rounded-lg shadow hover:bg-fuchsia-700">
                Back to Courses
            </a>
        </div>
    </div>
    </main>    
</div>
</body>

</html>
