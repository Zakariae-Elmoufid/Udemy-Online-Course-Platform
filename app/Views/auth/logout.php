<?php
require_once __DIR__ . '/../../../vendor/autoload.php';


session_start();
if (isset($_POST['submit'])) {
    session_unset(); 
    session_destroy(); 
    header("Location: login.php"); 
    exit();
}


?>