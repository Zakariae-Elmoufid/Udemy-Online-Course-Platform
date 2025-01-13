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
            if($user->getrole()== "Admin"){ 
                session_start();
               
                  $_SESSION['id'] = $user->getId();
                  $_SESSION['username'] =  $user->getUsername();
                  $_SESSION['role'] = $user->getrole();

                
                  header("Location:../admin/index.php");
            }
            
            else if($user->getrole() == "Student")
            {
                session_start();
               
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] =  $user->getUsername();
                $_SESSION['role'] = $user->getrole();


              header("Location:../student/index.php");
            }
            else if($user->getrole() == "Teacher")
            {
                session_start();
               
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] =  $user->getUsername();
                $_SESSION['role'] = $user->getrole();


              header("Location:../teacher/index.php");
            }
            
        }
    }

       
}






?>