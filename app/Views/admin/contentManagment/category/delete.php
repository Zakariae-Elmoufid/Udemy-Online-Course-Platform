<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';
use App\Controllers\CategoryController;


if (isset($_POST['submit'])) {

    $id = $_POST['id'] ;

    $category = new CategoryController("categorys");
    $category->deleteLabel($id, $title);
    echo "id=".$id;
}

?>