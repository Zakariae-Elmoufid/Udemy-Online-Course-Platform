<?php



namespace App\Models;
use App\Config\Database;
use PDO;

class LableModel {
     
    private $conn;

    public function __construct(){
        $this->conn = Database::getConnection();
    }
    public function selectAllLable($table){
        $query = "select * from  $table ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectLable($table, $id){
        $query = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editLable($table,$id,$title){
        $query = "UPDATE $table set title = :title WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        header("location:./index.php");
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


}
?>