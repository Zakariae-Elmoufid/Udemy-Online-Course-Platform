<?php

namespace App\Controllers;
class CategoryController extends LabelController {

    public function __construct($table){
        parent::__construct($table);
    }

    public function addLabel($title){
        $this->LabelModel->insertCategory($this->table,$title);
    }
}


?>