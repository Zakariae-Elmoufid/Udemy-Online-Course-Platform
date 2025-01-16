<?php 
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\classes\Course;

if(isset($_POST['submit'])){
   $id = $_POST['id'];
   $Course = new Course();
   $Course->deleteCourse($id);
}


?>