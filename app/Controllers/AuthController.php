<?php

namespace App\Controllers;
use App\Models\UserModel;

class   Authcontroller{


    public function login($email, $password){
        $userModel = new UserModel();
        $user =  $userModel->findUserByEmailAndPassword($email, $password);
        if($user == null)
        {
            echo "user not found please check ..." . $user;
        }
        else{
            if($user->getRole()== "Admin"){ 
                session_start();
               
                  $_SESSION['id'] = $user->getId();
                  $_SESSION['username'] =  $user->getUsername();
                  $_SESSION['role'] = $user->getRole();

                
                  header("Location:../admin/index.php");
            }
            
            else if($user->getRole() == "Student")
            {
                session_start();
               
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] =  $user->getUsername();
                $_SESSION['role'] = $user->getRole();


              header("Location:../student/index.php");
            }
            else if($user->getRole() == "Teacher")
            {
                session_start();
               
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] =  $user->getUsername();
                $_SESSION['role'] = $user->getRole();


              header("Location:../teacher/index.php");
            }
            
        }
    }

    public function register($username,$email,$password,$role,$field){
        $userModel = new UserModel();
        $user  = $userModel->saveUser($username,$email,$password,$role,$field);

         
        if($user->getRole() == "Student"){
            session_start();
           
            $_SESSION['id'] = $user->getId();
            $_SESSION['username'] =  $user->getUsername();
            $_SESSION['role'] = $user->getRole();


          header("Location:../student/index.php");
        }else if($user->getRole() == "Teacher"){
            session_start();
               
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] =  $user->getUsername();
                $_SESSION['role'] = $user->getRole();


              header("Location:../teacher/index.php");
        }
            
         
    }

       
}






?>