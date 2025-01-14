<?php
namespace App\Controllers;

use App\Models\AdminModel;
class AdminController {

    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

public function getAllTeacher(){
    return  $this->adminModel->fechAllTeacher();
}    
public function teacherManager($userId,$action){
    $this->adminModel->editStatusTeacher($userId,$action);
}

    
}


?>