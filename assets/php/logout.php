<?php
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header('HTTP/1.0 302 Found');
header("location: /assets/pages/login.php"); //to redirect back to "index.php" after logging out
exit();