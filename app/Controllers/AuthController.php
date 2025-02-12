<?php

namespace App\Controllers;
use App\Models\UserModel;

class   Authcontroller{


    public function login($email, $password){
        $userModel = new UserModel();
        $user =  $userModel->findUserByEmailAndPassword($email,$password);
        if($user == null)
        {
            echo "user not found please check manaule ..." . $user;
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
                if($user->getStatus() == 'suspension'){
                    header("Location:../pending.php");
                }else if ($user->getStatus() == 'Activation'){
                    header("location:../student/index.php");
                }else if ($user->getStatus() == 'suppression'){
                    header("location:../auth/login");
                }

                
            }
            else if($user->getRole() == "Teacher")
            {
            
                session_start();
                
                $_SESSION['id'] = $user->getId();
                $_SESSION['username'] =  $user->getUsername();
                $_SESSION['role'] = $user->getRole();

                if($user->getStatus() == 'suspension'){
                    header("Location:..pending.php");
                }else if ($user->getStatus() == 'Activation'){
                    header("location:../teacher/index.php");
                }else if ($user->getStatus() == 'suppression'){
                    header("location:../auth/login.php");
                }
            }
            
    }
    }
    public function register($username,$email,$password,$role,$extraInfo){
        $userModel = new UserModel();
        $user  = $userModel->saveUser($username,$email,$password,$role,$extraInfo);

         
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

                if($user->getStatus() == 'suspension'){
                    header("Location:../pending.php");
                }else if ($user->getStatus() == 'Activation'){
                    header("location:../teacher/index.php");
                }
                        
        }
            
         
    }

       
}






?>