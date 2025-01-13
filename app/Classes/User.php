<?php

namespace App\Classes;


class User {
    private $id;
    private $username;
    private $field;
    private  $speciality;
    private $email;
    private $password;
    private $role;
    private $created_at;
    private $deleted_at;



    public function __construct($id, $username, $email,$password, $role,   $field=null ,  $speciality=null , $created_at=null, $deleted_at=null) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->field = $field;
        $this->speciality = $speciality;
        $this->created_at = $created_at;
        $this->deleted_at = $deleted_at;
    }
   
     

    
    public function getId() {
         return $this->id; 
        }
    public function getUsername() {
         return $this->username; 
        }
    public function getRole() {
         return $this->role; 
        }

    public function getEmail() {
         return $this->email;
    }
    public function getPassword() 
    {
         return $this->password; 
    }
    public function getCreatedAt(){ 
        return $this->created_at; 
    }
    public function getDeletedAt() { 
        return $this->deleted_at; 
    }


   
}
?>