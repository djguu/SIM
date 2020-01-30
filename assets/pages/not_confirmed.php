<?php
// Initialize the session
session_start();
header('Content-type: text/html; charset=utf-8');
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"]){
    header("location: /assets/pages/login.php");
    exit;
}
?>
<html lang="pt">
<head>
    <title>MyNotes</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/main_header.html') ?>

</head>
<body>
<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="navbar-header navbar-pasific">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <span class="color-dark">MyNotes</span>
                </a>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/assets/php/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<section class="home_part">
    <div class="container min-vh-100 row align-items-center mx-auto">
        <div class="col-sm-12">
            <div class="home_text text-center">
                <h1>Necessita de ser confirmado pelo administrador</h1>
            </div>
        </div>'
    </div>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/main_js.html') ?>
</body>
</html>
