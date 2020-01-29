<?php
include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/sessions_user.php');
?>
<head>
    <title>Calendar</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/main_header.html') ?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/nav.php') ?>

<div class="container min-vh-100 row align-items-center mx-auto">
    <iframe class="mx-auto" src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLisbon&amp;src=cHQtcHQucG9ydHVndWVzZSNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%239F3501" style="border:solid 1px #777" width="800" height="600"></iframe>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/includes/main_js.html') ?>
</body>
