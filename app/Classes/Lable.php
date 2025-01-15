<?php

namespace App\Classes;

abstract class Lable {

    
    protected $id;
    protected $title;
  
  

    abstract public function getAllLable();
    abstract public function addLable($title);
    abstract public function updatelable($id,$title);
    abstract public function getLableById($id);
//     abstract public function deleteLable($id,$title);
}

?>