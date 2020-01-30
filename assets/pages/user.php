<?php
include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/sessions_user.php');
?>
<html lang="pt">
<head>
    <title>MyNotes</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/main_header.html') ?>

</head>
<body>
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/nav.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/config/db.php';
?>

<section class="home_part">
    <div class="container min-vh-100 row align-items-center mx-auto">
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/assets/php/user_update.php');
        ?>
    </div>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/main_js.html') ?>
</body>
</html>
