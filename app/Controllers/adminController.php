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

public function getAllStudent(){
    return  $this->adminModel->fechAllStudent();
}    

public function teacherManager($userId,$action){
    $this->adminModel->editStatusTeacher($userId,$action);
}
public function usersManager($userId,$action){
    $this->adminModel->editStatusUser($userId,$action);
}

    
}


?>