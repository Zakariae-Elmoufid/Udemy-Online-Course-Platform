<?php

namespace App\Classes;

abstract class Lable {

    
    protected $id;
    protected $title;
    public function __construct($id,$title){
        $this->id = $id;
        $this->title = $title;
    }

    abstract public function getAllLable();
    abstract public function addLable($title);
    abstract public function updatelable($id,$title);
    abstract public function getLableById($id);
    abstract public function deleteLable($id,$title);
}

?>