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

     
     

    
}

?>