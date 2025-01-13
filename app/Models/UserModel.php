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

        if ($row && !password_verify($password , $row['password'])){
        
            return new User($row['id'], $row['username'], $row["email"], $row["password"],$row['role']);

        } else {
             return  null;
         }
        }  
    
        public function saveUser($username, $email, $password, $role){
           
            
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO user (username, email, password, id_role) VALUES (:username, :email, :password, :id_role)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':role',$role);
                $stmt->execute();
            
           
        }
}


?>