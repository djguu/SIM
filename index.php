<?php
// Initialize the session
session_start();

if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]){
//    header("location: login.php");
//    exit;
}
//TODO remove this after implementing user
$_SESSION["username"] = "teste";

?>
<!---->
<!--<html lang="pt">-->
<!--<body>-->
<!--<h1>HELLLO--><?//=$_SESSION["loggedin"]?><!--</h1>-->
<!--<a href="assets/php/logout.php">Logout</a>-->
<!--</body>-->
<!--</html>-->
<html lang="pt">
<head>
    <title>MyNotes</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Goncalo Correia">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">
</head>
<body>
<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-pasific navbar-expand-md navbar-light bg-faded">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#">
                    <!--                                    <img src="assets/img/logo/logo-default.png" alt="logo" class="">-->
                    <span class="color-dark">MyNotes</span>
                </a>
            </div>
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Notas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="//codeply.com">Imagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Calendario</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=$_SESSION["username"]?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="login.php">Login</a>
                            <a class="dropdown-item" href="register.php">Register</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- JQuery Core
=====================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



<!-- JQuery Main
=====================================-->
<!--<script src="assets/js/main/main.js"></script>-->
</body>
</html>