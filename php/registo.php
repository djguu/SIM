<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php?user=".$_SESSION["username"]);
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'].'/SIM/includes/db.php';

$username = $password = "";
$username_error = $password_error = $confirm_password_error = $email_error = $name_error = $surname_error = $birthdate_error = "";
$username_fill = $email_fill = $name_fill = $surname_fill = $birthdate_fill  = "";

$date_now = date("Y");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_post = trim($_POST["username"]);
    $password_post = trim($_POST["password"]);
    $password_confirm_post = trim($_POST["password_confirm"]);
    $email_post = trim($_POST["email"]);
    $name_post = trim($_POST["name"]);
    $surname_post = trim($_POST["surname"]);
    $birthdate_post = trim($_POST["birthdate"]);

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
        $confirm_password_error = "Confirma a sua palavra-passe.";
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

    // Validate name
    if(empty($name_post)){
        $name_error = "Insira o seu nome.";
    } else{
        $name = $name_post;
    }
    $name_fill = $name_post;

    // Validate surname
    if(empty($surname_post)){
        $surname_error = "Insira o seu sobrenome.";
    } else{
        $surname = $surname_post;
    }
    $surname_fill = $surname_post;

    if(empty($birthdate_post)){
        $birthdate_error = "Insira a sua data de nascimento.";
    } else{
        $timestamp = strtotime($birthdate_post);
        $year=date('Y',$timestamp);
        if($year < 1920 || $year > ($date_now - 10)){
            $birthdate_error = "Insira uma data correta.";
        }
    }
    $birthdate_fill = $birthdate_post;


    //TODO
    // FAZER O RESTO DO REGISTO
    // FALTA CAMPOS DE NOME E DATA DE NASCIMENTO
}
