<?php

namespace App\Controllers;

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

                
                  header("Location:../Views/admin/index.php");
            }
            
            else if($user->getrole() == "Student")
            {
                session_start();
               
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] =  $user->getUsername();
                $_SESSION['role'] = $user->getrole();


              header("Location:../Views/student/index.php");
            }
            else if($user->getrole() == "Teacher")
            {
                session_start();
               
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] =  $user->getUsername();
                $_SESSION['role'] = $user->getrole();


              header("Location:../Views/teacher/index.php");
            }
            
        }
    }

       
}






?>