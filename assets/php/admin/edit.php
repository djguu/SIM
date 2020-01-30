<?php
// Initialize the session
session_start();
// Include config file
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';

$id = $_GET['id'];

// Prepare a select statement
$sql = "SELECT confirmed FROM user_t WHERE id = ?";

if($stmt = mysqli_prepare($db, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    // Set parameters
    $param_id = $id;

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        /* store result */
        mysqli_stmt_bind_result($stmt, $confirmed);
        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
            $confirmed_field = !$confirmed;
        }

        if(mysqli_stmt_num_rows($stmt) != 1){
            echo "O utilizador não existe. Insira novamente.";
        }
    } else{
        echo "Ocorreu um erro. Tente novamente.";
    }
}

// Close statement
mysqli_stmt_close($stmt);


// Prepare an update statement
$sql = "UPDATE user_t SET confirmed = ? WHERE id = ?";

if($stmt = mysqli_prepare($db, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "is", $param_confirmed, $param_id);

    // Set parameters
    $param_confirmed = $confirmed_field;
    $param_id = $id;

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Password updated successfully. Redirect to login page
        header("location: /assets/pages/admin.php");
        exit();
    } else{
        echo "Ocorreu um erro. Tente novamente.";
    }
}

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($db);
