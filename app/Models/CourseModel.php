<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class CourseModel{

    private $conn;

   public function __construct(){
       $this->conn = Database::getConnection();
   }


   public function insertCours($title,$description,$content,$tags,$category){
        
    $query = "INSERT INTO courses (title, description,  category_id, content) 
    VALUES (:title, :description, :category_id, :content)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":category_id", $category);
      
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
    

    

}


?>