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
   
     

    public function getRole() {
         return $this->username; 
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


    private $errors = [];





    

    public function validateInput($data, $key) {
        switch ($key) {
            case 'username':
                return preg_match("/^[a-zA-Z0-9_\s]{3,20}$/",  $data);
            case 'email':
                return filter_var($data, FILTER_VALIDATE_EMAIL); 
            case 'password':
                return strlen(string: $data) >= 8; 
            default:
                return false;
        }
    }
 


 
    public function setUsername($username){
        if ($this->validateInput($username, 'username')) {
            $this->username = $username;
        }else{
            $this->errors['username']= "Invalid username. It must be 3-20 characters long and contain only letters, numbers, and underscores.";
        }
    } 

    public function setEmail($email){
        if ($this->validateInput($email, "email")){
            $this->email = $email;
        }else{
            $this->errors ['email'] = "Invalid email format.";
        }
    }

    public function setPassword($password){
        if ($this->validateInput($password, 'password')) {
            $this->password = $password;
        }else{
            $this->errors ['password'] = "Password must be at least 8 characters long.";
        }
    }

    
    public function getErrors() {
        return $this->errors;
    }
    
}
?>