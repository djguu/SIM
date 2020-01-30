<?php
//session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';
$confirm_password_error = "";
$email_error = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['password_confirm']);
    $id = $_SESSION['id'];
    $op = "";

    if(empty($password)){
        $sql = "UPDATE user_t  SET email = ? WHERE id = ?";
        $op = "mail";
        //validate email
        if(empty($email)){
            $email_error = "enter";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = "valid";
            }
        }
    } else {
        $sql = "UPDATE user_t  SET email = ?, password = ? WHERE id = ?";
        $op = "pass";

        //validate email
        if(empty($email)){
            $email_error = "enter";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = "valid";
            }
        }

        // Validate confirm password
        if (empty($confirm_password)) {
            $confirm_password_error = "enter";
        } else {
            if (empty($password_error) && ($password != $confirm_password)) {
                $confirm_password_error = "valid";
            }
        }
    }
    if(empty($email_error) && empty($confirm_password_error)) {
        if ($stmt = mysqli_prepare($db, $sql)) {
            if($op === "pass") {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssi", $param_email, $param_password, $param_id);

                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                $param_id = $id;
            }
            elseif($op === "mail") {
                // Bind variables to the prepared statement  as parameters
                mysqli_stmt_bind_param($stmt, "si", $param_email, $param_id);
                $param_email = $email;
                $param_id = $id;
            }
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                header("location: /assets/pages/user.php");
            } else {
                header("location: /?error");
            }
            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            printf("Error: %s.\n", $db->error);
        }
        // Close connection
        mysqli_close($db);
    }
    else{
        if(!empty($email_error) && !empty($confirm_password_error)){
            header("location: /assets/pages/user.php?email_error=".$email_error."&password_confirm_error=".$confirm_password_error);
            exit;
        }
        if(!empty($confirm_password_error)){
            header("location: /assets/pages/user.php?password_confirm_error=".$confirm_password_error);
            exit;
        }
        if(!empty($email_error)){
            header("location: /assets/pages/user.php?email_error=".$email_error);
            exit;
        }
    }
}