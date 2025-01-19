<?php

namespace App\Controllers;

class CourseAdminController extends CourseController{

    public function __construct(){
        parent::__construct();
    }
    public function getAllCourses(){
        return $this->CourseModel->selectAllCoursesAdmin();
     }

     public function courseManager($courseId,$action){
        $this->CourseModel->editStatusCourse($courseId,$action);  
    }

     

}

?>