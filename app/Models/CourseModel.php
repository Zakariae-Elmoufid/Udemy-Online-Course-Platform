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
                courses.id,
                courses.title, 
                courses.description, 
                 courses.deleted_at,
                 courses.created_at,
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
                 courses.deleted_at,
                 courses.created_at,
                categorys.title";
         $stmt = $this->conn->prepare($query);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function selectCourseById($id){
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
            where courses.id = :id
            GROUP BY 
                courses.title, 
                courses.description, 
               
                courses.content, 
                users.username, 
                categorys.title";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);


    }

    public function EditCourse($id,$title,$description,$content,$tags,$category){
        $query ="UPDATE courses set 
         title = :title,
         description = :description,
         content = :content,
         category_id = :category
         WHERE id = :id ";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(":id",$id);
         $stmt->bindParam(":title",$title);
         $stmt->bindParam(":description",$description);
         $stmt->bindParam(":content",$content);
         $stmt->bindParam(":category",$category);
         $stmt->execute();

         $deleteTag = "DELETE FROM Course_Tag WHERE course_id = :id ";
         $deletestmt = $this->conn->prepare($deleteTag);
         $deletestmt->bindParam(":id",$id);
         $deletestmt->execute();

         foreach($tags as $tagId){
            $insertTag = "INSERT INTO Course_Tag (course_id, tag_id) VALUES (:course_id, :tag_id)";
            $tagStmt = $this->conn->prepare($insertTag);
            $tagStmt->bindParam(':course_id',$id);
            $tagStmt->bindParam(':tag_id', $tagId);
            $tagStmt->execute();  
         }
         header("location:./courses.php");
    }
    
    public function softDelete($id){
        $query =  "UPDATE courses SET deleted_at = CURRENT_DATE WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        header("location:./courses.php");
 
    }

    public function HardDelete($id){
        $query = "DELETE FROM courses WHERE id = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        header("location:./delete.php");
    }
    
    public function retrieve($id){
        $query =  "UPDATE courses SET deleted_at = null WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        header("location:./courses.php");
    }
    

}


?>