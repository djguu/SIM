<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /");
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';


$username = $password = "";
$username_error = $password_error = $confirm_password_error = $email_error = $name_error = $surname_error = $birthdate_error = "";
$username_fill = $email_fill = $name_fill = $surname_fill = $birthdate_fill  = "";

$date_now = date("Y");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_post = trim($_POST["username"]);
    $password_post = trim($_POST["password"]);
    $password_confirm_post = trim($_POST["password_confirm"]);
    $email_post = trim($_POST["email"]);

    // Validate username
    if(empty($username_post)){
        $username_error = "Insira um username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user_t WHERE username = ?";

        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username_post;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_error = "O username ja esta em uso.";
                } else{
                    $username = $username_post;
                }
            } else{
                echo "Ocorreu um erro. Tente novamente.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    $username_fill = $username_post;

    // Validate password
    if(empty($password_post)){
        $password_error = "Insira uma palavra-passe.";
//            } elseif(strlen($password_post) < 5){
//                $password_error = "A palavra passe devera ter pelo menos 5 caracteres";
    } else{
        $password = $password_post;
    }

    // Validate confirm password
    if(empty($password_confirm_post)){
        $confirm_password_error = "Confirme a sua palavra-passe.";
    } else{
        $confirm_password = $password_confirm_post;
        if(empty($password_error) && ($password != $confirm_password)){
            $confirm_password_error = "Palavra-passe nao esta igual.";
        }
    }

    //validate email
    if(empty($email_post)){
        $email_error = "Insira um email.";
    } else {
        if (filter_var($email_post, FILTER_VALIDATE_EMAIL)) {
            $email = $email_post;
        } else {
            $email_error = "Insira um email válido.";
        }
    }
    $email_fill = $email_post;

    if(empty($username_error) && empty($password_error) && empty($confirm_password_error) && empty($email_error)){
        // Prepare an insert statement
        $sql = "INSERT INTO user_t (username, password, email, hash_confirm, confirmed) VALUES (?, ?, ?, ?, ?)";


        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_username, $param_password, $param_email, $param_hash, $param_confirmed);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            //----------------------------
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);
            //----------------------------
            $param_hash = $token;
            $param_email = $email_post;
            $param_confirmed = 0;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                printf("Error: %s.\n", mysqli_stmt_error($stmt));
                echo "Ocorreu um erro. Tente novamente mais tarde.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
        else{
            printf("Error: %s.\n", $db->error);
        }
    }
    // Close connection
    mysqli_close($db);
}
