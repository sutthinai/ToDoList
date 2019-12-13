<?php
    require "models/ToDoTask.php";
    session_start();

    function get_data()
    {
        if(!(isset($_SESSION["toDoList"]) && !empty($_SESSION["toDoList"]))) {
            return "";
        } else {
            return json_encode($_SESSION["toDoList"]);
        }
    }
    function add_data($subject, $date, $description)
    {

        if(!(isset($_SESSION["lastestID"]) && !empty($_SESSION["lastestID"]))) {
            $_SESSION["lastestID"] = 0;
        }
        $id = $_SESSION["lastestID"]++;        
        $newData = new ToDoTask($id, $subject, $date, $description, false);
        $_SESSION["toDoList"][$id] = serialize($newData);
        header( "location: mainpage.php" );
        exit(0);        
    }
    function edit_data($id, $subject, $date, $description, $status)
    {
        $newData = new ToDoTask($id, $subject, $date, $description, $status);
        $_SESSION[$id] = $newData;
    }

    function delete_data($id)
    {
        unset($_SESSION["toDoList"][$id]);
    }


    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo get_data();
    }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
        add_data($_POST["subject"], $_POST["day"], $_POST["description"]);
    }
?>
