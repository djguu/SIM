<?php
// Initialize the session
session_start();
header('Content-type: text/html; charset=utf-8');
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]){
//    header("location: login.php");
//    exit;
    //TODO remove this after implementing user
    $_SESSION["username"] = "teste";
}
//$text = "Bacon ipsum dolor amet bacon ham buffalo shank rump fatback ribeye ball tip short loin bresaola chicken shoulder turkey burgdoggen. Landjaeger ground round fatback kielbasa pastrami cow, chislic ball tip strip steak pancetta. Pastrami shank jerky, ham hock filet mignon cow pork belly. Jerky pork chop leberkas beef, pig kevin filet mignon rump shank doner drumstick bacon. Shankle sirloin corned beef turducken ham hock short loin short ribs.";