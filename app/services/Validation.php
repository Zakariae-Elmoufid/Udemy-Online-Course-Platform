<?php
namespace App\services;

class Validation{
 
 private $errors = [];

    

    public function validateInput($data, $key) {
        switch ($key) {
            case 'username':
                return preg_match("/^[a-zA-Z0-9_\s]{3,20}$/",  $data);
            case 'title':
               return preg_match("/^[a-zA-Z0-9_\s]{2,20}$/",  $data);    
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
            $this->errors['username']= "Invalid username. It must be 3-20 characters long .";
        }
    } 

    public function setTitle($title){
        if($this->validateInput($title,"title")){
            $this->title = $title;
        }else{
            $this->errors['title'] = "invalide title . It must be 2 -20 characters long";
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