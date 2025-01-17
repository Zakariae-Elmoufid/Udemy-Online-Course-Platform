<?php

require_once __DIR__ . '/../../../../../vendor/autoload.php';
use App\classes\Tag;


if (isset($_POST['submit'])) {

    $id = $_POST['idTag'] ;


    $tag = new Tag();
    $tag->deleteLabel($id);
    echo "id=".$id;
}

?>