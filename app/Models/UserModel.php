<?php

namespace App\Models; 
use App\Config\Database;
use App\Classes\User;
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
                // Fetch the status and additional information for the user based on role
                $status = $this->getUserStatus($row['id'], $row['role']);
        
                    $user = new User(
                        $row['id'],
                        $row['username'],
                        $row['email'],
                        $row['password'],
                        $row['role'],
                        $status
                    );
                    return $user;
                
            
    
        } 
            }  


        private function getUserStatus($userId, $role)
{
    if ($role == 'Teacher') {
        $query = "SELECT * FROM teachers WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $teacher = $stmt->fetch(PDO::FETCH_ASSOC);

        
            return $teacher['status'];
        
    } elseif ($role == 'Student') {
        $query = "SELECT * FROM Students WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $userId);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

            return $student['status'];
        
    }

    
}
    
        public function saveUser($username,$email,$password,$role,$field){
           
            
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                $query = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':role',$role);
                $stmt->execute();
                    
                $id = $this->conn->lastInsertId();
                

                
                    if($role === 'student'){
                        $queryStudent = "INSERT INTO  students (user_id , field) values (:id, :field)";
                        $stmt = $this->conn->prepare($queryStudent);
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':field', $field);
                        $stmt->execute();
                        return new User($id,  $username,  $email,  $password, $role ,'Activation' ,$field); 
                    }else if ($role === 'teacher'){
                        $queryTeacher = "INSERT INTO  teachers (user_id , speciality) values (:id, :speciality)";
                        $stmt = $this->conn->prepare($queryTeacher); 
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':speciality', $field);
                        $stmt->execute();
                        return new User($id,  $username,  $email,  $password, $role ,'suspension' ,$field); 
                    }
                    
           
            
        }
}


?>