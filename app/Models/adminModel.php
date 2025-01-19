<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class AdminModel{
    
    private $conn;

    public function __construct(){
        $this->conn = Database::getConnection();
    }

    public function fechAllTeacher(){
      $query ="SELECT * FROM users 
      inner join teachers on users.id = teachers.user_id";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fechAllStudent(){
      $query ="SELECT * FROM users 
      inner join students on users.id = students.user_id";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editStatusTeacher($userId,$action){
        if ($action === 'suspension') {
            $query = "UPDATE teachers SET `status` = 'suspension'  WHERE user_id = :id";
        } elseif ($action === 'suppression') {
            $query = "UPDATE users SET deleted_at = CURRENT_DATE WHERE id = :id";
        } elseif ($action === 'Activation') {
            $query = "UPDATE teachers SET `status` = 'Activation' WHERE user_id = :id";
        } 

        $stmt = $this->conn->prepare( query: $query);
        $stmt->bindParam(param: ":id" ,var: $userId);
        
        $stmt->execute();
        header("Location: ./teacherValidation.php");

      
    }
    public function editStatusUser($userId,$action){
        if ($action === 'suspension') {
            $query = "UPDATE students SET `status` = 'suspension'  WHERE user_id = :id";
        } elseif ($action === 'suppression') {
            $query = "UPDATE users SET deleted_at = CURRENT_DATE WHERE id = :id";
        } elseif ($action === 'Activation') {
            $query = "UPDATE students SET `status` = 'Activation' WHERE user_id = :id";
        } 

        $stmt = $this->conn->prepare( query: $query);
        $stmt->bindParam(param: ":id" ,var: $userId);
        
        $stmt->execute();
        header("Location: ./userValidation.php");
    }

    public function selectAllCourse(){
        $query = "SELECT 
                courses.id,
                courses.title, 
                courses.description, 
                courses.deleted_at,
                courses.created_at,
                courses.status,
                courses.content, 
                users.username, 
                GROUP_CONCAT(tags.title) AS tags, 
                categorys.title AS category_title
            FROM 
                courses
            INNER JOIN 
                users ON users.id = courses.user_id
            INNER JOIN 
                categorys ON categorys.id = courses.category_id
            LEFT JOIN 
                Course_Tag ON Course_Tag.course_id = courses.id
            LEFT JOIN 
                tags ON tags.id = Course_Tag.tag_id
                
            GROUP BY 
                courses.id,
                courses.title, 
                courses.description, 
                courses.content, 
                users.username,   
                courses.status,
                courses.deleted_at,
                courses.created_at,
                categorys.title";
         $stmt = $this->conn->prepare($query);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    

   
    
   
    

}

?>