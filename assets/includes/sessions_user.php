<?php
// Initialize the session
session_start();

if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]){
//    header("location: login.php");
//    exit;
    //TODO remove this after implementing user
    $_SESSION["username"] = "teste";
}
