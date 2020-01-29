<?php
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
$url = $_SERVER['DOCUMENT_ROOT']."/assets/pages/login.php";
header("location: ".$url); //to redirect back to "index.php" after logging out
exit();