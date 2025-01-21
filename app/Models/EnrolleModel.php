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
        $query = "INSERT INTO enrollment (student_id,course_id)
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
        enrollment.course_id,
        enrollment.student_id,
        courses.created_at,
        categorys.title as category_title,
        GROUP_CONCAT(tags.title) AS tags
        from courses 
        inner join  enrollment on enrollment.course_id = courses.id
        inner join students on students.id  = enrollment.student_id
        inner join users on students.user_id = users.id
        INNER JOIN 
                categorys ON categorys.id = courses.category_id
            LEFT JOIN 
                Course_Tag ON Course_Tag.course_id = courses.id
            LEFT JOIN 
                tags ON tags.id = Course_Tag.tag_id
        WHERE enrollment.student_id = :id
        
        GROUP by courses.title,
        users.username,
        courses.id,
        enrollment.course_id,
        courses.description,
        courses.deleted_at,
        courses.content,
        courses.created_at,
        enrollment.student_id,
        categorys.title";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(":id",$id);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancle($student_id,$course_id){
        $query = "DELETE FROM enrollment
         where course_id = :course_id and student_id = :student_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":course_id",$course_id);
        $stmt->bindParam(":student_id",$student_id);
        $stmt->execute();
        header("location:./myCourses.php");
    }
   
}
?>