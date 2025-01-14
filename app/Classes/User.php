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
    private $status;
    private $created_at;
    private $deleted_at;



    public function __construct($id, $username, $email,$password, $role, $status=null , $field=null ) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
        $this->field = $field;
    }
   
     

    
    public function getId() {
         return $this->id; 
        }
    public function getStatus(){
        return $this->status;
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