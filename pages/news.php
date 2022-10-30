<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
<body>
<div id="preloader" class='allpre'></div>
<div class="topbar">
<?php require_once(dirname(dirname(__FILE__)) . '/inc/topbar.php');?>
</div>
<div class="header">
<header>
<?php require_once(dirname(dirname(__FILE__)) . '/inc/header.php');?>
</header>
</div>
<div class="rows">
<div class="sidenav">
<?php require_once(dirname(dirname(__FILE__)) . '/inc/leftsidebar.php');?>
</div>
    <div class ="main">
    <?php require_once(dirname(dirname(__FILE__)) . '/partials/newswork.php');?>
</div>
<div class="sidenav">
<?php require_once(dirname(dirname(__FILE__)) . '/inc/rightsidebar.php');?>
</div>
</div>

<div class="footer">
<footer>
<?php require_once(dirname(dirname(__FILE__)) . '/inc/footer.php');?>
</footer>
</div>

<div class="copyright">

<?php require_once(dirname(dirname(__FILE__)) . '/inc/copyright.php');?>

</div>

<script src="../js/custom.js"></script>
</body>
</html>