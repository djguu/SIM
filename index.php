<?php

if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]){
    header("location: log.php");
    exit;
}