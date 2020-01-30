<?php

// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /");
    exit;
}

// Include config file
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';


// Define variables and initialize with empty values
$username = $password = "";
$username_error = $password_error = "";
$confirm_password_error = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['password_confirm']);

    if(empty($username)){
        $username_error = "Insira um username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user_t WHERE username = ?";

        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) != 1){
                    $username_error = "O utilizador não existe. Insira novamente.";
                }
            } else{
                echo "Ocorreu um erro. Tente novamente.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate password
    if(empty($password)){
        $password_error = "Insira uma palavra-passe.";
    }

    // Validate confirm password
    if(empty($confirm_password)){
        $confirm_password_error = "Confirme a sua palavra-passe.";
    } else{
        if(empty($password_error) && ($password != $confirm_password)){
            $confirm_password_error = "Palavra-passe nao esta igual.";
        }
    }

    // Check input errors before updating the database
    if(empty($username_error) && empty($password_error) && empty($confirm_password_error)){
        // Prepare an update statement
        $sql = "UPDATE user_t SET password = ? WHERE username = ?";

        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_username);

            // Set parameters
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Redirect to login page
                header("location: login.php?user=$username");
                exit();
            } else{
                echo "Ocorreu um erro. Tente novamente.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($db);
}