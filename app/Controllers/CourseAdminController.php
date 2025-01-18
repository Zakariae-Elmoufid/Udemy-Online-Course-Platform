<?php

namespace App\Controllers;

class CourseAdminController extends CourseController{

    public function __construct(){
        parent::__construct();
    }
    public function getAllCourses(){
        return $this->CourseModel->selectAllCoursesAdmin();
     }

     

}

?>