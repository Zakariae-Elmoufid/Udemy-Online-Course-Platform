<?php

namespace App\Classes;
use App\Models\CourseModel;

class Course {
    private $id;
    private $title;
    private $description;
    private $content;
    private $LableModel;

    public function __construct(){
        $this->LabelModel = new CourseModel();
    }

     public function getAllCourses(){

     }
     public function addCourse($title,$description,$content,$tags,$category){
         $this->LabelModel->insertCours($title,$description,$content,$tags,$category);
     }
     public function updateCourse($id,$title,$description,$content,$tags,$category){

     }
     public function getCourseById($id){
        
     }
     public function deleteCourse($id){

     }


    
}

?>