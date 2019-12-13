<?php
    require "dbConnect.php";
   
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        getAllToDo();
    }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
        insertToDo($_POST["subject"], $_POST["date"], $_POST["description"]);
    }elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
        $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($fullURL);
        parse_str($parts['query'], $query);
        $inputId = $query['id'];
        deleteToDo($inputId);
    }
?>
