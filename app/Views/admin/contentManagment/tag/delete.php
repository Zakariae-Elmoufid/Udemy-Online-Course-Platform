<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';
use App\Controllers\TagController;


if (isset($_POST['submit'])) {

    $id = $_POST['idTag'] ;


    $tag = new TagController("tags");
    $tag->deleteLabel($id);
   
}

?>