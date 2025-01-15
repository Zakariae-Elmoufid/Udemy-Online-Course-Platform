<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';
use App\classes\Category;


if (isset($_POST['submit'])) {

    $id = $_POST['id'] ;

    $category = new Category();
    $category->deleteLabel($id, $title);
    echo "id=".$id;
}

?>