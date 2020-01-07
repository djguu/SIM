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
    $username_error = $password_error = "";
    $confirm_password_error = $email_error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty(trim($_POST["username_login"]))){
            $username_error = "Insira um username.";
        } else{
            $username = trim($_POST["username_login"]);
        }

        // Check if password is empty
        if(empty(trim($_POST["password_login"]))){
            $password_error = "Insira uma password.";
        } else{
            $password = trim($_POST["password_login"]);
        }

        // Validate credentials
        if(empty($username_error) && empty($password_error)){
            // Prepare a select statement
            $sql = sprintf("SELECT id, username, password FROM user_t WHERE username = '%s'", $username);

            if($stmt = mysqli_prepare($db, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Redirect user to welcome page
                                header("location: index.php?user=".$_SESSION["username"]);
                            } else{
                                // Display an error message if password is not valid
                                $password_error = "The password you entered was not valid.";
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $username_error = "No account found with that username.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
