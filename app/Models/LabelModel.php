<?php



namespace App\Models;
use App\Config\Database;
use App\Classes\Label;
use PDO;

class LabelModel {
     
    private $conn;

    public function __construct(){
        $this->conn = Database::getConnection();
    }
    public function selectAllLabel($table){
        $query = "select * from  $table ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectLabel($table, $id){
        $query = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editLabel($table,$id,$title){
        $query = "UPDATE $table set title = :title WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return new Label($id,$title);
    }

    public function insertTag($table,$title){
       
      $tags = array_map('trim', explode(' ', $title));

      $query = "INSERT INTO $table (title) VALUES (:title)";
      $stmt = $this->conn->prepare($query);

      foreach($tags as $tag){
          $stmt->bindParam(":title",$tag);
          $stmt->execute();
      }
      header("location:./index.php");
    }

    public function insertCategory($table,$title){
      $query = "INSERT INTO $table (title) VALUES (:title)";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(":title",$title);
      $stmt->execute();
      header("location:./index.php");

    }


    public function deleted($table,$id){
        $query = "DELETE  FROM $table  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        header("location:./index.php");
    }
    
    public function countLable($table){
        $query = "SELECT COUNT(id) FROM  $table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

}
?>