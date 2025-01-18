<?php

namespace App\Controllers;

use App\Models\LabelModel;
use App\Classes\Lable;

abstract class LabelController{

    protected $table;

    public function __construct($table){
        $this->table = $table;
        $this->LabelModel = new LabelModel();
    }

    public function getAllLabel(){
        return  $this->LabelModel->selectAllLabel($this->table);
       
     }
 
     public function getLabelById($id){
         return $this->LabelModel->selectLabel($this->table, $id);
     }
 
     public  function updateLabel($id,$title){
        $result = $this->LabelModel->editLabel($this->table,$id,$title);
        if($result){
            header("location:./index.php");
        }
     }
 
    abstract public function addLabel($title);

     public function deleteLabel($id){
         $this->LabelModel->deleted($this->table,$id);
     }

     public function totalLable(){
        return $this->LabelModel->countLable($this->table);
     }
}






?>