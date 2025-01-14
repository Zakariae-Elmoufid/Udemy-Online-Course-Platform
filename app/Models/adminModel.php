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

}

?>