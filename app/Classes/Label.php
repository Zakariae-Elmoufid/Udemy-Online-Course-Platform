<?php

namespace App\Classes;

class Label {  
    protected $id;
    protected $title;

    public function __construct($id,$title){
         $this->id = $id;
         $this->title = $title;
    }

    public function getId(){
        $this->id = $id;
    }
    public function getTitle(){
        $this->title = $title;
    }
  
}

?>