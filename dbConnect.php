<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";
$tablename = "ToDoList";
$conn = new mysqli($servername, $username, $password);

function connectDb(){
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return;
}

function createDB()
{
    global $conn, $dbname;
    $sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;
    if ($conn->query($sql) === TRUE) {
        // echo "Database created successfully<br>";
        $conn->select_db($dbname);
    } else {
        // echo "Error creating database: " . $conn->error . "<br>";
    }
    return;
}

function createTable()
{
    global $conn, $tablename;
    $sql = "CREATE TABLE ToDoList (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        t_subject VARCHAR(30) NOT NULL,
        t_date VARCHAR(30) NOT NULL,
        t_description VARCHAR(30) NOT NULL
        )";

    if ($conn->query($sql) === TRUE) {
        // echo "Table ToDoList created successfully <br>";
    } else {
        // echo "Error creating table: " . $conn->error . "<br>";
    }
    return;
}

function insertToDo($subject, $date, $description){
    global $conn;
    connectDb();
    createDB();
    createTable();
    $sql = "INSERT INTO ToDoList (t_subject, t_date, t_description)
    VALUES ('".$subject."', '".$date."', '".$description."')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
        echo "Task Created.";
        header( "refresh: 0.5; url=mainpage.php" );
        exit(0);
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    return;
}

function getAllToDo(){
    global $conn;
    connectDb();
    createDB();
    createTable();
    
    $sql = "SELECT * FROM ToDoList";
    $result = $conn->query($sql);

    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    print json_encode($rows);

    return;
}

function deleteToDo($id){
    global $conn;
    connectDb();
    createDB();
    createTable();
    
    $sql = "DELETE FROM ToDoList WHERE id=".$id;

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    return;
}

function editToDo($id){
    global $conn;
    connectDb();
    createDB();
    createTable();
    
    $sql = "DELETE FROM ToDoList WHERE id=".$id;

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    return;
}
?>