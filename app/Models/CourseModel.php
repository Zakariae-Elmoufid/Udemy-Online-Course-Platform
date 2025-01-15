<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class CourseModel{

    private $conn;

   public function __construct(){
       $this->conn = Database::getConnection();
   }


   public function insertCours($user_id,$title,$description,$content,$tags,$category){
        
    $query = "INSERT INTO courses (title, description,  category_id, content,user_id) 
    VALUES (:title, :description, :category_id, :content,:user_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":category_id", $category);
        $stmt->bindParam(":user_id", $user_id);
      
        $stmt->execute();

        $CourseId = $this->conn->lastInsertId();
    

        foreach ($tags as $tagId) {
        $tagQuery = "INSERT INTO course_tag (course_id, tag_id) VALUES (:course_id, :tag_id)";
        $tagStmt = $this->conn->prepare($tagQuery);
        $tagStmt->bindParam(':course_id',$CourseId);
        $tagStmt->bindParam(':tag_id', $tagId);
        $tagStmt->execute();  
        }

        header("location:./index.php");

    }

    public function selectAllCourse(){
        $query = "SELECT 
                courses.title, 
                courses.description, 
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
                courses.title, 
                courses.description, 
                courses.content, 
                users.username, 
                categorys.title";
         $stmt = $this->conn->prepare($query);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    

}


?>