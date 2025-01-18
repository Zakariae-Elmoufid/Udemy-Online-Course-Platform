<?php

namespace App\Classes;


class User {
    protected $username;
    protected $email;
    protected $password;
    protected $role;
    protected $created_at;
    protected $deleted_at;



    public function __construct( $username, $email,$password, $role) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;   
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