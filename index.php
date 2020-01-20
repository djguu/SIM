<?php
// Initialize the session
session_start();

if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]){
    header("location: login.php");
    exit;
}

?>

<html lang="pt">
<body>
<h1>HELLLO<?=$_SESSION["loggedin"]?></h1>
<a href="assets/php/logout.php">Logout</a>
</body>
</html>
