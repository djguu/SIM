<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/registo.php'; ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <title>MyNotes - Registo</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/header.php') ?>
</head>
<body  id="topPage" data-spy="scroll" data-target=".navbar" data-offset="100">


<!-- Page Loader
===================================== -->
<!--<div id="pageloader">-->
<!--    <div class="loader-item">-->
<!--        <img src="assets/img/other/puff.svg" alt="page loader">-->
<!--    </div>-->
<!--</div>-->

<div class="site-wrapper" style="background-color:lightseagreen">
    <!--    <div class="site-wrapper" style="background:url(assets/img/bg/img-bg-26.jpg) 50% 50% no-repeat;">-->

    <div class="site-wrapper-inner">
        <div class="cover-container">
            <div class="masthead clearfix">
                <div class="inner">
                    <!-- Navigation Area
                    ===================================== -->
                    <nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand page-scroll" href="#">
                                    <!--                                    <img src="assets/img/logo/logo-default.png" alt="logo" class="">-->
                                    <span class="color-dark">MyNotes</span>
                                </a>
                            </div>

                            <div class="navbar-collapse collapse navbar-main-collapse">
                                <ul class="nav navbar-nav">
<!--                                    <li class=""><a href="#" class="showFormRegister"><span class="color-dark">Registo</span></a>-->
                                    <li class=""><a href="login.php" class="showFormRegister showFormLogin"><span class="color-dark">Login</span></a>
                                </ul>

                            </div>
                        </div>
                    </nav>

                </div>
            </div>

            <div id="formRegister" class="inner cover text-center animated" data-animation="fadeIn" data-animation-delay="100">
                <br>
                <h3 class="font-montserrat cover-heading mb20 mt20">Registar</h3>
                <form class="clearfix mb35" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-sm-8 col-sm-offset-2">
                        <input type="text" name="username" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Username" value="<?=$username_fill?>">
                        <span class="text-danger"><?php echo $username_error; ?></span>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2 mt10">
                        <input type="password" name="password" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Password">
                        <span class="text-danger"><?php echo $password_error; ?></span>
                    </div>
                    <div class="col-sm-4 mt10">
                        <input type="password" name="password_confirm" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Confirmar Password">
                        <span class="text-danger"><?php echo $confirm_password_error; ?></span>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt10">
                        <input type="text" name="email" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Email" value="<?=$email_fill?>">
                        <span class="text-danger"><?php echo $email_error; ?></span>
                    </div>

                    <div class="col-sm-4 col-sm-offset-2 mt10">
                        <input type="text" name="name" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Nome" value="<?=$name_fill?>">
                        <span class="text-danger"><?php echo $name_error; ?></span>
                    </div>
                    <div class="col-sm-4 mt10">
                        <input type="text" name="surname" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Sobrenome" value="<?=$surname_fill?>">
                        <span class="text-danger"><?php echo $surname_error; ?></span>
                    </div>
                    <div class="col-sm-8 mt10 col-sm-offset-2">
                        <input name="birthdate" placeholder="Data de nascimento" class="form-control text-center no-border input-lg input-circle bg-light-transparent" type="text" onfocus="(this.type='date')"  id="date" value="<?=$birthdate_fill?>">
                        <span class="text-danger"><?php echo $birthdate_error; ?></span>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt5">
                        <button name="register" class="button button-lg button-circle button-block button-pasific hover-ripple-out">Registar</button><br><br>
                        <a href="login.php" class="color-light mt20 showFormLogin" id="showFormLogin">Tem uma conta? Login</a><br>
                    </div>
                </form>
                <br>
            </div>

            <div class="mastfoot">
                <div class="inner">
<!--                    <p class="color-light text-center">&copy;2016 Pasific Templare by Myboodesign.com</p>-->
                </div>
            </div>

        </div>

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