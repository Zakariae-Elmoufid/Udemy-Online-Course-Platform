<?php

namespace App\Classes;

abstract class Label {

    
    protected $id;
    protected $title;
  
  

    abstract public function getAllLabel();
    abstract public function addLabel($title);
    abstract public function updateLabel($id,$title);
    abstract public function getLabelById($id);
    abstract public function deleteLabel($id);
}

?>