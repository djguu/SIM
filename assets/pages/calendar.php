<?php
include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/sessions_user.php');
?>
<html lang="pt">
<head>
    <title>Calendar</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/main_header.php') ?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/nav.php') ?>

<div class=" container min-vh-100 row align-items-center mx-auto">
<iframe class="mx-auto" src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLisbon&amp;src=cHQtcHQucG9ydHVndWVzZSNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%239F3501" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
</div>
<!-- JQuery Core
=====================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?php $_SERVER['DOCUMENT_ROOT']?>/assets/js/myscript.js"></script>


<!-- JQuery Main
=====================================-->
<!--<script src="assets/js/main/main.js"></script>-->
</body>
</html>