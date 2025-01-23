<?php

namespace App\Classes;

class Admin extends User {
    private $id ;
    
    public function __construct( $username, $email,$password, $role,$id){
        parent::__construct( $username, $email,$password, $role);
         $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

}