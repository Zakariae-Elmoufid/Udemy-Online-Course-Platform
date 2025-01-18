<?php 

require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Controllers\TagController;
use App\Controllers\CategoryController;
use App\classes\Course;
use App\services\Validation;

session_start();
                

if(isset($_POST['submit'])){
    $id = $_SESSION['id'] ;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tags = isset($_POST['tags']) ? $_POST['tags'] : [];
    $category = $_POST['category'];
    $validateInput  = new validation;
    $validateInput->setTitle($title );
    $validateInput->setDescription($description);
    
    $_FILES['content'];
    $uploadDir = 'uploads\\'; 
    $fileName = $_FILES['content']['name'];
    $fileTmpName = $_FILES['content']['tmp_name'];
    $filePath = $uploadDir . $fileName;
    
    $validateInput->setContent($fileName);
    $errors = $validateInput->getErrors();

    move_uploaded_file($fileTmpName, $filePath);
    if(empty($errors)){
    $course = new Course();
    $course->addCourse($id,$title,$description,$filePath,$tags,$category);
    }


}




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

  
    <section id="add-course" class="p-6 bg-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Add a New Course </h2>
    <form class="bg-white shadow-md rounded-lg p-6" action="" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Course Title</label>
            <input type="text" id="title" name="title" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-fuchsia-400 focus:outline-none"
                   placeholder="Enter the course title" required>
                   <small class="text-red-500"><?php echo $errors['title'] ?? '' ; ?></small>

        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea id="description" name="description" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-fuchsia-400 focus:outline-none"
                       placeholder="Briefly describe the course content" required></textarea>
                       <small class="text-red-500"><?php echo $errors['description'] ?? '' ; ?></small>

        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-medium mb-2">Content (Video or Document)</label>
            <input type="file" id="content" name="content" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-fuchsia-400 focus:outline-none"
                 required >
                 <small class="text-red-500"><?php echo $errors['content'] ?? '' ; ?></small>

        </div>

        <div class="mb-4">
            <label for="tags" class="block text-gray-700 font-medium mb-2">Tags</label>
            <div class="grid gap-4 grid-cols-3 ">
                <?php $labelTag= new TagController("tags");
                 $tags = $labelTag->getAllLabel();
                foreach($tags as $tag): ?>
                <label class="flex items-center">
                    <input type="checkbox" name="tags[]" value="<?= $tag['id'] ?>" 
                           class="form-checkbox text-fuchsia-500 focus:ring-fuchsia-400">
                    <span class="ml-2 text-gray-700"><?= $tag['title'] ?></span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>


    
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
            <select id="category" name="category" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-fuchsia-400 focus:outline-none" required>
                <option value="" disabled selected>Select a category</option>
                <?php  $labelCategory= new CategoryController("categorys");
                  $categorys = $labelCategory->getAllLabel();
                foreach($categorys as $category): ?>
                <option value="<?= $category['id']?>"><?= $category['title']?></option>
               <?php endforeach;?>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" name="submit"
                    class="bg-fuchsia-500 hover:bg-fuchsia-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-fuchsia-400">
                Add Course
            </button>
        </div>
    </form>
 </section>

</main>    

   

   </div>    
</body>
</html>