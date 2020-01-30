<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["titulo"];
    $text = $_POST["texto"];

    $id = $_GET['edit'];


    $sql = "UPDATE note_t  SET title = ?, text = ? WHERE id = ?";


    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssi", $param_title, $param_text,  $param_id);

        $param_title = $title;
        $param_text = $text;
        $param_id = $id;

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