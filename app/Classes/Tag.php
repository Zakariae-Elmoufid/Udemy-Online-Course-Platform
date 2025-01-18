<?php
namespace App\Classes;

use App\Models\LabelModel;

class Tag extends Label {
  
    public function __construct($id, $title) {
        parent::__construct($id, $title);
    }
}


?>