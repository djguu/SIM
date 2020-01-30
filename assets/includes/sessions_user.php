<?php
// Initialize the session
session_start();
header('Content-type: text/html; charset=utf-8');
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]){
    header("location: /assets/pages/login.php");
    exit;
}
if(!$_SESSION['confirmed']){
    header("location: /assets/pages/not_confirmed.php");
}