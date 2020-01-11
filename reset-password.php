<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/reset-password.php'; ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Reset Password</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Goncalo Correia">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicons -->
    <!--    <link rel="shortcut icon" href="assets/img/favicon.png">-->
    <!--    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">-->
    <!--    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png">-->
    <!--    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png">-->

    <!-- Load Core CSS
    =====================================-->
    <link rel="stylesheet" href="assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/core/animate.min.css">

    <!-- Load Main CSS
    =====================================-->
    <link rel="stylesheet" href="assets/css/main/main.css">
    <link rel="stylesheet" href="assets/css/main/setting.css">
    <link rel="stylesheet" href="assets/css/main/hover.css">
    <link rel="stylesheet" href="assets/css/main/cover.css">

    <!-- Load Magnific Popup CSS
    =====================================-->
    <link rel="stylesheet" href="assets/css/magnific/magic.min.css">
    <link rel="stylesheet" href="assets/css/magnific/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/magnific/magnific-popup-zoom-gallery.css">

    <!-- Load OWL Carousel CSS
    =====================================-->
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="assets/css/owl-carousel/owl.transitions.css">

    <link rel="stylesheet" href="assets/css/color/blue.css">

    <!-- Load Fontbase Icons - Please Uncomment to use linea icons
    =====================================
    <link rel="stylesheet" href="assets/css/icon/linea-arrows-10.css">
    <link rel="stylesheet" href="assets/css/icon/linea-basic-10.css">
    <link rel="stylesheet" href="assets/css/icon/linea-basic-elaboration-10.css">
    <link rel="stylesheet" href="assets/css/icon/linea-ecommerce-10.css">
    <link rel="stylesheet" href="assets/css/icon/linea-music-10.css">
    <link rel="stylesheet" href="assets/css/icon/linea-software-10.css">
    <link rel="stylesheet" href="assets/css/icon/linea-weather-10.css">-->
    <link rel="stylesheet" href="assets/css/icon/font-awesome.css">
    <link rel="stylesheet" href="assets/css/icon/et-line-font.css">

    <!-- Load JS
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    WARNING: Respond.js doesn't work if you view the page via file://
    =====================================-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                                    <li class=""><a href="registo.php" class="showFormRegister"><span class="color-dark">Registo</span></a>
                                    <li class=""><a href="#" class="showFormRegister showFormLogin hidden"><span class="color-dark">Login</span></a>
                                </ul>

                            </div>
                        </div>
                    </nav>

                </div>
            </div>

            <div id="formLogin" class="inner cover text-center animated" data-animation="fadeIn" data-animation-delay="100">
                <br>
                <h3 class="font-montserrat cover-heading mb20 mt20">Repor Password</h3>
                <form class="clearfix mb35" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-sm-8 col-sm-offset-2 <?php echo (!empty($username_error)) ? 'text-danger' : ''; ?>">
                        <input type="text" name="username" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Username" value="<?= $username; ?>">
                        <span class="text-danger"><?php echo $username_error; ?></span>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt10" <?php echo (!empty($password_error)) ? 'text-danger' : ''; ?>>
                        <input type="password" name="password" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Password">
                        <span class="text-danger"><?php echo $password_error; ?></span>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt10">
                        <input type="password" name="password_confirm" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Confirmar Password">
                        <span class="text-danger"><?php echo $confirm_password_error; ?></span>
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt5">
                        <button class="button button-lg button-circle button-block button-pasific hover-ripple-out">Reset</button><br><br>
                        <a href="login" class="color-light mt20">Tem uma conta? Login</a><br>
                        <a href="registo.php" class="color-light mt20 showFormRegister" id="showFormRegister">Registar</a>
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
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- Magnific Popup
=====================================-->
<script src="assets/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="assets/js/magnific-popup/magnific-popup-zoom-gallery.js"></script>

<!-- Progress Bars
=====================================-->
<script src="assets/js/progress-bar/bootstrap-progressbar.min.js"></script>
<script src="assets/js/progress-bar/bootstrap-progressbar-main.js"></script>

<!-- JQuery Main
=====================================-->
<script src="assets/js/main/jquery.appear.js"></script>
<script src="assets/js/main/isotope.pkgd.min.js"></script>
<script src="assets/js/main/parallax.min.js"></script>
<script src="assets/js/main/jquery.countTo.js"></script>
<script src="assets/js/main/owl.carousel.min.js"></script>
<script src="assets/js/main/jquery.sticky.js"></script>
<script src="assets/js/main/ion.rangeSlider.min.js"></script>
<script src="assets/js/main/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/main/main.js"></script>

</body>
</html>