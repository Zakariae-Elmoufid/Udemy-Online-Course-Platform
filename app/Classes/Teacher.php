<?php

namespace App\Classes;

class Teacher extends User {
    
    private $id;
    private $speciality;
    private $status;
    
    public function __construct($username, $email,$password, $role,$id,$status,$speciality=null){
        parent::__construct($username, $email,$password, $role);
         $this->speciality = $speciality;
         $this->id = $id;
         $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }    

    public function getId(){
        return $this->id;
    }


}


?>