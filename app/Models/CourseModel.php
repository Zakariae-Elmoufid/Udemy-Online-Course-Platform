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
        
    $query = "INSERT INTO courses (title, description,  category_id, content,teacher_id) 
    VALUES (:title, :description, :category_id, :content, :user_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description",$description);
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

    public function selectAllCourseById($id){
        $query = "SELECT 
        courses.id,
        courses.title, 
        courses.description, 
         courses.deleted_at,
         courses.created_at,
        courses.content, 
        courses.status,
        users.username, 
        GROUP_CONCAT(tags.title) AS tags, 
        categorys.title AS category_title
        FROM 
            courses
        INNER JOIN 
                teachers ON teachers.id = courses.teacher_id
        inner join 
                 users on users.id =   teachers.user_id  
        INNER JOIN 
            categorys ON categorys.id = courses.category_id
        LEFT JOIN 
            Course_Tag ON Course_Tag.course_id = courses.id
        LEFT JOIN 
            tags ON tags.id = Course_Tag.tag_id
        WHERE teachers.id = :id      
        GROUP BY 
        courses.id,
        courses.title, 
        courses.description, 
        courses.content, 
        courses.status,
        users.username,   
         courses.deleted_at,
         courses.created_at,
        categorys.title";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAllCourses(){
        $query = "SELECT 
                courses.id,
                courses.title, 
                courses.description, 
                courses.deleted_at,
                courses.created_at,
                courses.content, 
                courses.status,
                users.username, 
                GROUP_CONCAT(tags.title) AS tags, 
                categorys.title AS category_title
            FROM 
                courses
            INNER JOIN 
                teachers ON teachers.id = courses.teacher_id
            inner join 
                 users on users.id =   teachers.user_id  
            INNER JOIN 
                categorys ON categorys.id = courses.category_id
            LEFT JOIN 
                Course_Tag ON Course_Tag.course_id = courses.id
            LEFT JOIN 
                tags ON tags.id = Course_Tag.tag_id
            where courses.status    = 'Active'
            GROUP BY 
                courses.id,
                courses.title, 
                courses.description, 
                courses.content, 
                courses.status,
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
                teachers ON teachers.id = courses.teacher_id
            inner join
                 users on users.id = teachers.user_id
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

    public function selecSixCourses($page){
        $itemsPerPage = 6;
        $offset = ($page - 1) * $itemsPerPage;
        $query = "SELECT 
            courses.id,
            courses.title, 
            courses.description, 
            courses.deleted_at,
            courses.created_at,
            courses.content, 
            courses.status,
            users.username, 
            GROUP_CONCAT(tags.title) AS tags, 
            categorys.title AS category_title
        FROM 
            courses
        INNER JOIN 
            teachers ON teachers.id = courses.teacher_id
        INNER JOIN 
            users ON users.id = teachers.user_id  
        INNER JOIN 
            categorys ON categorys.id = courses.category_id
        LEFT JOIN 
            Course_Tag ON Course_Tag.course_id = courses.id
        LEFT JOIN 
            tags ON tags.id = Course_Tag.tag_id
        WHERE 
            courses.status = 'Active'
        GROUP BY 
            courses.id,
            courses.title, 
            courses.description, 
            courses.content, 
            courses.status,
            users.username,   
            courses.deleted_at,
            courses.created_at,
            categorys.title
        LIMIT :limit OFFSET :offset;
";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function selectAllCoursesAdmin(){
        $query = "SELECT 
                courses.id,
                courses.title, 
                courses.description, 
                 courses.deleted_at,
                 courses.created_at,
                courses.content, 
                courses.status,
                users.username, 
                GROUP_CONCAT(tags.title) AS tags, 
                categorys.title AS category_title
            FROM 
                courses
            INNER JOIN 
                teachers ON teachers.id = courses.teacher_id
            inner join 
                 users on users.id =   teachers.user_id  
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
                courses.status,
                users.username,   
                 courses.deleted_at,
                 courses.created_at,
                categorys.title";
         $stmt = $this->conn->prepare($query);
         $stmt->execute();
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectThreeTeacher(){
        $query = "SELECT 
            users.username, 
            users.email,
            COUNT(DISTINCT enrollment.student_id) AS total_student,
            COUNT(DISTINCT courses.id) AS total_course
        FROM 
            teachers
        left JOIN 
            courses ON teachers.id = courses.teacher_id
        INNER JOIN 
            users ON teachers.user_id = users.id
        left JOIN 
            enrollment ON  courses.id  = enrollment.course_id 
        GROUP BY 
            users.username ,users.email
        ORDER BY 
            total_course DESC, 
            total_student DESC
        LIMIT 3";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countCourses(){
        $query = "SELECT COUNT(id) FROM  courses";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function top1course(){
        $query = "SELECT courses.title
            FROM courses
            LEFT JOIN enrollment ON courses.id = enrollment.course_id
            GROUP BY courses.id
            ORDER BY COUNT(enrollment.course_id) DESC
            LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();

    }

    public function search($query) {
        
        $sql = "SELECT 
            courses.id,
            courses.title, 
            courses.description, 
            courses.deleted_at,
            courses.created_at,
            courses.content, 
            courses.status,
            categorys.title as category_title,
            users.username                 
                FROM courses
            INNER JOIN 
            teachers ON teachers.id = courses.teacher_id
              INNER JOIN 
            users ON users.id = teachers.user_id  
              INNER JOIN 
            categorys ON categorys.id = courses.category_id    
                WHERE courses.title LIKE :query
                AND courses.deleted_at IS NULL
            Group by    
             courses.id,
            courses.title, 
            courses.description, 
            courses.content, 
            courses.status,
            users.username,   
            courses.deleted_at,
            courses.created_at,
            categorys.title    ";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editStatusCourse($courseId,$action){
        if ($action === 'suspension') {
            $query = "UPDATE courses SET `status` = 'Suspended'  WHERE id = :id";
        } elseif ($action === 'suppression') {
            $query = "UPDATE courses SET deleted_at = CURRENT_DATE WHERE id = :id";
        } elseif ($action === 'Activation') {
            $query = "UPDATE courses SET `status` = 'Active' WHERE id = :id";
        } 

        $stmt = $this->conn->prepare( query: $query);
        $stmt->bindParam(param: ":id" ,var: $courseId);
        
        $stmt->execute();
        header("Location: ./index.php");
    }


    public function UserEnrolled($userId, $courseId) {
        $query = "SELECT * FROM enrollment WHERE student_id = :userId AND course_id = :courseId";
        $statement = $this->conn->prepare($query);
        $statement->execute([
            ':userId' => $userId,
            ':courseId' => $courseId
        ]);
        return $statement->rowCount() > 0; 
    }
    
    public function  countEnrollment($id){
        $query = "SELECT count(enrollment.course_id) FROM courses
         inner join enrollment on enrollment.course_id = courses.id 
         where teacher_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetchColumn(); 
    }
    
    public function counteCourses($id){
        $query = "SELECT count(*) FROM courses
         where teacher_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function statusActive($id){
        $query = "SELECT count(*) FROM courses
        where teacher_id = :id and status = 'Active' ";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(':id',$id);
       $stmt->execute();
       return $stmt->fetchColumn();
    }
    


}


?>