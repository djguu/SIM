<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/php/login.php'); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <title>MyNotes - Login</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.html') ?>
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
                        <a class="nav-link" href="/assets/pages/registo.php">Registo</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div id="formLogin" class="inner cover text-center animated" data-animation="fadeIn" data-animation-delay="100">
    <br>
    <div class="row justify-content-md-center">
        <h3 class="col-sm-12 font-montserrat cover-heading mb20 mt20">Login</h3>
        <form class="clearfix mb35" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-2 <?php echo (!empty($username_error)) ? 'text-danger' : ''; ?>">
                    <input type="text" name="username_login" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Username" value="<?= (empty($_GET["user"])) ? $username : $_GET["user"]; ?>">
                    <span class="text-danger"><?php echo $username_error; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-sm-offset-2 mt10" <?php echo (!empty($password_error)) ? 'text-danger' : ''; ?>>
                    <input type="password" name="password_login" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Password">
                    <span class="text-danger"><?php echo $password_error; ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-sm-offset-2 mt5">
                    <button class="button button-lg button-circle button-block button-pasific hover-ripple-out">Login</button><br><br>
                    <a href="/assets/pages/reset-password.php" class="color-light mt20">Repor palavra-passe</a><br>
                    <a href="/assets/pages/registo.php" class="color-light mt20 showFormRegister" id="showFormRegister">Registar</a>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- JQuery Core
=====================================-->
<script src="../js/core/jquery.min.js"></script>
<script src="../js/core/bootstrap.min.js"></script>


<!-- JQuery Main
=====================================-->
<script src="../js/main/jquery.appear.js"></script>
<script src="../js/main/imagesloaded.pkgd.min.js"></script>
<script src="../js/main/main.js"></script>
</body>
</html>
