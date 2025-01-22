<?php
 require_once __DIR__ .'/../../../vendor/autoload.php';

 use App\services\session;
 session_start();
 if ((!isset($_SESSION["id"]) && $_SESSION["role"] != "Student")) {
   header("Location: ../auth/login.php");
     exit();
   }

 $student_id = $_SESSION['id'];
 use App\classes\Enrollment;

$Enrollment = new Enrollment();
$courses =  $Enrollment->getMyCourses($student_id);

if(isset($_POST['cancle'])){
    $course_id = $_POST['id'];
    $Enrollment->cancleEnrollment($student_id,$course_id);
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


   <section class="bg-fuchsia-600 text-white py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">My Courses</h1>
            <p class="mt-2 text-lg">Track and manage all your enrolled courses here.</p>
        </div>
    </section>

                <section class="container mx-auto px-6 py-8">
                    <h2 class="text-2xl font-semibold mb-6">Enrolled Courses</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php  foreach ($courses as $course):?> 
                    <?php if($course['deleted_at'] == null): ?>  
                    <div class="bg-white rounded-lg shadow p-4">
                    <div>
                         <img src="../public/images/udemy-logo-share.png" alt="">
                      </div>
                        <div class="flex justify-between">
                            <h3 class="text-xl font-semibold text-gray-800"><?= $course['title'] ?></h3>
                            <p class="text-gray-600 mt-2"><?= $course['created_at'] ?></p>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Category: <span class="font-medium"><?= $course['category_title'] ?></span></p>
                        <p class="text-sm text-gray-500 flex flex-wrap gap-1 ">Tags:
                        <?php   $tags = explode(",", $course["tags"]); ?>
                        <?php foreach ($tags as $tag):?>
                    <span class=" w-fit bg-green-100 text-green-800 text-xs px-2 rounded-full">#<?php echo $tag ?></span>
                    <?php endforeach; ?> 
                </p>
                <p class="text-sm text-gray-500 mt-2">Teacher: <span class="font-medium"><?= $course['username'] ?></span></p>
                
                <div class="mt-4 flex justify-between">
                    <form action="detailsCourse.php" method="POST">
                                <input type="hidden" name="title" value="<?= $course['title']?>"> 
                                <input type="hidden" name="description" value="<?= $course['description']?>"> 
                                <input type="hidden" name="content" value="<?= $course['content']?>"> 
                                <button type="submit" name="submit"
                                    class=" px-4 py-2 text-white bg-fuchsia-500 rounded hover:bg-fuchsia-600">
                                    Views Content
                                </button>
                    </form>
                    <form method="POST" >
                        <input type="hidden" name="id" value="<?= $course['course_id']?>">
                        <button type="submit" name="cancle"
                        class=" px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                          Cancle
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