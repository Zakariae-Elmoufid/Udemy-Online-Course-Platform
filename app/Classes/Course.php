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
        return $this->LabelModel->selectAllCourse();
     }
      public function getAllCoursesById($id){
         return $this->LabelModel->selectAllCourseById($id);
      }
     public function addCourse($user_id,$title,$description,$content,$tags,$category){
         $this->LabelModel->insertCours($user_id,$title,$description,$content,$tags,$category);
     }
     public function updateCourse($id,$title,$description,$content,$tags,$category){
        $this->LabelModel->EditCourse($id,$title,$description,$content,$tags,$category);
     }
     public function getCourseById($id){
        return $this->LabelModel->selectCourseById($id);
     }
     public function deleteCourse($id){
       $this->LabelModel->softDelete($id);
     }
     public function HardDeleteCourse($id){
        $this->LabelModel->HardDelete($id);
     }

     public function retrieveCourse($id){
        $this->LabelModel->retrieve($id);
     }
     
     

    
}

?>