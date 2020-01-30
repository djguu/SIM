<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["titulo"]);
    $text = trim($_POST["texto"]);


    $sql = "INSERT INTO note_t (title, text, type, user_id) VALUES (?, ?, ?, ?)";


    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssi", $param_title, $param_text, $param_type, $param_user_id);

        $param_title = $title;
        $param_text = $text;
        $param_type = "txt";
        $param_user_id = $_SESSION['id'];

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            header("location: /");
        } else{
            header("location: /?error");
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    else{
        printf("Error: %s.\n", $db->error);
    }
    // Close connection
    mysqli_close($db);
}