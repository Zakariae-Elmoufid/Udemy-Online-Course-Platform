<?php
namespace App\Classes;

use App\Models\LabelModel;

class Tag extends Label {


     private $LabelModel;
     public $table ='tags';

    public function __construct(){
        $this->LabelModel = new LabelModel();
    }
    public function getAllLabel(){
       return  $this->LabelModel->selectAllLabel($this->table);
    }

    public function getLabelById($id){
        return $this->LabelModel->selectLabel($this->table, $id);
    }

    public  function updateLabel($id,$title){
        $this->LabelModel->editLabel($this->table,$id,$title);
    }

    public function addLabel($title){
        $this->LabelModel->insertTag($this->table,$title);
    }
    public function deleteLabel($id){
        $this->LabelModel->deleted($this->table,$id);
    }

}


?>