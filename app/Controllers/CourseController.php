<?php

namespace App\Controllers;
use App\Models\CourseModel;

class CourseController{


    public function __construct(){
        $this->CourseModel = new CourseModel();
    }

    public function getAllCourses(){
        return $this->CourseModel->selectAllCourses();
     }
    public function getAllCoursesById($id){
         return $this->CourseModel->selectAllCourseById($id);
    }
     public function addCourse($user_id,$title,$description,$content,$tags,$category){
         $this->CourseModel->insertCours($user_id,$title,$description,$content,$tags,$category);
     }
     public function updateCourse($id,$title,$description,$content,$tags,$category){
        $this->CourseModel->EditCourse($id,$title,$description,$content,$tags,$category);
     }
     public function getCourseById($id){
        return $this->CourseModel->selectCourseById($id);
     }
     public function deleteCourse($id){
       $this->CourseModel->softDelete($id);
     }
     public function HardDeleteCourse($id){
        $this->CourseModel->HardDelete($id);
     }

     public function retrieveCourse($id){
        $this->CourseModel->retrieve($id);
     }

     public function topThreeTeacher(){
        return $this->CourseModel->selectThreeTeacher();
    }

}


?>