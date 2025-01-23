<?php

namespace App\Classes;
use App\Models\EnrolleModel;

class enrollment {
    
    private $enrolleModel;
    private $student;
    private $course;
    private $date;

    
    public function __construct(){
        $this->enrolleModel = new EnrolleModel();
    }
    
    public function enrolleCourse($student,$course){
        $this->enrolleModel->insertCourseAndStudent($student,$course);
    }
    
    public function getMyCourses($id){
      return  $this->enrolleModel->selectMyCourse($id);
    }

    public function cancleEnrollment($student_id,$course_id){
        return $this->enrolleModel->cancle($student_id,$course_id);
    }
     
}

?>