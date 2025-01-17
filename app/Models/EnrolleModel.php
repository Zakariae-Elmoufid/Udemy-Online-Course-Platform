<?php 
namespace App\Models;

use App\Config\Database;
use PDO;

class EnrolleModel{

    private $conn;

    public function __construct(){
       $this->conn = Database::getConnection();
    }

    public function insertCourseAndStudent($student,$course){
        $query = "INSERT INTO enrollment (user_id,course_id)
        VALUES (:student , :course)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":student",$student);
        $stmt->bindParam(":course",$course);
        $stmt->execute();
        header("location:./myCourses.php");
    }


    public function selectMyCourse($id){
        $query = "SELECT users.username,
        courses.title,
        courses.id,
        courses.deleted_at,
        courses.description,
        courses.content,
        courses.created_at,
        categorys.title as category_title,
        GROUP_CONCAT(tags.title) AS tags
        from courses 
        inner join users on courses.user_id = users.id
        inner join  enrollment on enrollment.course_id = courses.id
        INNER JOIN 
                categorys ON categorys.id = courses.category_id
            LEFT JOIN 
                Course_Tag ON Course_Tag.course_id = courses.id
            LEFT JOIN 
                tags ON tags.id = Course_Tag.tag_id
        WHERE enrollment.user_id = :id
        
        GROUP by courses.title,
        users.username,
        courses.id,
        courses.description,
        courses.deleted_at,
        courses.content,
        courses.created_at,
        categorys.title";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(":id",$id);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
}
?>