<?php

namespace App\Controllers;

class tagController extends LabelController {

    public function __construct($table){
        parent::__construct($table);
    }

    public function addLabel($title){
        $this->LabelModel->insertTag($this->table,$title);
    }
}


?>