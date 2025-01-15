<?php
namespace App\Classes;

use App\Models\LableModel;

class Tag extends Lable {


     private $LableModel;
     public $table ='tags';

    public function __construct(){
        $this->LableModel = new LableModel();
    }
    public function getAllLable(){
       return  $this->LableModel->selectAllLable($this->table);
    }

    public function getLableById($id){
        return $this->LableModel->selectLable($this->table, $id);
    }

    public  function updateLable($id,$title){
        $this->LableModel->editLable($this->table,$id,$title);
    }

    public function addLable($title){
        $this->LableModel->insertLable($this->table,$title);
    }

}


?>