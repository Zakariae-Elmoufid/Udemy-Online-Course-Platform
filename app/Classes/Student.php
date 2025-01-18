<?php

namespace App\Classes;

class Student extends User {
    private $id ;
    private $speciality;
    private $status;
    
    public function __construct( $username, $email,$password, $role,$id,$status,$field=null){
        parent::__construct( $username, $email,$password, $role);
         $this->field = $filde ;
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