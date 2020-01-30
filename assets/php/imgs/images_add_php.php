<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/";
    $name = $_FILES["file"]["name"];
    $target_file = $target_dir . basename($name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["file"]["size"] > 8000000) {
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        header("location: /assets/pages/images.php?success");
    }
    if($uploadOk){
        $sql = "INSERT INTO note_t (title, text, type, user_id) VALUES (?, ?, ?, ?)";


        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_title, $param_text, $param_type, $param_user_id);

            $param_title = $name;
            $param_text = $name;
            $param_type = "img";
            $param_user_id = $_SESSION['id'];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                header("location: /assets/pages/images.php");
            } else{
                header("location: /assets/pages/images.php?error");
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
}