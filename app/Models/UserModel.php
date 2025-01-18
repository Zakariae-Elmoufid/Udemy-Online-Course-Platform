<?php

namespace App\Models; 
use App\Config\Database;
use App\Classes\Student;
use App\Classes\Teacher;
use App\Classes\Admin;
use PDO;
use PDOException;

class UserModel {

    private $conn;
    public function __construct(){
        $this->conn = Database::getConnection();
    }


    public function findUserByEmailAndPassword($email, $password){
        $query = "SELECT * FROM Users 
        WHERE email = :email ";

        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        
        $row = $stmt->fetch(mode: PDO::FETCH_ASSOC);

        if ($row && password_verify($password , $row['password'])){
                $role = $this->getUserRole($row['id'], $row['role']);
                var_dump($role);
                $id = $role['id'];
                $status = isset($role['status']) ? $role['status'] : null;

                    if($row['role'] == 'Teacher'){
                       $user = new Teacher( 
                       $row['username'],
                       $row['email'],
                       $row['password'],
                       $row['role'],
                       $id,
                       $status
                       
                    );
                    }else if ($row['role'] == 'Student' ){

                        $user = new Student(
                            $row['username'],
                            $row['email'],
                            $row['password'],
                            $row['role'],
                            $id,
                            $status
                        );
                    }else if ($row['role'] == 'Admin'){
                        $user = new Admin(
                            $row['username'],
                            $row['email'],
                            $row['password'],
                            $row['role'],
                            $id
                            );
                    }
                    return $user;
                
            
    
        } 
            }  


        public function getUserRole($userId, $role){
            $table ;
            switch ($role) {
                case 'admin':
                    $table = 'admin';
                    break;
                case 'Student':
                    $table = 'students';
                    break;
                case 'Teacher':
                    $table = 'teachers';
                    break;
                default:
                    throw new Exception("Invalid role provided.");
            }
        $query = "SELECT * FROM $table WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
         }
    
        public function saveUser($username,$email,$password,$role,$extraInfo){
           
            
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                $query = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':role',$role);
                $stmt->execute();
                    
                $id = $this->conn->lastInsertId();
                

                
                    if($role === 'Student'){
                        $queryStudent = "INSERT INTO  students (user_id , field) values (:id, :field)";
                        $stmt = $this->conn->prepare($queryStudent);
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':field', $extraInfo);
                        $stmt->execute();
                        $student_id = $this->conn->lastInsertId();
                        return new Student( $username,  $email,  $password, $role ,$student_id,'Activation' ,$extraInfo); 
                    }else if ($role === 'Teacher'){
                        $queryTeacher = "INSERT INTO  teachers (user_id , speciality) values (:id, :speciality)";
                        $stmt = $this->conn->prepare($queryTeacher); 
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':speciality', $extraInfo);
                        $stmt->execute();
                        $teacher_id = $this->conn->lastInsertId();
                        return new Teacher($username,  $email,  $password, $role ,$teacher_id,'suspension' ,$extraInfo); 
                    }
                    
           
            
        }
}


?>